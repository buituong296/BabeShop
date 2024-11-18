@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1 class="fw-bold">DANH SÁCH SẢN PHẨM</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add New Product</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>    
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 2) }} VND</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Xem</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
