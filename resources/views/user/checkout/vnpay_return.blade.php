<!-- resources/views/user/checkout/vnpay_return.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted">VNPAY RESPONSE</h3>
    </div>
    <div class="table-responsive">
        <div class="form-group">
            <label>Mã đơn hàng:</label>
            <label>{{ $transactionId }}</label>
        </div>
        <div class="form-group">
            <label>Số tiền:</label>
            <label>{{ $amount }}</label>
        </div>
        <div class="form-group">
            <label>Nội dung thanh toán:</label>
            <label>{{ $orderInfo }}</label>
        </div>
        <div class="form-group">
            <label>Mã Ngân hàng:</label>
            <label>{{ $bankCode }}</label>
        </div>
        <div class="form-group">
            <label>Thời gian thanh toán:</label>
            <label>{{ $payDate }}</label>
        </div>
        <div class="form-group">
            <label>Kết quả:</label>
            <label><span style="color:blue">GD Thanh cong</span></label>
        </div>
    </div>
    <form action="{{ route('checkout.payment-method.store') }}" method="POST">
        @csrf
        <input type="hidden"  name="method_id" id="method_id" value="2">
        <button type="submit" class="btn btn-primary">Tiếp tục</button>
    </form>
    <p>&nbsp;</p>
    <footer class="footer">
        <p>&copy; VNPAY {{ date('Y') }}</p>
    </footer>
</div>
@endsection
