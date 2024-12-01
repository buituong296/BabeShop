@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1 class="fw-bold">DANH SÁCH ĐƠN HÀNG</h1>
@stop

@section('content')
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<div class="container mt-4 pb-4">
    <h4>Lọc đơn hàng</h4>
    <form action="{{ route('bills.filter') }}" method="get" class="row g-3">

        <div class="col-md-6">
            <label for="start_date" class="form-label">Từ ngày:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
        </div>

        <div class="col-md-6">
            <label for="end_date" class="form-label">Đến ngày:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
        </div>

        <div class="col-md-3">
            <label for="price_from" class="form-label">Giá từ:</label>
            <input type="number" name="price_from" id="price_from" class="form-control" value="{{ request('price_from') }}" placeholder="Nhập giá từ">
        </div>

        <div class="col-md-3">
            <label for="price_to" class="form-label">Giá đến:</label>
            <input type="number" name="price_to" id="price_to" class="form-control" value="{{ request('price_to') }}" placeholder="Nhập giá đến">
        </div>

        <div class="col-md-4">
            <label for="status" class="form-label">Trạng thái:</label>
            <select name="status" id="status" class="form-control">
                <option value="">Chọn trạng thái</option>
                <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>Chờ xác nhận</option>
                <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>Đã xác nhận</option>
                <option value="3" {{ request('status') == 3 ? 'selected' : '' }}>Đang giao hàng</option>
                <option value="4" {{ request('status') == 4 ? 'selected' : '' }}>Giao hàng thành công</option>
                <option value="4" {{ request('status') == 5 ? 'selected' : '' }}>Đã Hủy</option>
                <option value="4" {{ request('status') == 7 ? 'selected' : '' }}>Hoàn thành</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="button" class="form-label">‎</label>
            <button type="submit" class="btn btn-primary w-100">Lọc</button>
        </div>
    </form>
</div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên người nhận</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bills as $bill)
                        <tr>
                            <td>{{ $bill->id }}</td>
                            <td>{{ $bill->bill_code }}</td>
                            <td>{{ $bill->user_name}}</td>
                            <td>{{ $bill->created_at}}</td>
                            <td>{{ $bill->billStatus->name}}</td>
                            <td>
                                <a href="{{ route('bills.show', $bill->id) }}" class="btn btn-info btn-sm">Xem</a>
                                @if ($bill->bill_status != '5' && $bill->bill_status != '7')
                                <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                @endif
                                <form action="{{ route('bills.destroy', $bill->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
