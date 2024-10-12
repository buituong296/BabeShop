@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thanh toán</h1>

    <div class="row">
        <div class="col-md-8">
            <h3>Thông tin giao hàng</h3>
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Họ tên</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="payment_method">Phương thức thanh toán</label>
                    <select id="payment_method" name="payment_method" class="form-control">
                        <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                        <option value="paypal">PayPal</option>
                        <!-- Thêm các phương thức thanh toán khác nếu cần -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Xác nhận đặt hàng</button>
            </form>
        </div>
        <div class="col-md-4">
            <h3>Đơn hàng của bạn</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
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
                            <td>{{ number_format($details['price'], 0, ',', '.') }} VND</td>
                            <td>{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Tổng cộng:</th>
                        <th>{{ number_format($total, 0, ',', '.') }} VND</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
