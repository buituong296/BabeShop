@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Giỏ hàng</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $details)
                    <tr>
                        <td>
                            @if(isset($details['image']) && $details['image'])
                                <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" width="50" height="50">
                            @else
                                <img src="{{ asset('storage/default-image.png') }}" alt="{{ $details['name'] }}" width="50" height="50">
                            @endif
                        </td>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['price'] }}</td>
                        <td>${{ $details['price'] * $details['quantity'] }}</td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Giảm số lượng</button>
                                </form>
                                <form action="{{ route('cart.delete', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa sản phẩm</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Tổng giá trị: ${{ $total }}</h3>
        <div class="mt-3">
            <a href="{{ route('checkout') }}" class="btn btn-primary">Đi đến trang thanh toán</a>
        </div>
    </div>
@endsection
