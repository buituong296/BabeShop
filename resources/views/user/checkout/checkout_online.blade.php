@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Tạo mới đơn hàng</h3>

        <!-- Form -->
        <form action="{{ route('payment.create') }}" method="post" class="bg-light p-4 rounded shadow-sm">
            @csrf

            <input type="hidden" name="total_amount" value="{{ $total }}">
            <div class="form-group mb-4">
                <label for="amount" class="font-weight-bold">Số tiền cần thanh toán:</label>
                <input type="hidden" name="amount" value="{{ $total }}">
                <div class="form-control-plaintext font-weight-bold text-success">
                    {{ number_format($total, 0, ',', '.') }} VND
                </div>
            </div>


            <!-- Payment Method Selection -->
            <h4 class="font-weight-bold mb-3">Chọn phương thức thanh toán</h4>

            <div class="form-group mb-4">
                <!-- Option 1 -->
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" class="custom-control-input" id="vnpay" name="bankCode" value="" checked>
                    <label class="custom-control-label" for="vnpay">
                        <strong>Cổng thanh toán VNPAYQR</strong> - Chuyển hướng qua VNPAY để chọn phương thức thanh toán
                    </label>
                </div>

                <!-- Option 2 -->
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" class="custom-control-input" id="vnpayqr" name="bankCode" value="VNPAYQR">
                    <label class="custom-control-label" for="vnpayqr">
                        Thanh toán bằng ứng dụng hỗ trợ VNPAYQR
                    </label>
                </div>

                <!-- Option 3 -->
                <div class="custom-control custom-radio mb-2">
                    <input type="radio" class="custom-control-input" id="vnbank" name="bankCode" value="VNBANK">
                    <label class="custom-control-label" for="vnbank">
                        Thanh toán qua thẻ ATM/Tài khoản nội địa
                    </label>
                </div>

                <!-- Option 4 -->
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="intcard" name="bankCode" value="INTCARD">
                    <label class="custom-control-label" for="intcard">
                        Thanh toán qua thẻ quốc tế
                    </label>
                </div>
            </div>

            <!-- Language Selection -->
            <div class="form-group mb-4">
                <h5 class="font-weight-bold">Chọn ngôn ngữ giao diện thanh toán:</h5>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="vietnamese" name="language" value="vn" checked>
                    <label class="custom-control-label" for="vietnamese">Tiếng Việt</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="english" name="language" value="en">
                    <label class="custom-control-label" for="english">Tiếng Anh</label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-2">Thanh toán</button>
            </div>
        </form>

        <!-- Footer -->
        <footer class="footer text-center mt-5">
            <p>&copy; BabelShop 2024</p>
        </footer>
    </div>
@endsection
