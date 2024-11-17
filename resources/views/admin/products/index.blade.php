@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1 class="fw-bold">DANH SÁCH SẢN PHẨM</h1>
@stop

@section('content')
<div class="container mt-4">
    <h4>Lọc sản phẩm</h4>
    <form action="{{ route('products.filter') }}" method="get" class="row g-3">
        <!-- Lọc theo Giá -->
        <div class="col-md-4">
            <label for="price_from" class="form-label">Giá từ:</label>
            <input type="number" name="price_from" id="price_from" class="form-control" value="{{ request('price_from') }}" placeholder="Nhập giá từ">
        </div>

        <div class="col-md-4">
            <label for="price_to" class="form-label">Giá đến:</label>
            <input type="number" name="price_to" id="price_to" class="form-control" value="{{ request('price_to') }}" placeholder="Nhập giá đến">
        </div>

        <!-- Lọc theo Danh mục -->
        <div class="col-md-4">
            <label for="category_id" class="form-label">Danh mục:</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">Chọn danh mục</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-1">
            <button type="submit" class="btn btn-primary w-100">Lọc</button>
        </div>
    </form>
</div>

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
