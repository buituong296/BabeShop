@extends('layouts.app')

@section('content')
<main class="content-wrapper">
    <div class="container py-5">
      <div class="row pt-1 pt-sm-3 pt-lg-4 pb-2 pb-md-3 pb-lg-4 pb-xl-5">
        <div class="col-lg-8 col-xl-7 mb-5 mb-lg-0">
          <div class="accordion d-flex flex-column gap-5 pe-lg-4 pe-xl-0" id="checkout">

            <!-- Form địa chỉ giao hàng -->
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
                    <li>Jane Cooper</li>
                    <li>jane.cooper@email.com</li>
                    <li>(215) 555-1234</li>
                    <li>Pennsylvania 15006</li>
                    <li>567 Cherry Lane Apt B12 Harrisburg</li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Phương thức thanh toán -->
            <div class="d-flex align-items-start">
              <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle fs-sm fw-semibold lh-1 flex-shrink-0" style="width: 2rem; height: 2rem; margin-top: -.125rem">2</div>
              <div class="w-100 ps-3 ps-md-4">
                <h2 class="h5 mb-0">Thanh toán</h2>
                <div class="mb-4" id="paymentMethod" role="list">

                  <!-- Thanh toán khi nhận hàng -->
                  <div class="mt-4">
                    <div class="form-check mb-0" role="listitem" data-bs-toggle="collapse" data-bs-target="#cash" aria-expanded="false" aria-controls="cash">
                      <label class="form-check-label w-100 text-dark-emphasis fw-semibold">
                        <input type="radio" class="form-check-input fs-base me-2 me-sm-3" name="payment-method">
                        Thanh toán khi nhận hàng
                      </label>
                    </div>
                    <div class="collapse" id="cash" data-bs-parent="#paymentMethod">
                      <div class="d-sm-flex align-items-center pt-3 pt-sm-4 pb-2 ps-3 ms-2 ms-sm-3">
                        <span class="fs-sm me-3">Tôi cần tiền thối từ:</span>
                        <div class="input-group mt-2 mt-sm-0" style="max-width: 150px">
                          <span class="input-group-text">
                            <i class="ci-dollar-sign"></i>
                          </span>
                          <input type="number" class="form-control" aria-label="Số tiền">
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Thẻ tín dụng -->
                  <div class="mt-4">
                    <div class="form-check mb-0" role="listitem" data-bs-toggle="collapse" data-bs-target="#card" aria-expanded="true" aria-controls="card">
                      <label class="form-check-label d-flex align-items-center text-dark-emphasis fw-semibold">
                        <input type="radio" class="form-check-input fs-base me-2 me-sm-3" name="payment-method" checked="">
                        Thẻ tín dụng hoặc thẻ ghi nợ
                        <span class="d-none d-sm-flex gap-2 ms-3">
                          <img src="assets/img/payment-methods/amex.svg" class="d-block bg-info rounded-1" width="36" alt="Amex">
                          <img src="assets/img/payment-methods/visa-light-mode.svg" class="d-none-dark" width="36" alt="Visa">
                          <img src="assets/img/payment-methods/visa-dark-mode.svg" class="d-none d-block-dark" width="36" alt="Visa">
                          <img src="assets/img/payment-methods/mastercard.svg" width="36" alt="Mastercard">
                          <img src="assets/img/payment-methods/maestro.svg" width="36" alt="Maestro">
                        </span>
                      </label>
                    </div>
                    <div class="collapse show" id="card" data-bs-parent="#paymentMethod">
                      <form class="needs-validation pt-4 pb-2 ps-3 ms-2 ms-sm-3" novalidate="">
                        <div class="position-relative mb-3 mb-sm-4" data-input-format="{&quot;creditCard&quot;: true}">
                          <input type="text" class="form-control form-control-lg form-icon-end" placeholder="Số thẻ" required="">
                          <span class="position-absolute d-flex top-50 end-0 translate-middle-y fs-5 text-body-tertiary me-3" data-card-icon=""></span>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4">
                          <div class="col">
                            <input type="text" class="form-control form-control-lg" data-input-format="{&quot;date&quot;: true, &quot;datePattern&quot;: [&quot;m&quot;, &quot;y&quot;]}" placeholder="MM/YY">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control form-control-lg" maxlength="4" data-input-format="{&quot;numeral&quot;: true, &quot;numeralPositiveOnly&quot;: true, &quot;numeralThousandsGroupStyle&quot;: &quot;none&quot;}" placeholder="CVC">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <!-- PayPal -->
                  <div class="mt-4">
                    <div class="form-check mb-0" role="listitem" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                      <label class="form-check-label d-flex align-items-center text-dark-emphasis fw-semibold">
                        <input type="radio" class="form-check-input fs-base me-2 me-sm-3" name="payment-method">
                        PayPal
                        <img src="assets/img/payment-methods/paypal-icon.svg" class="ms-3" width="16" alt="PayPal">
                      </label>
                    </div>
                    <div class="collapse" id="paypal" data-bs-parent="#paymentMethod"></div>
                  </div>

                  <!-- Google Pay -->
                  <div class="mt-4">
                    <div class="form-check mb-0" role="listitem" data-bs-toggle="collapse" data-bs-target="#googlepay" aria-expanded="false" aria-controls="googlepay">
                      <label class="form-check-label d-flex align-items-center text-dark-emphasis fw-semibold">
                        <input type="radio" class="form-check-input fs-base me-2 me-sm-3" name="payment-method">
                        Google Pay
                        <img src="assets/img/payment-methods/google-icon.svg" class="ms-3" width="20" alt="Google Pay">
                      </label>
                    </div>
                    <div class="collapse" id="googlepay" data-bs-parent="#paymentMethod"></div>
                  </div>
                </div>

                <!-- Thêm mã giảm giá -->
                <div class="nav pb-3 mb-2 mb-sm-3">
                  <a class="nav-link animate-underline p-0" href="#!">
                    <i class="ci-plus-circle fs-xl ms-a me-2"></i>
                    <span class="animate-target">Thêm mã giảm giá hoặc thẻ quà tặng</span>
                  </a>
                </div>

                <!-- Bình luận thêm -->
                <textarea class="form-control form-control-lg mb-4" rows="3" placeholder="Bình luận thêm"></textarea>

                <div class="form-check mb-lg-4">
                  <input type="checkbox" class="form-check-input" id="accept-terms">
                  <label for="accept-terms" class="form-check-label nav align-items-center">
                    Tôi chấp nhận
                    <a class="nav-link text-decoration-underline fw-normal ms-1 p-0" href="terms-and-conditions.html">Điều khoản và Điều kiện</a>
                  </label>
                </div>

                <!-- Nút Thanh toán chỉ hiển thị trên màn hình > 991px -->
                <a class="btn btn-lg btn-primary w-100 d-none d-lg-flex" href="{{route('checkout_done')}}">Thanh toán $2,406.90</a>
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
