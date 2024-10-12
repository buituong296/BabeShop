<!-- resources/views/product.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    
    <div class="row">

        <div class="col-md-6">
            <img src="{{ $product->image_url }}" class="img-fluid" alt="{{ $product->name }}">
        </div>

        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <h4>Giá: ${{ $product->price }}</h4>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Thêm vào giỏ hàng</button>
            </form>
        </div>
    </div>
</div>
@endsection
