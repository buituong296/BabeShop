@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="product-image">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/default-product.png') }}" class="img-fluid" alt="{{ $product->name }}">
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-details">
                <h2>{{ $product->name }}</h2>
                <p class="text-muted">{{ $product->category ? $product->category->name : 'Không có danh mục' }}</p>
                <h4 class="text-danger">{{ number_format($product->price, 0, ',', '.') }} VND</h4>
                <p>{{ $product->description }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" max="{{ $product->quantity }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Thêm vào giỏ hàng</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
