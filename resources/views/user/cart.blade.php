@extends('layouts.app')

@section('content')
<section class="container pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
    <h1 class="h3 mb-4">Giỏ hàng</h1>
    <div class="row">

      <!-- Items list -->
      <div class="col-lg-8">
        <div class="pe-lg-2 pe-xl-3 me-xl-3">
            <p class="fs-sm">Mua thêm <span class="text-dark-emphasis fw-semibold">$183</span> để được <span class="text-dark-emphasis fw-semibold">Miễn phí giao hàng</span></p>
            <div class="progress w-100 overflow-visible mb-4" role="progressbar" aria-label="Free shipping progress" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
            <div class="progress-bar bg-warning rounded-pill position-relative overflow-visible" style="width: 75%; height: 4px">
              <div class="position-absolute top-50 end-0 d-flex align-items-center justify-content-center translate-middle-y bg-body border border-warning rounded-circle me-n1" style="width: 1.5rem; height: 1.5rem">
                <i class="ci-star-filled text-warning"></i>
              </div>
            </div>
          </div>

          <!-- Table of items -->
          <table class="table position-relative z-2 mb-4">
            <thead>
              <tr>
                <th scope="col" class="fs-sm fw-normal py-3 ps-0"><span class="text-body">Sản phẩm</span></th>
                <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-xl-table-cell"><span class="text-body">Giá</span></th>
                <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-md-table-cell"><span class="text-body">Số lượng</span></th>
                <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-md-table-cell"><span class="text-body">Tổng</span></th>
                <th scope="col" class="py-0 px-0">
                  <div class="nav justify-content-end">
                    <button type="button" class="nav-link d-inline-block text-decoration-underline text-nowrap py-3 px-0">Xóa sản phẩm</button>
                  </div>
                </th>
              </tr>
            </thead>
            <tbody class="align-middle">

              <!-- Item -->
              <tr>
                <td class="py-3 ps-0">
                  <div class="d-flex align-items-center">
                    <a class="flex-shrink-0" href="shop-product-general-electronics.html">
                      <img src="assets/img/shop/electronics/thumbs/08.png" width="110" alt="iPhone 14">
                    </a>
                    <div class="w-100 min-w-0 ps-2 ps-xl-3">
                      <h5 class="d-flex animate-underline mb-2">
                        <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">Apple iPhone 14 128GB</a>
                      </h5>
                      <ul class="list-unstyled gap-1 fs-xs mb-0">
                        <li><span class="text-body-secondary">Color:</span> <span class="text-dark-emphasis fw-medium">White</span></li>
                        <li><span class="text-body-secondary">Model:</span> <span class="text-dark-emphasis fw-medium">128GB</span></li>
                        <li class="d-xl-none"><span class="text-body-secondary">Price:</span> <span class="text-dark-emphasis fw-medium">$899.00</span></li>
                      </ul>
                      <div class="count-input rounded-2 d-md-none mt-3">
                        <button type="button" class="btn btn-sm btn-icon" data-decrement="" aria-label="Decrement quantity">
                          <i class="ci-minus"></i>
                        </button>
                        <input type="number" class="form-control form-control-sm" value="1" readonly="">
                        <button type="button" class="btn btn-sm btn-icon" data-increment="" aria-label="Increment quantity">
                          <i class="ci-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="h6 py-3 d-none d-xl-table-cell">$899.00</td>
                <td class="py-3 d-none d-md-table-cell">
                  <div class="count-input">
                    <button type="button" class="btn btn-icon" data-decrement="" aria-label="Decrement quantity">
                      <i class="ci-minus"></i>
                    </button>
                    <input type="number" class="form-control" value="1" readonly="">
                    <button type="button" class="btn btn-icon" data-increment="" aria-label="Increment quantity">
                      <i class="ci-plus"></i>
                    </button>
                  </div>
                </td>
                <td class="h6 py-3 d-none d-md-table-cell">$899.00</td>
                <td class="text-end py-3 px-0">
                  <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Remove" aria-label="Remove from cart"></button>
                </td>
              </tr>

             
            </tbody>
          </table>

          <div class="nav position-relative z-2 mb-4 mb-lg-0">
            <a class="nav-link animate-underline px-0" href="{{route('home')}}">
              <i class="ci-chevron-left fs-lg me-1"></i>
              <span class="animate-target">Tiếp tục mua sắm</span>
            </a>
          </div>
        </div>
      </div>


      <!-- Order summary (sticky sidebar) -->
      <aside class="col-lg-4" style="margin-top: -100px">
        <div class="position-sticky top-0" style="padding-top: 100px">
          <div class="bg-body-tertiary rounded-5 p-4 mb-3">
            <div class="p-sm-2 p-lg-0 p-xl-2">
              <h5 class="border-bottom pb-4 mb-4">Tổng hóa đơn</h5>
              <ul class="list-unstyled fs-sm gap-3 mb-0">
                <li class="d-flex justify-content-between">
                  Tổng số tiền (3 mặt hàng):
                  <span class="text-dark-emphasis fw-medium">$2,427.00</span>
                </li>
                <li class="d-flex justify-content-between">
                  Tiết kiệm:
                  <span class="text-danger fw-medium">-$110.00</span>
                </li>
                <li class="d-flex justify-content-between">
                  Thuế:
                  <span class="text-dark-emphasis fw-medium">$73.40</span>
                </li>
                <li class="d-flex justify-content-between">
                  Phí bận chuyển:
                  <span class="text-dark-emphasis fw-medium">Được tính khi thanh toán</span>
                </li>
              </ul>
              <div class="border-top pt-4 mt-4">
                <div class="d-flex justify-content-between mb-3">
                  <span class="fs-sm">Tổng thanh toán dự kiến:</span>
                  <span class="h5 mb-0">$2,390.40</span>
                </div>
                <a class="btn btn-lg btn-primary w-100" href="checkout-v1-delivery-1.html">
                  Đi tới thanh toán
                  <i class="ci-chevron-right fs-lg ms-1 me-n1"></i>
                </a>
                <div class="nav justify-content-center fs-sm mt-3">
                  <a class="nav-link text-decoration-underline p-0 me-1" href="#authForm" data-bs-toggle="offcanvas" role="button">Tạo tài khoản mới</a>
                  và nhận
                  <span class="text-dark-emphasis fw-medium ms-1">239 điểm thưởng</span>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion bg-body-tertiary rounded-5 p-4">
            <div class="accordion-item border-0">
              <h3 class="accordion-header" id="promoCodeHeading">
                <button type="button" class="accordion-button animate-underline collapsed py-0 ps-sm-2 ps-lg-0 ps-xl-2" data-bs-toggle="collapse" data-bs-target="#promoCode" aria-expanded="false" aria-controls="promoCode">
                  <i class="ci-percent fs-xl me-2"></i>
                  <span class="animate-target me-2">Áp dụng mã giảm giá</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="promoCode" aria-labelledby="promoCodeHeading">
                <div class="accordion-body pt-3 pb-2 ps-sm-2 px-lg-0 px-xl-2">
                  <form class="needs-validation d-flex gap-2" novalidate="">
                    <div class="position-relative w-100">
                      <input type="text" class="form-control" placeholder="Nhập mã giảm giá" required="">
                      <div class="invalid-tooltip bg-transparent py-0">Hãy nhập mã giảm giá hợp lệ!</div>
                    </div>
                    <button type="submit" class="btn btn-dark">Xác nhận</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </aside>
    </div>
  </section>


  @include('user.partials.trending_product')
@endsection
