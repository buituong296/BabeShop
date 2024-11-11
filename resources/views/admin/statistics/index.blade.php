@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Thống Kê Tổng Quan</h1>
    <div class="statistics-section">
        <div class="card col-md-6">
            <div class="card-body">
                <h5>Đơn hàng chưa xử lý</h5>
                <p>{{ $pendingOrdersCount }} đơn hàng</p>
                <a href="{{ route('admin.orderinfos.index', ['status' => 'pending']) }}" class="btn btn-primary">Xem chi tiết</a>
            </div>
        </div>
        <div class="card col-md-6">
            <div class="card-body">
                <h5>Đơn hàng đã xử lý</h5>
                <p>{{ $completedOrdersCount }} đơn hàng</p>
                <a href="{{ route('admin.orderinfos.index', ['status' => 'completed']) }}" class="btn btn-primary">Xem chi tiết</a>
            </div>
        </div>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="revenueChart"></canvas>

<script>
    const labels = @json(array_column($revenueData, 'date'));
    const data = @json(array_column($revenueData, 'daily_revenue'));

    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu hàng ngày',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                x: {
                    title: { display: true, text: 'Ngày' }
                },
                y: {
                    title: { display: true, text: 'Doanh thu (VND)' },
                    beginAtZero: true
                }
            }
        }
    });
</script>





</div>
@endsection
