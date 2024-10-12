<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Danh sách sản phẩm</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('images/default-product.png') }}" class="card-img-top" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text">Giá: {{ number_format($product->price, 0, ',', '.') }} VND</p>
                        <p class="card-text">Số lượng: {{ $product->quantity }}</p>
                        <p class="card-text">Danh mục: {{ $product->category ? $product->category->name : 'Không có danh mục' }}</p>
                        <a href="{{ route('user.show', $product->id) }}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
