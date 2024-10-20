@extends('layouts.app')

@section('content')

<div class="row row-cols-1 row-cols-lg-2 g-0 mx-auto" style="max-width: 1920px">

    <!-- resources/views/checkout/bill_summary.blade.php -->
<h1>Thông tin hóa đơn</h1>

<h3>Thông tin khách hàng</h3>
<p><strong>Tên:</strong> {{ $customerInfo['user_name'] }}</p>
<p><strong>Địa chỉ:</strong> {{ $customerInfo['user_address'] }}</p>
<p><strong>Số điện thoại:</strong> {{ $customerInfo['user_tel'] }}</p>

<h3>Phương thức thanh toán</h3>
<p>{{ $paymentMethod == 1 ? 'Thanh toán COD' : 'Thanh toán Online' }}</p>

<h3>Chi tiết đơn hàng</h3>
<table>
    <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cartItems as $item)
        <tr>
            <td>{{ $item->variant->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->variant->sale_price }} VND</td>
            <td>{{ $item->quantity * $item->variant->sale_price }} VND</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Tổng tiền: {{ $total }} VND</h3>

<button onclick="window.print()">In hóa đơn</button>
<form action="{{ route('checkout.save') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary mt-3">Lưu hóa đơn và xóa giỏ hàng</button>
</form>
</div>

@endsection
