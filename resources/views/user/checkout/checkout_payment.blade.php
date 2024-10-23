@extends('layouts.app')

@section('content')
    <main class="content-wrapper">
        <div class="container py-5">
            <div class="row pt-1 pt-sm-3 pt-lg-4 pb-2 pb-md-3 pb-lg-4 pb-xl-5">
                <div class="col-lg-8 col-xl-7 mb-5 mb-lg-0">
                    <div class="accordion d-flex flex-column gap-5 pe-lg-4 pe-xl-0" id="checkout">

                        <!-- Phương thức thanh toán -->
                        <!-- resources/views/checkout/payment_method.blade.php -->
                        <h1>Chọn phương thức thanh toán</h1>
                        <form action="{{ route('checkout.payment-method.store') }}" method="POST">
                            @csrf
                            <input type="hidden"  name="method_id" id="method_id" value="1">
                            <button type="submit" class="btn btn-primary">Thanh Toán COD</button>
                        </form>
                        <div class="col-md-6">
                            <form action="{{ route('payment.vnpay') }}" method="GET">
                                @csrf
                                <!-- Nút bấm thanh toán online -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Thanh toán VNPay</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tóm tắt đơn hàng (sidebar cố định) -->
        @include('user/partials/order_summary')
        </div>
        </div>
    </main>
@endsection
