<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bill;
use App\Models\User;
use App\Models\BillStatus;

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

    return view('admin.statistics.index', compact(
        'totalOrders', 'totalRevenue', 'totalProducts', 'totalUsers', 'revenueData','latestOrders','billStatuses','pendingOrdersCount','completedOrdersCount'
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

    return view('admin.statistics.index', compact('revenueData', 'startDate', 'endDate'));
}
public function orderinfo(Request $request)
{
    $status = $request->query('status');

    if ($status === 'pending') {
        $orders = Bill::whereIn('bill_status', ['1', '2', '3'])->get();
    } elseif ($status === 'completed') {
        $orders = Bill::where('bill_status', '4')->get();
    } else {
        $orders = Bill::all();
    }
    $billStatus = BillStatus::get();

    return view('admin.statistics.orderinfo', compact('orders','billStatus'));
}


}
