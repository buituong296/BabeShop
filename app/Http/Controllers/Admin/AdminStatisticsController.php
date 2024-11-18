<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bill;
use App\Models\User;
use App\Models\BillStatus;
use Illuminate\Support\Collection;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AdminStatisticsController extends Controller
{

    public function index()
    {
        $totalOrders = Bill::count();
        $totalRevenue = Bill::sum('total');
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $billStatuses = BillStatus::get();

        // Lấy doanh thu theo tháng
        $monthlyRevenue = Bill::selectRaw('MONTH(created_at) as month, SUM(total) as revenue')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('revenue', 'month')
            ->toArray();

        // Tạo một mảng với giá trị doanh thu mặc định là 0 cho 12 tháng
        $revenueData = [];
        for ($i = 1; $i <= 12; $i++) {
            $revenueData[$i] = $monthlyRevenue[$i] ?? 0;
        }
        $latestOrders = Bill::with('user')->latest()->take(10)->get();
        // Số lượng đơn hàng chưa xử lý (Chờ Xác Nhận, Đã Xác Nhận, Đang giao hàng)
        $pendingOrdersCount = Bill::whereIn('bill_status', ['1', '2', '3'])->count();

        // Số lượng đơn hàng đã xử lý (Giao Hàng thành công)
        $completedOrdersCount = Bill::where('bill_status', '4')->count();

        $salesByCategory = Category::with('products')
            ->select('categories.name', DB::raw('SUM(bill_items.quantity) as total_sold'))
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->leftJoin('bill_items', 'products.id', '=', 'bill_items.product_id')
            ->groupBy('categories.name')
            ->get();

        // Dữ liệu biểu đồ hình tròn
        $pieChartData = [
            'labels' => $salesByCategory->pluck('name')->toArray(),
            'data' => $salesByCategory->pluck('total_sold')->toArray()
        ];
        // Lấy dữ liệu từ bảng `bills`
        $pendingStatuses = [1, 2, 3]; // Chờ xác nhận, Đã xác nhận, Đang giao hàng
        $completedStatus = 4; // Giao hàng thành công
        // Tổng tiền cần thu (đơn hàng chưa xử lý)
        $amountToBeCollected = DB::table('bills')
            ->whereIn('bill_status', $pendingStatuses)
            ->sum('total');

        // Tổng tiền thực thu (đơn hàng đã xử lý)
        $collectedAmount = DB::table('bills')
            ->where('bill_status', $completedStatus)
            ->sum('total');

        $pendingOrdersTotal = Bill::whereIn('bill_status', $pendingStatuses)->sum('total');
        $completedOrdersTotal = Bill::where('bill_status', $completedStatus)->sum('total');

        $chartData = [
            'labels' => ['Cần thu', 'Thực thu'],
            'values' => [$pendingOrdersTotal, $completedOrdersTotal],
        ];

        return view('admin.statistics.index', compact(
            'totalOrders',
            'totalRevenue',
            'totalProducts',
            'totalUsers',
            'revenueData',
            'latestOrders',
            'billStatuses',
            'pendingOrdersCount',
            'completedOrdersCount',
            'pieChartData',
            'amountToBeCollected',
            'collectedAmount',
            'chartData'
        ));
    }
    public function revenue(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Truy vấn doanh thu trong khoảng thời gian đã chọn
        $revenueData = Bill::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(total) as daily_revenue')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Chuyển thành Collection để sử dụng pluck
        $revenueData = collect($revenueData);
        $totalRevenue = $revenueData->sum('daily_revenue');
        // Số lượng đơn hàng chưa xử lý (Chờ Xác Nhận, Đã Xác Nhận, Đang giao hàng)
        $pendingOrdersCount = Bill::whereIn('bill_status', ['1', '2', '3'])->count();

        // Số lượng đơn hàng đã xử lý (Giao Hàng thành công)
        $completedOrdersCount = Bill::where('bill_status', '4')->count();

        return view('admin.statistics.index', compact(
            'revenueData',
            'startDate',
            'endDate',
            'pendingOrdersCount',
            'completedOrdersCount',
            'totalRevenue'
        ));
    }
    public function orderinfo(Request $request)
    {
        $status = $request->query('status');

        if ($status === 'pending') {
            $bills = Bill::whereIn('bill_status', ['1', '2', '3'])->get();
        } elseif ($status === 'completed') {
            $bills = Bill::where('bill_status', '4')->get();
        } else {
            $bills = Bill::all();
        }
        $billStatus = BillStatus::get();

        return view('admin.bills.index', compact('bills', 'billStatus'));
    }
}
