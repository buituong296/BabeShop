@extends('layouts.app')


@section('content')
    <!-- Page content -->
    <main class="content-wrapper">

        <!-- Hero slider -->
        <section class="container pt-4">
            <div class="row">
                <div class="col-lg-9 offset-lg-3">
                    <div class="position-relative">
                        <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark rtl-flip"
                            style="background-image: url('assets/img/home/electronics/hero-slider/bg4.png') "></span>
                        <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark rtl-flip"
                            style="background-image: url('assets/img/home/electronics/hero-slider/bg5.png') "></span>
                        <div class="row justify-content-center position-relative z-2">
                            <div class="col-xl-5 col-xxl-4 offset-xxl-1 d-flex align-items-center mt-xl-n3">

                                <!-- Nội dung văn bản master slider -->
                                <div class="swiper px-5 pe-xl-0 ps-xxl-0 me-xl-n5"
                                    data-swiper="{
                    &quot;spaceBetween&quot;: 64,
                    &quot;loop&quot;: true,
                    &quot;speed&quot;: 400,
                    &quot;controlSlider&quot;: &quot;#sliderImages&quot;,
                    &quot;autoplay&quot;: {
                      &quot;delay&quot;: 5500,
                      &quot;disableOnInteraction&quot;: false},&quot;scrollbar&quot;: {&quot;el&quot;: &quot;.swiper-scrollbar&quot;}}">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide text-center text-xl-start pt-5 py-xl-5">
                                            <p class="text" style="color: white" >Thú nhồi bông êm ái,mềm mại</p>
                                            <h2 style="color: white" class="display-4 pb-2 pb-xl">Plushie Blemishine</h2>
                                            <a class="btn btn-lg btn-primary" href="{{ route('product') }}">
                                                Mua ngay
                                                <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
                                            </a>
                                        </div>
                                        <div class="swiper-slide text-center text-xl-start pt-5 py-xl-5">
                                            <p class="text" style="color: white">Chủ đề BBQ</p>
                                            <h2 style="color: white" class="display-4 pb-2 pb-xl">HighMore Figure</h2>
                                            <a class="btn btn-lg btn-primary" href="{{ route('product') }}">
                                                Mua ngay
                                                <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
                                            </a>
                                        </div>
                                        <div class="swiper-slide text-center text-xl-start pt-5 py-xl-5">
                                            <p class="text" style="color: white">Phụ kiện nhỏ nhắn,dễ thương</p>
                                            <h2 style="color: white" class="display-4 pb-2 pb-xl">Móc khóa Muelsyse</h2>
                                            <a class="btn btn-lg btn-primary" href="{{ route('product') }}">
                                                Mua ngay
                                                <i class="ci-arrow-up-right fs-lg ms-2 me-n1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-9 col-sm-7 col-md-6 col-lg-5 col-xl-7">

                                <!-- Hình ảnh được liên kết (slider điều khiển) -->
                                <div class="swiper user-select-none" id="sliderImages"
                                    data-swiper="{
                    &quot;allowTouchMove&quot;: false,
                    &quot;loop&quot;: true,
                    &quot;effect&quot;: &quot;fade&quot;,
                    &quot;fadeEffect&quot;: {
                      &quot;crossFade&quot;: true
                    }
                  }">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide d-flex justify-content-end">
                                            <div class="ratio rtl-flip"
                                                style="max-width: 495px; --cz-aspect-ratio: calc(537 / 495 * 100%)">
                                                <img src="assets/img/home/electronics/hero-slider/01.webp" alt="Hình ảnh">
                                            </div>
                                        </div>
                                        <div class="swiper-slide d-flex justify-content-end">
                                            <div class="ratio rtl-flip"
                                                style="max-width: 495px; --cz-aspect-ratio: calc(537 / 495 * 100%)">
                                                <img src="assets/img/home/electronics/hero-slider/02.webp" alt="Hình ảnh">
                                            </div>
                                        </div>
                                        <div class="swiper-slide d-flex justify-content-end">
                                            <div class="ratio rtl-flip"
                                                style="max-width: 495px; --cz-aspect-ratio: calc(537 / 495 * 100%)">
                                                <img src="assets/img/home/electronics/hero-slider/03.webp" alt="Hình ảnh">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thanh cuộn -->
                        <div class="row justify-content-center" data-bs-theme="dark">
                            <div class="col-xxl-10">
                                <div class="position-relative mx-5 mx-xxl-0">
                                    <div class="swiper-scrollbar mb-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Features -->
        <section class="container pt-5 mt-1 mt-sm-3 mt-lg-4">
            <div class="row row-cols-2 row-cols-md-4 g-4">

                <!-- Mục -->
                <div class="col">
                    <div class="d-flex flex-column flex-xxl-row align-items-center">
                        <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                            <i class="ci-delivery fs-2 m-xxl-1"></i>
                        </div>
                        <div class="text-center text-xxl-start ps-xxl-3">
                            <h3 class="h6 mb-1">Miễn Phí Giao & Đổi Trả</h3>
                            <p class="fs-sm mb-0">Cho đơn > 3.000.000 VNĐ</p>
                        </div>
                    </div>
                </div>

                <!-- Mục -->
                <div class="col">
                    <div class="d-flex flex-column flex-xxl-row align-items-center">
                        <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                            <i class="ci-credit-card fs-2 m-xxl-1"></i>
                        </div>
                        <div class="text-center text-xxl-start ps-xxl-3">
                            <h3 class="h6 mb-1">Thanh Toán An Toàn</h3>
                            <p class="fs-sm mb-0">Đảm bảo thanh toán an toàn</p>
                        </div>
                    </div>
                </div>

                <!-- Mục -->
                <div class="col">
                    <div class="d-flex flex-column flex-xxl-row align-items-center">
                        <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                            <i class="ci-refresh-cw fs-2 m-xxl-1"></i>
                        </div>
                        <div class="text-center text-xxl-start ps-xxl-3">
                            <h3 class="h6 mb-1">Đảm Bảo Hoàn Tiền</h3>
                            <p class="fs-sm mb-0">Hoàn tiền trong 30 ngày</p>
                        </div>
                    </div>
                </div>

                <!-- Mục -->
                <div class="col">
                    <div class="d-flex flex-column flex-xxl-row align-items-center">
                        <div class="d-flex text-dark-emphasis bg-body-tertiary rounded-circle p-4 mb-3 mb-xxl-0">
                            <i class="ci-chat fs-2 m-xxl-1"></i>
                        </div>
                        <div class="text-center text-xxl-start ps-xxl-3">
                            <h3 class="h6 mb-1">Hỗ Trợ Khách Hàng 24/7</h3>
                            <p class="fs-sm mb-0">Dịch vụ hỗ trợ thân thiện</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>



        <!-- New arrivals (List) -->
        <section class="container pt-5 mt-1 mt-sm-2 mt-md-3 mt-lg-4">
            <h2 class="h3 pb-2 pb-sm-3">Hàng mới về</h2>
            <div class="row">


    <!-- New arrivals (List) -->
    <section class="container pt-5 mt-1 mt-sm-2 mt-md-3 mt-lg-4">


        <h2 class="h3 pb-2 pb-sm-3">Hàng mới về</h2>
        <div class="row">

          <!-- Banner -->
          <div class="col-lg-4" data-bs-theme="dark">
            <div class="d-flex flex-column align-items-center justify-content-end h-100 text-center overflow-hidden rounded-5 px-4 px-lg-3 pt-4 pb-5" style="background: #1d2c41 url(assets/img/home/electronics/banner/backgroundbabel.png) center/cover no-repeat">
              <div class="ratio animate-up-down position-relative z-2 me-lg-4" style="max-width: 320px; margin-bottom: -19%; --cz-aspect-ratio: calc(690 / 640 * 100%)">
                <img src="assets/img/home/electronics/banner/productbabel.png" alt="Laptop">
              </div>
              <h3 class="display-6 mb-2 text-shadow">Bộ ghim kim loại</h3>
              <p class=" text fw-medium mb-4 text-shadow">Texas the Omertosa & Lunacub</p>
              <a class="btn btn-sm btn-secondary" href="{{ route('product') }}" >
                Xem thêm
                <i class="ci-arrow-up-right fs-base ms-1 me-n1"></i>
              </a>

            </div>
          </div>


                </div>

                <!-- Danh sách sản phẩm -->
                <div class="col-sm-6 col-lg-4 d-flex flex-column gap-3 pt-3 py-lg-4">

                    <!-- Mục sản phẩm -->
                    @foreach ($products_2 as $product)
                        <div class="position-relative animate-underline d-flex align-items-center ps-xl-3">
                            <div class="ratio ratio-1x1 flex-shrink-0" style="width: 110px">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Đồng hồ thông minh"
                                    href="{{ route('productdetail', $product->id) }}">
                            </div>
                            <div class="w-100 min-w-0 ps-2 ps-sm-3">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="d-flex gap-1 fs-xs">
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                    </div>
                                    <span class="text-body-tertiary fs-xs">45</span>
                                </div>
                                <h4 class="mb-2">
                                    <a class="stretched-link d-block fs-sm fw-medium text-truncate"
                                        href="{{ route('productdetail', $product->id) }}">
                                        <span class="animate-target">{{ $product->name }}</span>
                                    </a>
                                </h4>
                                <div class="h5 mb-0">{{ number_format($product->price, 0, ',', '.') }} VND</div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>



        <!-- Trending products (Grid) -->
        <section class="container pt-5 mt-2 mt-sm-3 mt-lg-4">

            <!-- Tiêu đề -->
            <div class="d-flex align-items-center justify-content-between border-bottom pb-3 pb-md-4">
                <h2 class="h3 mb-0">Sản phẩm thịnh hành</h2>
                <div class="nav ms-3">
                    <a class="nav-link animate-underline px-0 py-2" href="shop-catalog-electronics.html">
                        <span class="animate-target">Xem tất cả</span>
                        <i class="ci-chevron-right fs-base ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Lưới sản phẩm -->
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 pt-4">

                <!-- Sản phẩm -->
                @foreach ($products_3 as $product)
                <div class="col">
                  <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                      <div class="position-relative">
                          <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                              <div class="d-flex flex-column gap-2">
                                  <button type="button"
                                      class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex"
                                      aria-label="Thêm vào danh sách yêu thích">
                                      <i class="ci-heart fs-base animate-target"></i>
                                  </button>
                                  <button type="button"
                                      class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex"
                                      aria-label="So sánh">
                                      <i class="ci-refresh-cw fs-base animate-target"></i>
                                  </button>
                              </div>
                          </div>
                          <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                              <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body"
                                  data-bs-toggle="dropdown" aria-expanded="false" aria-label="Thao tác khác">
                                  <i class="ci-more-vertical fs-lg"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-end fs-xs p-2" style="min-width: auto">
                                  <li>
                                      <a class="dropdown-item" href="#!">
                                          <i class="ci-heart fs-sm ms-n1 me-2"></i>
                                          Thêm vào yêu thích
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
                          <a class="d-block rounded-top overflow-hidden p-3 p-sm-4"
                              href="{{ route('productdetail', $product->id) }}">
                              {{-- DISCOUNT --}}
                              {{-- <span
                                  class="badge bg-danger position-absolute top-0 start-0 mt-2 ms-2 mt-lg-3 ms-lg-3">-21%</span> --}}
                              <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                                  <img src="{{ asset('storage/' . $product->image) }}" alt="Kính thực tế ảo VR">
                              </div>
                          </a>
                      </div>
                      <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
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
                              <a class="d-block fs-sm fw-medium text-truncate"
                                  href="{{ route('productdetail', $product->id) }}">
                                  <span class="animate-target">{{$product->name}}</span>
                              </a>
                          </h3>
                          <div class="d-flex align-items-center justify-content-between">
                              <div class="h5 lh-1 mb-0">{{$product->price}} VND 
                                {{-- <del class="text-body-tertiary fs-sm fw-normal">430.00 USD</del> --}}
                              </div>
                              <button type="button"
                                  class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2"
                                  aria-label="Thêm vào giỏ hàng">
                                  <i class="ci-shopping-cart fs-base animate-target"></i>
                              </button>
                          </div>
                      </div>
                      <div
                          class="product-card-details position-absolute top-100 start-0 w-100 bg-body rounded-bottom shadow mt-n2 p-3 pt-1">
                          <span class="position-absolute top-0 start-0 w-100 bg-body mt-n2 py-2"></span>
                          <ul class="list-unstyled d-flex flex-column gap-2 m-0">
                              <li class="d-flex align-items-center">
                                  <span class="fs-xs">Màn hình:</span>
                                  <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                                  <span class="text-dark-emphasis fs-xs fw-medium text-end">OLED 1440x1600</span>
                              </li>
                              <li class="d-flex align-items-center">
                                  <span class="fs-xs">Đồ họa:</span>
                                  <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                                  <span class="text-dark-emphasis fs-xs fw-medium text-end">Adreno 540</span>
                              </li>
                              <li class="d-flex align-items-center">
                                  <span class="fs-xs">Âm thanh:</span>
                                  <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                                  <span class="text-dark-emphasis fs-xs fw-medium text-end">2x3.5mm jack</span>
                              </li>
                              <li class="d-flex align-items-center">
                                  <span class="fs-xs">Đầu vào:</span>
                                  <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                                  <span class="text-dark-emphasis fs-xs fw-medium text-end">4 camera tích hợp</span>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
                @endforeach
                

            </div>
        </section>



        <!-- Sale Banner (CTA) -->
        <section class="container pt-5 mt-sm-2 mt-md-3 mt-lg-4">
            <div class="row g-0">
                <div class="col-md-3 mb-n4 mb-md-0">
                    <div class="position-relative d-flex flex-column align-items-center justify-content-center h-100 py-5">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-none d-md-block">
                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark"
                                style="background-color: #accbee"></span>
                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark"
                                style="background-color: #1b273a"></span>
                        </div>
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-md-none">
                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-top-5 d-none-dark"
                                style="background: linear-gradient(90deg, #accbee 0%, #e7f0fd 100%)"></span>
                            <span class="position-absolute top-0 start-0 w-100 h-100 rounded-top-5 d-none d-block-dark"
                                style="background: linear-gradient(90deg, #1b273a 0%, #1f2632 100%)"></span>
                        </div>
                        <div class="position-relative z-1 display-1 text-dark-emphasis text-nowrap mb-0">
                            20
                            <span class="d-inline-block ms-n2">
                                <span class="d-block fs-1">%</span>
                                <span class="d-block fs-5">GIẢM GIÁ</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 position-relative">
                    <div class="position-absolute top-0 start-0 h-100 overflow-hidden rounded-pill z-2 d-none d-md-block"
                        style="color: var(--cz-body-bg); margin-left: -2px">
                        <svg width="4" height="436" viewBox="0 0 4 436" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 0L1.99998 436" stroke="currentColor" stroke-width="3" stroke-dasharray="8 12"
                                stroke-linecap="round"></path>
                        </svg>
                    </div>
                    <div class="position-relative">
                        <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark rtl-flip"
                            style="background: linear-gradient(90deg, #accbee 0%, #e7f0fd 100%)"></span>
                        <span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark rtl-flip"
                            style="background: linear-gradient(90deg, #1b273a 0%, #1f2632 100%)"></span>
                        <div class="row align-items-center position-relative z-2">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="text-center text-md-start py-md-5 px-4 ps-md-5 pe-md-0 me-md-n5">
                                    <h3 class="text-uppercase fw-bold ps-xxl-3 pb-2 mb-1">Khuyến mãi tuần lễ 2024</h3>
                                    <p class="text-body-emphasis ps-xxl-3 mb-0">Sử dụng mã <span
                                            class="d-inline-block fw-semibold bg-white text-dark rounded-pill py-1 px-2">NianBean</span> để nhận ưu đãi tốt nhất</p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center justify-content-md-end pb-5 pb-md-0">
                                <div class="me-xxl-4">
                                    <img src="assets/img/home/electronics/banner/nian.png" class="d-block rtl-flip"
                                        width="420" alt="Máy ảnh">
                                    <div class="d-none d-lg-block" style="margin-bottom: -9%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block" style="padding-bottom: 3%"></div>
        </section>

        <!-- Ưu đãi đặc biệt (Băng chuyền) -->
        <section class="container pt-5 mt-2 mt-sm-3 mt-lg-4">
            <!-- Tiêu đề + Đếm ngược -->
            <div class="d-flex align-items-start align-items-md-center justify-content-between border-bottom pb-3 pb-md-4">
                <div class="d-md-flex align-items-center">
                    <h2 class="h3 pe-3 me-3 mb-md-0">Ưu đãi đặc biệt cho bạn</h2>
                    <div class="d-flex align-items-center" data-countdown-date="demoDate">
                        <div class="btn btn-primary pe-none px-2">
                            <span data-days=""></span>
                            <span>ngày</span>
                        </div>
                        <div class="animate-blinking text-body-tertiary fs-lg fw-medium mx-2">:</div>
                        <div class="btn btn-primary pe-none px-2">
                            <span data-hours=""></span>
                            <span>giờ</span>
                        </div>
                        <div class="animate-blinking text-body-tertiary fs-lg fw-medium mx-2">:</div>
                        <div class="btn btn-primary pe-none px-2">
                            <span data-minutes=""></span>
                            <span>phút</span>
                        </div>
                    </div>
                </div>
                <div class="nav ms-3">
                    <a class="nav-link animate-underline px-0 py-2" href="shop-catalog-electronics.html">
                        <span class="animate-target text-nowrap">Xem tất cả</span>
                        <i class="ci-chevron-right fs-base ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Băng chuyền sản phẩm -->
            <div class="position-relative mx-md-1">
                <!-- Nút trượt trước/sau hiển thị trên màn hình > 500px -->
                <button type="button"
                    class="offers-prev btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start position-absolute top-50 start-0 z-2 translate-middle-y ms-n1 d-none d-sm-inline-flex"
                    aria-label="Trước">
                    <i class="ci-chevron-left fs-lg animate-target"></i>
                </button>
                <button type="button"
                    class="offers-next btn btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end position-absolute top-50 end-0 z-2 translate-middle-y me-n1 d-none d-sm-inline-flex"
                    aria-label="Sau">
                    <i class="ci-chevron-right fs-lg animate-target"></i>
                </button>

                <!-- Băng chuyền -->
                <div class="swiper py-4 px-sm-3"
                    data-swiper='{
            "slidesPerView": 2,
            "spaceBetween": 24,
            "loop": true,
            "navigation": {
              "prevEl": ".offers-prev",
              "nextEl": ".offers-next"
            },
            "breakpoints": {
              "768": {
                "slidesPerView": 3
              },
              "992": {
                "slidesPerView": 4
              }
            }
          }'>
                    <div class="swiper-wrapper">

                        <!-- Sản phẩm -->
                        @foreach ($products_3 as $product)
                        <div class="swiper-slide">
                            <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                                <div class="position-relative">
                                    <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                                        <div class="d-flex flex-column gap-2">
                                            <button type="button"
                                                class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex"
                                                aria-label="Thêm vào danh sách yêu thích">
                                                <i class="ci-heart fs-base animate-target"></i>
                                            </button>
                                            <button type="button"
                                                class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex"
                                                aria-label="So sánh">
                                                <i class="ci-refresh-cw fs-base animate-target"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <a class="d-block rounded-top overflow-hidden p-3 p-sm-4"
                                        href="{{ route('productdetail', $product->id) }}">
                                        <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Tai nghe không dây">
                                        </div>
                                    </a>
                                </div>
                                <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <div class="d-flex gap-1 fs-xs">
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star-filled active"></i>
                                            <i class="star-rating-icon ci-star"></i>
                                        </div>
                                        <span class="text-body-tertiary fs-sm">46 đánh giá</span>
                                    </div>
                                    <h3 class="product-title fs-sm">
                                        <a class="text-body-emphasis text-truncate"
                                            href="{{ route('productdetail', $product->id) }}">{{$product->name}} </a>
                                    </h3>
                                    <div class="d-flex align-items-center flex-wrap gap-2">
                                        <span class="h6 text-accent mb-0">{{$product->price}} ₫</span>
                                        {{-- <span class="text-body-tertiary text-decoration-line-through fs-sm me-2">2.500.000
                                            ₫</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       

                        <!-- Kết thúc sản phẩm -->

                    </div>
                </div>
            </div>
        </section>



        <!-- Thương hiệu -->
        {{-- <section class="container pt-4 pt-md-5 pb-5 mt-sm-2 mb-2 mb-sm-3 mb-md-4 mb-lg-5">
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3 g-md-4 g-lg-3 g-xl-4">
                <div class="col">
                    <a class="btn btn-outline-secondary w-100 rounded-4 p-3" href="shop-catalog-electronics.html">
                        <img src="assets/img/shop/electronics/brands/apple-light-mode.svg" class="d-none-dark"
                            alt="Apple">
                        <img src="assets/img/shop/electronics/brands/apple-dark-mode.svg" class="d-none d-block-dark"
                            alt="Apple">
                    </a>
                </div>
                <div class="col">
                    <a class="btn btn-outline-secondary w-100 rounded-4 p-3" href="shop-catalog-electronics.html">
                        <img src="assets/img/shop/electronics/brands/motorola-light-mode.svg" class="d-none-dark"
                            alt="Motorola">
                        <img src="assets/img/shop/electronics/brands/motorola-dark-mode.svg" class="d-none d-block-dark"
                            alt="Motorola">
                    </a>
                </div>
                <div class="col">
                    <a class="btn btn-outline-secondary w-100 rounded-4 p-3" href="shop-catalog-electronics.html">
                        <img src="assets/img/shop/electronics/brands/canon-light-mode.svg" class="d-none-dark"
                            alt="Canon">
                        <img src="assets/img/shop/electronics/brands/canon-dark-mode.svg" class="d-none d-block-dark"
                            alt="Canon">
                    </a>
                </div>
                <div class="col">
                    <a class="btn btn-outline-secondary w-100 rounded-4 p-3" href="shop-catalog-electronics.html">
                        <img src="assets/img/shop/electronics/brands/samsung-light-mode.svg" class="d-none-dark"
                            alt="Samsung">
                        <img src="assets/img/shop/electronics/brands/samsung-dark-mode.svg" class="d-none d-block-dark"
                            alt="Samsung">
                    </a>
                </div>
                <div class="col">
                    <a class="btn btn-outline-secondary w-100 rounded-4 p-3" href="shop-catalog-electronics.html">
                        <img src="assets/img/shop/electronics/brands/sony-light-mode.svg" class="d-none-dark"
                            alt="Sony">
                        <img src="assets/img/shop/electronics/brands/sony-dark-mode.svg" class="d-none d-block-dark"
                            alt="Sony">
                    </a>
                </div>
                <div class="col">
                    <a class="btn btn-outline-secondary w-100 h-100 rounded-4 p-3"
                        href="shop-categories-electronics.html">
                        Tất cả thương hiệu
                        <i class="ci-plus-circle fs-base ms-2"></i>
                    </a>
                </div>
            </div>
        </section> --}}

        <!-- Biểu mẫu đăng ký + Vlog -->
        <section class="bg-body-tertiary py-5">
            <div class="container pt-sm-2 pt-md-3 pt-lg-4 pt-xl-5">
                <div class="row">
                    <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
                        <h2 class="h4 mb-2">Đăng ký nhận bản tin của chúng tôi</h2>
                        <p class="text-body pb-2 pb-ms-3">Nhận các cập nhật mới nhất về sản phẩm &amp; khuyến mãi</p>
                        <form class="d-flex needs-validation pb-1 pb-sm-2 pb-md-3 pb-lg-0 mb-4 mb-lg-5" novalidate="">
                            <div class="position-relative w-100 me-2">
                                <input type="email" class="form-control form-control-lg" placeholder="Email của bạn"
                                    required="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary">Đăng ký</button>
                        </form>
                        <div class="d-flex gap-3">
                            <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Instagram">
                                <i class="ci-instagram fs-base"></i>
                            </a>
                            <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Facebook">
                                <i class="ci-facebook fs-base"></i>
                            </a>
                            <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="YouTube">
                                <i class="ci-youtube fs-base"></i>
                            </a>
                            <a class="btn btn-icon btn-secondary rounded-circle" href="#!" aria-label="Telegram">
                                <i class="ci-telegram fs-base"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 col-xl-4 offset-lg-1 offset-xl-2">
                        <ul class="list-unstyled d-flex flex-column gap-4 ps-md-4 ps-lg-0 mb-3">
                            <li class="nav flex-nowrap align-items-center position-relative">
                                <img src="assets/img/home/electronics/vlog/01.jpg" class="rounded" width="140"
                                    alt="Ảnh video">
                                <div class="ps-3">
                                    <div class="fs-xs text-body-secondary lh-sm mb-2">6:16</div>
                                    <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">5
                                        Tiện ích mới bạn phải xem trên Cartzilla - Ngân sách rẻ</a>
                                </div>
                            </li>
                            <li class="nav flex-nowrap align-items-center position-relative">
                                <img src="assets/img/home/electronics/vlog/02.jpg" class="rounded" width="140"
                                    alt="Ảnh video">
                                <div class="ps-3">
                                    <div class="fs-xs text-body-secondary lh-sm mb-2">10:20</div>
                                    <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">5
                                        Tiện ích siêu hữu ích trên Cartzilla bạn phải có trong 2023</a>
                                </div>
                            </li>
                            <li class="nav flex-nowrap align-items-center position-relative">
                                <img src="assets/img/home/electronics/vlog/03.jpg" class="rounded" width="140"
                                    alt="Ảnh video">
                                <div class="ps-3">
                                    <div class="fs-xs text-body-secondary lh-sm mb-2">8:40</div>
                                    <a class="nav-link fs-sm hover-effect-underline stretched-link p-0" href="#!">Top
                                        5 tiện ích mới tuyệt vời trên Cartzilla bạn phải xem</a>
                                </div>
                            </li>
                        </ul>
                        <div class="nav ps-md-4 ps-lg-0">
                            <a class="btn nav-link animate-underline text-decoration-none px-0" href="#!">
                                <span class="animate-target">Xem tất cả</span>
                                <i class="ci-chevron-right fs-base ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
