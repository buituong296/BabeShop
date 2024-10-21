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

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên tài khoản</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bills as $bill)
                        <tr>
                            <td>{{ $bill->id }}</td>
                            <td>{{ $bill->bill_code }}</td>
                            <td>{{ $bill->user->name}}</td>
                            <td>{{ $bill->billStatus->name}}</td>
                            <td>
                                <a href="{{ route('bills.show', $bill->id) }}" class="btn btn-info btn-sm">Xem</a>
                                <a href="{{ route('bills.edit', $bill->id) }}" class="btn btn-warning btn-sm">Sửa</a>
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
