<!-- resources/views/vouchers/index.blade.php -->
@extends('adminlte::page')

@section('title', 'Mã giảm giá')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content_header')
    <h1 class="fw-bold">DANH SÁCH MÃ GIẢM GIÁ</h1>
@stop

@section('content')
<div class="container mt-4">
    <h4>Lọc Voucher</h4>
    <form action="{{ route('vouchers.filter') }}" method="get" class="row g-3">
        <!-- Lọc theo phần trăm giảm giá -->
        <div class="col-md-6">
            <label for="discount_from" class="form-label">Giảm giá từ (%):</label>
            <input type="number" name="discount_from" id="discount_from" class="form-control" value="{{ request('discount_from') }}" placeholder="Nhập phần trăm giảm giá từ">
        </div>

        <div class="col-md-6">
            <label for="discount_to" class="form-label">Giảm giá đến (%):</label>
            <input type="number" name="discount_to" id="discount_to" class="form-control" value="{{ request('discount_to') }}" placeholder="Nhập phần trăm giảm giá đến">
        </div>

        <!-- Lọc theo ngày bắt đầu -->
        <div class="col-md-6">
            <label for="start_date" class="form-label">Ngày bắt đầu:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>

        <!-- Lọc theo ngày kết thúc -->
        <div class="col-md-6">
            <label for="end_date" class="form-label">Ngày kết thúc:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>

        <div class="col-1">
            <button type="submit" class="btn btn-primary w-100">Lọc</button>
        </div>
    </form>
</div>

    <div class="card">
        <div class="card-body">
            <a href="{{ route('vouchers.create') }}" class="btn btn-primary mb-3">Thêm mã giảm giá mới</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã</th>
                        <th>Phầm trăm áp dụng</th>
                        <th>Số lượng hiện có</th>
                        <th>Số lượng đã dùng</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vouchers as $voucher)
                    <tr>
                        <td>{{ $voucher->id }}</td>
                        <td>{{ $voucher->code }}</td>
                        <td>{{ $voucher->percentage }}%</td>
                        <td>{{ $voucher->quantity }}</td>
                        <td>{{ $voucher->used_quantity }}</td>
                        <td>{{ $voucher->start }}</td>
                        <td>{{ $voucher->end }}</td>
                        <td>
                            <a href="{{ route('vouchers.edit', $voucher->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('vouchers.destroy', $voucher->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
