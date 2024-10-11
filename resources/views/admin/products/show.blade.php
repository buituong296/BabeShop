@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Thông tin sản phẩm</h5>
            <p class="card-text"><strong>Giá: </strong>{{ number_format($product->price, 0, ',', '.') }} VNĐ</p>
            <p class="card-text"><strong>Mô tả: </strong>{{ $product->description }}</p>
            <p class="card-text"><strong>Số lượng: </strong>{{ $product->quantity }}</p>
            <p class="card-text"><strong>Danh mục: </strong>{{ $product->category->name }}</p>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid mt-3" style="max-width: 300px; height: auto;">
        </div>
    </div>

    <h5 class="mt-4">Biến thể sản phẩm</h5>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Màu sắc</th>
                <th>Kích thước</th>
                <th>Tồn kho</th>
                <th>Giá bán</th>
                <th>Giá nhập</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product->variants as $variant)
                <tr>
                    <td>{{ $variant->id }}</td>
                    <td>{{ $variant->color->name }}</td>
                    <td>{{ $variant->size->name }}</td>
                    <td>{{ $variant->stock }}</td>
                    <td>{{ number_format($variant->sale_price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ number_format($variant->import_price, 0, ',', '.') }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('products.index') }}" class="btn btn-primary mt-4">Quay lại danh sách sản phẩm</a>
</div>
@endsection
