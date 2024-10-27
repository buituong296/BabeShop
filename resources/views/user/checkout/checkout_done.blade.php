@extends('layouts.app')

@section('content')
<main class="content-wrapper">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header text-center bg-primary text-white">
                        <h3 class="mb-0">Xác nhận đơn hàng</h3>
                    </div>
                    <div class="card-body">

                        <!-- Customer Information -->
                        <h4 class="mt-3">Thông tin khách hàng</h4>
                        <ul class="list-unstyled">
                            <li><strong>Tên:</strong> {{ $customerInfo['user_name'] }}</li>
                            <li><strong>Địa chỉ:</strong> {{ $customerInfo['user_address'] }}</li>
                            <li><strong>Số điện thoại:</strong> {{ $customerInfo['user_tel'] }}</li>
                        </ul>

                        <!-- Payment Method -->
                        <h4 class="mt-4">Phương thức thanh toán</h4>
                        <p>{{ $paymentMethod == 1 ? 'Thanh toán COD' : 'Thanh toán Online' }}</p>

                        <!-- Order Details -->
                        <h4 class="mt-4">Chi tiết đơn hàng</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                        <td>{{ number_format($item->variant->sale_price) }} VND</td>
                                        <td>{{ number_format($item->quantity * $item->variant->sale_price) }} VND</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Voucher Discounts -->
                        <h4 class="mt-4">Giảm giá</h4>
                        @foreach (session('applied_vouchers', []) as $code => $percentage)
                            <p>Mã giảm giá <strong>{{ $code }}</strong>: {{ $percentage }}% (giảm {{ number_format($total * ($percentage / 100)) }} VND)</p>
                        @endforeach

                        <ul class="list-unstyled">
                            <li><strong>Tổng giảm giá:</strong> {{ number_format(session('total_discount', 0)) }} VND</li>
                            <li><strong>Tổng tiền sau khi giảm:</strong> {{ number_format(session('total_after_discount', $total)) }} VND</li>
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="card-footer text-center">
                        <button onclick="window.print()" class="btn btn-secondary me-2">In hóa đơn</button>
                        <form action="{{ route('checkout.save') }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-primary">Lưu hóa đơn và xóa giỏ hàng</button>
                        </form>
                        <a href="{{ route('bill') }}" class="btn btn-outline-primary ms-2">Danh sách hóa đơn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
