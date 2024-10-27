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

    return view('admin.statistics.index', compact(
        'totalOrders', 'totalRevenue', 'totalProducts', 'totalUsers', 'revenueData','latestOrders','billStatuses'
    ));
}
}
