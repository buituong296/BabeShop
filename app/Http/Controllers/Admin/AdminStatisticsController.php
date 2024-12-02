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

    // Doanh thu hàng tháng
    $monthlyRevenue = Bill::selectRaw('MONTH(created_at) as month, SUM(total) as revenue')
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->pluck('revenue', 'month')
        ->toArray();

    $revenueData = array_fill(1, 12, 0); // Khởi tạo mảng 12 tháng
    foreach ($monthlyRevenue as $month => $revenue) {
        $revenueData[$month] = $revenue;
    }

    // Đơn hàng mới nhất
    $latestOrders = Bill::with('user')->latest()->take(10)->get();

    // Đơn hàng chưa xử lý
    $pendingStatuses = [1, 2, 3]; // Trạng thái đơn hàng chưa xử lý
    $pendingOrdersCount = Bill::whereIn('bill_status', $pendingStatuses)->count();
    $pendingOrdersTotal = Bill::whereIn('bill_status', $pendingStatuses)->sum('total');

    // Đơn hàng đã xử lý
    $completedStatus = 4; // Trạng thái đơn hàng đã xử lý
    $completedOrdersCount = Bill::where('bill_status', $completedStatus)->count();
    $completedOrdersTotal = Bill::where('bill_status', $completedStatus)->sum('total');

    // Dữ liệu biểu đồ hình tròn
    $salesByCategory = Category::with('products')
        ->select('categories.name', DB::raw('SUM(bill_items.quantity) as total_sold'))
        ->leftJoin('products', 'categories.id', '=', 'products.category_id')
        ->leftJoin('bill_items', 'products.id', '=', 'bill_items.product_id')
        ->groupBy('categories.name')
        ->get();

    $pieChartData = [
        'labels' => $salesByCategory->pluck('name')->toArray(),
        'data' => $salesByCategory->pluck('total_sold')->toArray()
    ];

    // Biểu đồ cột cần thu và thực thu
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
        'chartData',
        'completedOrdersTotal',
        'pendingOrdersTotal'
    ));
}


public function revenue(Request $request)
{
    $startDate = $request->input('start_date') ? Carbon::parse($request->input('start_date')) : null;
    $endDate = $request->input('end_date') ? Carbon::parse($request->input('end_date')) : now();

    if ($startDate && !$endDate) {
        $endDate = now(); // Nếu không nhập ngày kết thúc, lấy đến hiện tại
    } elseif (!$startDate && $endDate) {
        $startDate = Bill::min('created_at'); // Nếu không nhập ngày bắt đầu, lấy từ ngày sớm nhất
    }

    // Doanh thu trong khoảng
    $revenueData = Bill::whereBetween('created_at', [$startDate, $endDate])
        ->selectRaw('DATE(created_at) as date, SUM(total) as daily_revenue')
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();

    $totalRevenue = $revenueData->sum('daily_revenue');

    // Tính toán các giá trị cần thu và thực thu
    $pendingStatuses = [1, 2, 3]; // Trạng thái đơn hàng chưa xử lý
    $completedStatus = 4; // Trạng thái đơn hàng đã xử lý

    // Tổng tiền cần thu
    $pendingOrdersTotal = Bill::whereIn('bill_status', $pendingStatuses)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->sum('total');

    // Tổng tiền thực thu
    $completedOrdersTotal = Bill::where('bill_status', $completedStatus)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->sum('total');

    // Số lượng đơn hàng chưa xử lý
    $pendingOrdersCount = Bill::whereIn('bill_status', $pendingStatuses)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->count();

    // Số lượng đơn hàng đã xử lý
    $completedOrdersCount = Bill::where('bill_status', $completedStatus)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->count();

    // Biểu đồ cột cần thu và thực thu
    $chartData = [
        'labels' => ['Cần thu', 'Thực thu'],
        'values' => [$pendingOrdersTotal, $completedOrdersTotal],
    ];
    $salesByCategory = Category::with('products')
        ->select('categories.name', DB::raw('SUM(bill_items.quantity) as total_sold'))
        ->leftJoin('products', 'categories.id', '=', 'products.category_id')
        ->leftJoin('bill_items', 'products.id', '=', 'bill_items.product_id')
        ->groupBy('categories.name')
        ->get();
    $pieChartData = [
        'labels' => $salesByCategory->pluck('name')->toArray(),
        'data' => $salesByCategory->pluck('total_sold')->toArray()
    ];

    return view('admin.statistics.index', compact(
        'revenueData',
        'startDate',
        'endDate',
        'totalRevenue',
        'pendingOrdersCount',
        'completedOrdersCount',
        'chartData',
        'pendingOrdersTotal',
        'completedOrdersTotal',
        'pieChartData',
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
