<!-- resources/views/user/checkout/vnpay_return.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <div class="card shadow-sm p-4">
        <div class="card-body">
            <div class="mb-4">
                <i class="bi bi-check-circle text-success" style="font-size: 3rem;"></i>
                <h3 class="mt-2 text-success">Thanh toán thành công!</h3>
            </div>
            <p class="text-muted">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Dưới đây là thông tin chi tiết giao dịch:</p>

            <div class="table-responsive d-flex justify-content-center my-4">
                <table class="table table-borderless" style="max-width: 650px;">
                    <tbody>
                        <tr>
                            <th class="text-start">Mã đơn hàng:</th>
                            <td class="text-end">{{ $transactionId }}</td>
                        </tr>
                        <tr>
                            <th class="text-start">Số tiền:</th>
                            <td class="text-end">{{ number_format($amount, 0, ',', '.') }} VND</td>
                        </tr>
                        <tr>
                            <th class="text-start">Nội dung thanh toán:</th>
                            <td class="text-end">{{ $orderInfo }}</td>
                        </tr>
                        <tr>
                            <th class="text-start">Mã Ngân hàng:</th>
                            <td class="text-end">{{ $bankCode }}</td>
                        </tr>
                        <tr>
                            <th class="text-start">Thời gian thanh toán:</th>
                            <td class="text-end">{{ $payDate }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action="{{ route('checkout.payment-method.store') }}" method="POST" class="d-inline-block">
                @csrf
                <input type="hidden" name="method_id" id="method_id" value="2">
                <button type="submit" class="btn btn-primary px-4">Tiếp tục</button>
            </form>
        </div>
    </div>

    <footer class="mt-4 text-muted">
        <p>&copy; {{ date('Y') }} VNPAY. Mọi quyền được bảo lưu.</p>
    </footer>
</div>
@endsection
