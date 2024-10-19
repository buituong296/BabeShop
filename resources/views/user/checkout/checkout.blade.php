@extends('layouts.app')

@section('content')
<main class="content-wrapper">
    <div class="container py-5">
      <div class="row pt-1 pt-sm-3 pt-lg-4 pb-2 pb-md-3 pb-lg-4 pb-xl-5">
        <div class="col-lg-8 col-xl-7 mb-5 mb-lg-0">
          <div class="accordion d-flex flex-column gap-5 pe-lg-4 pe-xl-0" id="checkout">

            <!-- Tổng quan thông tin giao hàng + Nút chỉnh sửa -->

            <!-- Form địa chỉ giao hàng -->
            <div class="d-flex align-items-start">
              <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle fs-sm fw-semibold lh-1 flex-shrink-0" style="width: 2rem; height: 2rem; margin-top: -.125rem">1</div>
              <div class="w-100 ps-3 ps-md-4">
                <h1 class="h5 mb-md-4">Địa chỉ giao hàng</h1>
                <form class="needs-validation" novalidate="">
                  <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 mb-4">
                    <div class="col">
                      <label for="shipping-fn" class="form-label">Họ <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" id="shipping-fn" required="">
                    </div>
                    <div class="col">
                      <label for="shipping-ln" class="form-label">Tên <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" id="shipping-ln" required="">
                    </div>
                    <div class="col">
                      <label for="shipping-email" class="form-label">Địa chỉ email <span class="text-danger">*</span></label>
                      <input type="email" class="form-control form-control-lg" id="shipping-email" required="">
                    </div>
                    <div class="col">
                      <label for="shipping-mobile" class="form-label">Số điện thoại</label>
                      <input type="text" class="form-control form-control-lg" id="shipping-mobile">
                    </div>
                    <div class="col">
                      <label class="form-label">Thành phố <span class="text-danger">*</span></label>
                      <select class="form-select" data-select="{
                        &quot;searchEnabled&quot;: true,
                        &quot;classNames&quot;: {
                          &quot;containerInner&quot;: &quot;form-select form-select-lg&quot;
                        }
                      }" required="">
                        <option value="">Chọn thành phố của bạn</option>
                        <option value="New York City">New York City</option>
                        <option value="Los Angeles">Los Angeles</option>
                        <option value="Chicago">Chicago</option>
                        <option value="Houston">Houston</option>
                        <option value="Phoenix">Phoenix</option>
                        <option value="Philadelphia">Philadelphia</option>
                        <option value="San Antonio">San Antonio</option>
                        <option value="San Diego">San Diego</option>
                        <option value="Dallas">Dallas</option>
                        <option value="San Jose">San Jose</option>
                        <option value="Austin">Austin</option>
                        <option value="Seattle">Seattle</option>
                      </select>
                    </div>
                    <div class="col">
                      <label for="shipping-postcode" class="form-label">Mã bưu chính <span class="text-danger">*</span></label>
                      <input type="text" class="form-control form-control-lg" id="shipping-postcode" required="">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="shipping-address" class="form-label">Số nhà / căn hộ và địa chỉ đường <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg" id="shipping-address" required="">
                  </div>
                  <div class="nav mb-4">
                    <a class="nav-link px-0" href="#!">
                      Thêm dòng địa chỉ
                      <i class="ci-plus fs-base ms-1"></i>
                    </a>
                  </div>
                  <h3 class="h6">
                    Địa chỉ thanh toán
                    <i class="ci-info text-body-secondary align-middle ms-2" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-custom-class="popover-sm" data-bs-content="Bỏ chọn hộp kiểm bên dưới nếu địa chỉ thanh toán của bạn khác với địa chỉ giao hàng."></i>
                  </h3>
                  <div class="form-check mb-lg-4">
                    <input type="checkbox" class="form-check-input" id="same-address" checked="">
                    <label for="same-address" class="form-check-label">Giống với địa chỉ giao hàng</label>
                  </div>
                  <a class="btn btn-lg btn-primary w-100 d-none d-lg-flex" href="{{route('checkout_payment')}}">
                    Tiếp tục
                    <i class="ci-chevron-right fs-lg ms-1 me-n1"></i>
                  </a>
                </form>
              </div>
            </div>

            <!-- Phương thức thanh toán -->
            <div class="d-flex align-items-start">
              <div class="d-flex align-items-center justify-content-center bg-body-secondary text-body-secondary rounded-circle fs-sm fw-semibold lh-1 flex-shrink-0" style="width: 2rem; height: 2rem; margin-top: -.125rem">2</div>
              <h2 class="h5 text-body-secondary ps-3 ps-md-4 mb-0">Thanh toán</h2>
            </div>
          </div>
        </div>

        <!-- Tóm tắt đơn hàng (sidebar cố định) -->
       @include('user/partials/order_summary')
      </div>
    </div>
  </main>
@endsection
