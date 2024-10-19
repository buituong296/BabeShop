@extends('layouts.app')

@section('content')

  <div class="row row-cols-1 row-cols-lg-2 g-0 mx-auto" style="max-width: 1920px">

    <!-- Cột nội dung cảm ơn -->
    <div class="col d-flex flex-column justify-content-center py-5 px-xl-4 px-xxl-5">
      <div class="w-100 pt-sm-2 pt-md-3 pt-lg-4 pb-lg-4 pb-xl-5 px-3 px-sm-4 pe-lg-0 ps-lg-5 mx-auto ms-lg-auto me-lg-4" style="max-width: 740px">
        <div class="d-flex align-items-sm-center border-bottom pb-4 pb-md-5">
          <div class="d-flex align-items-center justify-content-center bg-success text-white rounded-circle flex-shrink-0" style="width: 3rem; height: 3rem; margin-top: -.125rem">
            <i class="ci-check fs-4"></i>
          </div>
          <div class="w-100 ps-3">
            <div class="fs-sm mb-1">Đơn hàng #234000</div>
            <div class="d-sm-flex align-items-center">
              <h1 class="h4 mb-0 me-3">Cảm ơn bạn đã đặt hàng!</h1>
              <div class="nav mt-2 mt-sm-0 ms-auto">
                <a class="nav-link text-decoration-underline p-0" href="#!">Theo dõi đơn hàng</a>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex flex-column gap-4 pt-3 pb-5 mt-3">
          <div>
            <h3 class="h6 mb-2">Giao hàng</h3>
            <p class="fs-sm mb-0">567 Cherry Souse Lane Sacramento, 95829</p>
          </div>
          <div>
            <h3 class="h6 mb-2">Thời gian</h3>
            <p class="fs-sm mb-0">Chủ Nhật, 9 tháng 5, 12:00 - 14:00</p>
          </div>
          <div>
            <h3 class="h6 mb-2">Thanh toán</h3>
            <p class="fs-sm mb-0">Visa: **** **** **** 8395</p>
          </div>
        </div>
        <div class="bg-success rounded px-4 py-4" style="--cz-bg-opacity: .2">
          <div class="py-3">
            <h2 class="h4 text-center pb-2 mb-1">🎉 Chúc mừng! Giảm 30% cho lần mua tiếp theo!</h2>
            <p class="fs-sm text-center mb-4">Sử dụng mã giảm giá ngay hoặc tìm trong tài khoản cá nhân của bạn.</p>
            <div class="d-flex gap-2 mx-auto" style="max-width: 500px">
              <input type="text" class="form-control border-white border-opacity-10 w-100" id="couponCode" value="30%SALEOFF" readonly="">
              <button type="button" class="btn btn-dark" data-copy-text-from="#couponCode">Sao chép mã</button>
            </div>
          </div>
        </div>
        <p class="fs-sm pt-4 pt-md-5 mt-2 mt-sm-3 mt-md-0 mb-0">Cần trợ giúp?<a class="fw-medium ms-2" href="#!">Liên hệ với chúng tôi</a></p>
      </div>
    </div>

    <!-- Sản phẩm liên quan -->
    <div class="col pt-sm-3 p-md-5 ps-lg-5 py-lg-4 pe-lg-4 p-xxl-5">
      <div class="position-relative d-flex align-items-center h-100 py-5 px-3 px-sm-4 px-xl-5">
        <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary rounded-5 d-none d-md-block"></span>
        <span class="position-absolute top-0 start-0 w-100 h-100 bg-body-tertiary d-md-none"></span>
        <div class="position-relative w-100 z-2 mx-auto pb-2 pb-sm-3 pb-md-0" style="max-width: 636px">
          <h2 class="h4 text-center pb-3">Có thể bạn cũng thích</h2>
          <div class="row row-cols-2 g-3 g-sm-4 mb-4">

            <!-- Sản phẩm -->
            @foreach ($products as $item)
            <div class="col">
              <div class="product-card animate-underline hover-effect-opacity bg-body rounded shadow-none">
                <div class="position-relative">
                  <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                    <div class="d-flex flex-column gap-2">
                      <button type="button" class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex" aria-label="Thêm vào danh sách yêu thích">
                        <i class="ci-heart fs-base animate-target"></i>
                      </button>
                      <button type="button" class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex" aria-label="So sánh">
                        <i class="ci-refresh-cw fs-base animate-target"></i>
                      </button>
                    </div>
                  </div>
                  <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                    <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Thêm hành động">
                      <i class="ci-more-vertical fs-lg"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end fs-xs p-2" style="min-width: auto">
                      <li>
                        <a class="dropdown-item" href="#!">
                          <i class="ci-heart fs-sm ms-n1 me-2"></i>
                          Thêm vào danh sách yêu thích
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#!">
                          <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                          So sánh
                        </a>
                      </li>
                    </ul>
                  </div>
                  <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="shop-product-general-electronics.html">
                    <span class="badge bg-danger position-absolute top-0 start-0 mt-2 ms-2 mt-lg-3 ms-lg-3">-21%</span>
                    <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                      <img src="{{ asset('storage/' . $item->image) }}" alt="">
                    </div>
                  </a>
                </div>
                <div class="w-100 min-w-0 px-2 pb-2 px-sm-3 pb-sm-3">
                  <div class="d-flex align-items-center gap-2 mb-2">
                    <div class="d-flex gap-1 fs-xs">
                      <i class="ci-star-filled text-warning"></i>
                      <i class="ci-star-filled text-warning"></i>
                      <i class="ci-star-filled text-warning"></i>
                      <i class="ci-star-filled text-warning"></i>
                      <i class="ci-star text-body-tertiary opacity-75"></i>
                    </div>
                    <span class="text-body-tertiary fs-xs">(123)</span>
                  </div>
                  <h3 class="pb-1 mb-2">
                    <a class="d-block fs-sm fw-medium text-truncate" href="shop-product-general-electronics.html">
                      <span class="animate-target">{{$item->name}}</span>
                    </a>
                  </h3>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="h5 lh-1 mb-0">{{$item->price}} <del class="text-body-tertiary fs-sm fw-normal">$430.00</del></div>
                    <button type="button" class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2" aria-label="Thêm vào giỏ hàng">
                      <i class="ci-shopping-cart fs-base animate-target"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>

          <a class="btn btn-lg btn-primary w-100" href="{{route('product')}}">
            Tiếp tục mua sắm
            <i class="ci-chevron-right fs-lg ms-1 me-n1"></i>
          </a>
        </div>
      </div>
    </div>
  </div>

@endsection
