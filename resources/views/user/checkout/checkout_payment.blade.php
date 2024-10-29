@extends('layouts.app')

@section('content')

    <main class="content-wrapper">
        <div class="container py-5">
          <div class="row pt-1 pt-sm-3 pt-lg-4 pb-2 pb-md-3 pb-lg-4 pb-xl-5">
            <div class="col-lg-8 col-xl-7 mb-5 mb-lg-0">
              <div class="accordion d-flex flex-column gap-5 pe-lg-4 pe-xl-0" id="checkout">

                <!-- Tổng quan thông tin giao hàng + Nút chỉnh sửa -->
                <div class="accordion-item d-flex align-items-start border-0">
                    <div class="d-flex align-items-center justify-content-center bg-body-secondary text-dark-emphasis rounded-circle flex-shrink-0" style="width: 2rem; height: 2rem; margin-top: -.125rem">
                      <i class="ci-check fs-base"></i>
                    </div>
                    <div class="w-100 ps-3 ps-md-4">
                      <div class="d-flex align-items-center">
                        <h2 class="accordion-header h5 mb-0 me-3" id="shippingAddressHeading">
                          <span class="d-none d-lg-inline">Địa chỉ giao hàng</span>
                          <button type="button" class="accordion-button collapsed fs-5 d-lg-none py-1" data-bs-toggle="collapse" data-bs-target="#shippingAddress" aria-expanded="false" aria-controls="shippingAddress">
                            <span class="me-2">Địa chỉ giao hàng</span>
                          </button>
                        </h2>
                        <div class="nav ms-auto">
                          <a class="nav-link text-decoration-underline p-0" href="{{route('checkout')}}">Chỉnh sửa</a>
                        </div>
                      </div>
                      <div class="accordion-collapse collapse d-lg-block" id="shippingAddress" aria-labelledby="shippingAddressHeading" data-bs-parent="#checkout">
                        <ul class="accordion-body list-unstyled fs-sm p-0 pt-3 pt-md-4 mb-0">
                          <li> {{ $customerInfo['user_name'] }}</li>
                          <li> {{ $customerInfo['tel'] }}</li>
                          <li> {{ $customerInfo['city'] }}</li>
                          <li> {{ $customerInfo['district'] }}</li>
                          <li> {{ $customerInfo['commune'] }}</li>
                          <li> {{ $customerInfo['address'] }}</li>
                        </ul>
                      </div>
                    </div>
                </div>

                <!-- Form địa chỉ giao hàng -->

                <div class="d-flex align-items-start">
                    <div class="d-flex align-items-start">
                        <div class="d-flex align-items-center justify-content-center bg-body-secondary text-body-secondary rounded-circle fs-sm fw-semibold lh-1 flex-shrink-0" style="width: 2rem; height: 2rem; margin-top: -.125rem">2</div>
                        <h2 class="h5 text-body-secondary ps-3 ps-md-4 mb-0">Thanh toán</h2>
                      </div>

                <div>
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

                <!-- Phương thức thanh toán -->

              </div>
            </div>

            <!-- Tóm tắt đơn hàng (sidebar cố định) -->
           @include('user/partials/order_summary')
          </div>
        </div>
    </main>
@endsection
