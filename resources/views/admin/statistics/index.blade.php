@extends('adminlte::page')

@section('content')
<div class="container">
    <h1 class="text-center">Thống Kê Tổng Quan</h1>

    <!-- Bộ lọc và biểu đồ cột ở đầu -->
    <form action="{{ route('admin.revenue') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="start_date">Ngày bắt đầu:</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="end_date">Ngày kết thúc:</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>
            <div class="col-md-3 align-self-end">
                <button type="submit" class="btn btn-primary">Lọc</button>
            </div>
        </div>
    </form>

    <!-- Biểu đồ cột doanh thu -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Biểu đồ Doanh Thu</h5>
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <!-- Thông tin đơn hàng và biểu đồ tròn -->
    <div class="card mb-4">
        <div class="card-body row">
            <!-- Thông tin đơn hàng -->
            <div class="col-md-6">
                <h5>Đơn hàng chưa xử lý</h5>
                <p>{{ $pendingOrdersCount }} đơn hàng</p>
                <a href="{{ route('admin.orderinfos.index', ['status' => 'pending']) }}" class="btn btn-primary mb-2">Xem chi tiết</a>

                <h5 class="mt-3">Số tiền cần phải thu</h5>
                <p>{{ number_format($pendingOrdersTotal, 0, ',', '.') }} VND</p>

                <h5>Đơn hàng đã hoàn thành</h5>
                <p>{{ $completedOrdersCount }} đơn hàng</p>
                <a href="{{ route('admin.orderinfos.index', ['status' => 'completed']) }}" class="btn btn-success">Xem chi tiết</a>

                <h5 class="mt-3">Số tiền thực thu</h5>
                <p>{{ number_format($completedOrdersTotal, 0, ',', '.') }} VND</p>
            </div>

            <!-- Biểu đồ tròn -->
            <div class="col-md-6 text-center">
                <h5>Biểu đồ Số Tiền</h5>
                <div class="chart-container" style="height: 300px; width: 300px; margin: 0 auto;">
                    <canvas id="moneyChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ tròn cuối -->
    <div class="card mb-4">
        <div class="row no-gutters">
            <!-- Cột bên trái: Doanh thu theo danh mục -->
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Doanh thu theo danh mục</h5><br>
                    <ul class="list-group">
                        @foreach ($revenueByCategory as $revenue)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $revenue->category_name }}
                                <span>{{ number_format($revenue->total_revenue, 0, ',', '.') }} VND</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Cột bên phải: Biểu đồ tròn -->
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Biểu đồ thống kê</h5>
                    <div class="chart-container" style="position: relative; height:250px; width:250px; margin: 0 auto;">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Top 5 Sản Phẩm Bán Chạy Nhất</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Số Lượng Bán</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topSellingProducts as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" width="50">
                            </td>
                            <td>{{ $product->total_quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5>Top 5 Người Dùng Chi Tiêu Nhiều Nhất</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Người Dùng</th>
                        <th>Số Tiền Đã Tiêu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topSpendingUsers as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ number_format($user->total_spent, 0, ',', '.') }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>

<!-- Script for Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Biểu đồ Doanh thu (Cột)
    const labels = @json(collect($revenueData)->pluck('date')->toArray());
    const data = @json(collect($revenueData)->pluck('daily_revenue')->toArray());
    const totalRevenue = {{ $totalRevenue }};
    const ctx = document.getElementById('revenueChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels.length > 0 ? labels : ['Tất cả doanh thu'],
            datasets: [{
                label: 'Doanh thu hàng ngày',
                data: labels.length > 0 ? data : [totalRevenue],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: { title: { display: true, text: 'Ngày' } },
                y: { title: { display: true, text: 'Doanh thu (VND)' }, beginAtZero: true }
            }
        }
    });

    // Biểu đồ Số Tiền (Tròn)
    const revenueCtx = document.getElementById('moneyChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'pie',
        data: {
            labels: @json($chartData['labels']),
            datasets: [{
                data: @json($chartData['values']),
                backgroundColor: ['#FF6384', '#36A2EB'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'top' } }
        }
    });

    // Biểu đồ sản phẩm đã bán (Tròn cuối)
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: @json($pieChartData['labels']),
            datasets: [{
                data: @json($pieChartData['data']),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF5722']
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'top' } }
        }
    });
</script>


@endsection
