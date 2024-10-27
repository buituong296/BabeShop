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
