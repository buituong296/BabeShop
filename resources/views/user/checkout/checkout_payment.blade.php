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
                            <div>
                                <label for="method_id">Phương thức thanh toán:</label>
                                <select name="method_id" id="method_id" required>
                                    <option value="1">Thanh toán COD</option>
                                    <option value="2">Thanh toán Online</option>
                                </select>
                            </div>

                            <button type="submit">Tiếp tục</button>
                        </form>
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
