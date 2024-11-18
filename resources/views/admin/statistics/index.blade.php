@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Thống Kê Tổng Quan</h1>
        <div class="statistics-section row">
            <div class="card col-md-6">
                <div class="card-body">
                    <h5>Đơn hàng chưa xử lý</h5>
                    <p>{{ $pendingOrdersCount }} đơn hàng</p>
                    <a href="{{ route('admin.orderinfos.index', ['status' => 'pending']) }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Số tiền cần phải thu</h5>
                    <p class="card-text">
                        {{ number_format($amountToBeCollected, 0, ',', '.') }} VND
                    </p>
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-body">
                    <h5>Đơn hàng đã xử lý</h5>
                    <p>{{ $completedOrdersCount }} đơn hàng</p>
                    <a href="{{ route('admin.orderinfos.index', ['status' => 'completed']) }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Số tiền thực thu</h5>
                    <p class="card-text">
                        {{ number_format($collectedAmount, 0, ',', '.') }} VND
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="card">
                    <div class="card-body">
                        <h5>Biểu đồ Số Tiền</h5>
                        <div class="chart-container" style="position: relative; height:250px; width:250px; margin: 0 auto;">
                            <canvas id="moneyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const revenueCtx = document.getElementById('moneyChart').getContext('2d');

                const revenueChart = new Chart(revenueCtx, {
                    type: 'pie',
                    data: {
                        labels: @json($chartData['labels']),
                        datasets: [{
                            data: @json($chartData['values']),
                            backgroundColor: ['#FF6384', '#36A2EB'], // Màu sắc
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        }
                    }
                });
            });
        </script>



        <form action="{{ route('admin.revenue') }}" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <label for="start_date">Ngày bắt đầu:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="end_date">Ngày kết thúc:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                </div>
                <div class="col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </div>
            </div>
        </form>
        <div>
            <h3>Tổng doanh thu: {{ number_format($totalRevenue, 0, ',', '.') }} VND</h3>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <canvas id="revenueChart"></canvas>

        <script>
            const labels = @json(collect($revenueData)->pluck('date')->toArray());
            const data = @json(collect($revenueData)->pluck('daily_revenue')->toArray());

            const totalRevenue = {{ $totalRevenue }};
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels.length > 0 ? labels : ['Tất cả doanh thu'],
                    datasets: [{
                        label: labels.length > 0 ? 'Doanh thu hàng ngày' : 'Doanh thu tổng',
                        data: labels.length > 0 ? data : [totalRevenue], // If no data, show total revenue
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Ngày'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Doanh thu (VND)'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        <div class="card">
            <div class="card-header">
                <h4>Thống kê sản phẩm đã bán theo danh mục</h4>
            </div>
            <div class="chart-container" style="max-width: 400px; margin: auto;">
                <canvas id="pieChart" width="400" height="400"></canvas>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const pieCtx = document.getElementById('pieChart').getContext('2d');
                const pieChart = new Chart(pieCtx, {
                    type: 'pie',
                    data: {
                        labels: @json($pieChartData['labels']),
                        datasets: [{
                            data: @json($pieChartData['data']),
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF5722'],
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        }
                    }
                });
            });
        </script>



    </div>
@endsection
