<!-- resources/views/partials/header.blade.php -->

{{-- WARNING: ĐỂ NGHỊCH VUI THÔI ĐỪNG XÓA HAY DEMO GÌ NHÉ --}}
<!-- Customizer offcanvas -->
<div class="offcanvas offcanvas-end" id="customizer" tabindex="-1">
    <div class="offcanvas-header border-bottom">
      <h4 class="h5 offcanvas-title">Customize theme</h4>
      <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

      <!-- Customizer settings -->
      <div class="customizer-collapse collapse show" id="customizerSettings">

        <!-- Colors -->
        <div class="pb-4 mb-2">
          <div class="d-flex align-items-center mb-3">
            <i class="ci-paint text-body-tertiary fs-5 me-2"></i>
            <h5 class="fs-lg mb-0">Colors</h5>
          </div>
          <div class="row row-cols-2 g-3" id="theme-colors">
            <div class="col">
              <h6 class="fs-sm mb-2">Primary</h6>
              <div class="color-swatch d-flex border rounded gap-3 p-2" id="theme-primary" data-color-labels="[&quot;theme-primary&quot;, &quot;primary&quot;, &quot;primary-rgb&quot;]">
                <input type="text" class="form-control bg-transparent border-0 rounded-0 p-1" value="#f55266">
                <label for="primary" class="ratio ratio-1x1 flex-shrink-0 w-100 cursor-pointer rounded-circle" style="max-width: 38px; background-color: #f55266"></label>
                <input type="color" class="visually-hidden" id="primary" value="#f55266">
              </div>
            </div>
            <div class="col">
              <h6 class="fs-sm mb-2">Success</h6>
              <div class="color-swatch d-flex border rounded gap-3 p-2" id="theme-success" data-color-labels="[&quot;theme-success&quot;, &quot;success&quot;, &quot;success-rgb&quot;]">
                <input type="text" class="form-control bg-transparent border-0 rounded-0 p-1" value="#33b36b">
                <label for="success" class="ratio ratio-1x1 flex-shrink-0 w-100 cursor-pointer rounded-circle" style="max-width: 38px; background-color: #33b36b"></label>
                <input type="color" class="visually-hidden" id="success" value="#33b36b">
              </div>
            </div>
            <div class="col">
              <h6 class="fs-sm mb-2">Warning</h6>
              <div class="color-swatch d-flex border rounded gap-3 p-2" id="theme-warning" data-color-labels="[&quot;theme-warning&quot;, &quot;warning&quot;, &quot;warning-rgb&quot;]">
                <input type="text" class="form-control bg-transparent border-0 rounded-0 p-1" value="#fc9231">
                <label for="warning" class="ratio ratio-1x1 flex-shrink-0 w-100 cursor-pointer rounded-circle" style="max-width: 38px; background-color: #fc9231"></label>
                <input type="color" class="visually-hidden" id="warning" value="#fc9231">
              </div>
            </div>
            <div class="col">
              <h6 class="fs-sm mb-2">Danger</h6>
              <div class="color-swatch d-flex border rounded gap-2 p-2" id="theme-danger" data-color-labels="[&quot;theme-danger&quot;, &quot;danger&quot;, &quot;danger-rgb&quot;]">
                <input type="text" class="form-control bg-transparent border-0 rounded-0 p-1" value="#f03d3d">
                <label for="danger" class="ratio ratio-1x1 flex-shrink-0 w-100 cursor-pointer rounded-circle" style="max-width: 38px; background-color: #f03d3d"></label>
                <input type="color" class="visually-hidden" id="danger" value="#f03d3d">
              </div>
            </div>
            <div class="col">
              <h6 class="fs-sm mb-2">Info</h6>
              <div class="color-swatch d-flex border rounded gap-2 p-2" id="theme-info" data-color-labels="[&quot;theme-info&quot;, &quot;info&quot;, &quot;info-rgb&quot;]">
                <input type="text" class="form-control bg-transparent border-0 rounded-0 p-1" value="#2f6ed5">
                <label for="info" class="ratio ratio-1x1 flex-shrink-0 w-100 cursor-pointer rounded-circle" style="max-width: 38px; background-color: #2f6ed5"></label>
                <input type="color" class="visually-hidden" id="info" value="#2f6ed5">
              </div>
            </div>
          </div>
        </div>

        <!-- Direction -->
        <div class="pb-4 mb-2">
          <div class="d-flex align-items-center pb-1 mb-2">
            <i class="ci-sort text-body-tertiary fs-lg me-2" style="transform: rotate(90deg)"></i>
            <h5 class="fs-lg mb-0">Direction</h5>
          </div>
          <div class="d-flex align-items-center justify-content-between border rounded p-3">
            <div class="me-3">
              <h6 class="mb-1">RTL</h6>
              <p class="fs-sm mb-0">Change text direction</p>
            </div>
            <div class="form-check form-switch m-0">
              <input type="checkbox" class="form-check-input" role="switch" id="rtl-switch">
            </div>
          </div>
          <div class="alert alert-info p-2 mt-2 mb-0">
            <div class="d-flex text-body-emphasis fs-xs py-1 pe-1">
              <i class="ci-info text-info fs-lg mb-2 mb-sm-0" style="margin-top: .125rem"></i>
              <div class="ps-2">To switch the text direction of your webpage from LTR to RTL, please consult the detailed instructions provided in the relevant section of our documentation.</div>
            </div>
          </div>
        </div>

        <!-- Border width -->
        <div class="pb-4 mb-2">
          <div class="d-flex align-items-center pb-1 mb-2">
            <i class="ci-menu text-body-tertiary fs-lg me-2"></i>
            <h5 class="fs-lg mb-0">Border width, px</h5>
          </div>
          <div class="slider-input d-flex align-items-center gap-3 border rounded p-3" id="border-input">
            <input type="range" class="form-range" min="0" max="10" step="1" value="1">
            <input type="number" class="form-control" id="border-width" min="0" max="10" value="1" style="max-width: 5.5rem">
          </div>
        </div>

        <!-- Rounding -->
        <div class="d-flex align-items-center pb-1 mb-2">
          <i class="ci-maximize text-body-tertiary fs-lg me-2"></i>
          <h5 class="fs-lg mb-0">Rounding, rem</h5>
        </div>
        <div class="slider-input d-flex align-items-center gap-3 border rounded p-3">
          <input type="range" class="form-range" min="0" max="5" step=".05" value="0.5">
          <input type="number" class="form-control" id="border-radius" min="0" max="5" step=".05" value="0.5" style="max-width: 5.5rem">
        </div>
      </div>

      <!-- Customizer code -->
      <div class="customizer-collapse collapse" id="customizerCode">
        <div class="nav mb-3">
          <a class="nav-link animate-underline fs-base p-0" href=".html" data-bs-toggle="collapse" aria-expanded="true" aria-controls="customizerSettings customizerCode">
            <i class="ci-chevron-left fs-lg ms-n1 me-1"></i>
            <span class="animate-target">Back to settings</span>
          </a>
        </div>
        <p class="fs-sm pb-1">To apply the provided styles to your webpage, enclose them within a <code>&lt;style&gt;</code> tag and insert this tag into the <code>&lt;head&gt;</code> section of your HTML document after the following link to the main stylesheet:<br><code>&lt;link href="assets/css/theme.min.css"&gt;</code></p>
        <div class="position-relative bg-body-tertiary rounded overflow-hidden pt-3">
          <div class="position-absolute top-0 start-0 w-100 p-3">
            <button type="button" class="btn btn-sm btn-outline-dark w-100" data-copy-text-from="#generated-styles" data-done-label="Code copied">
              <i class="ci-copy fs-sm me-1"></i>
              Copy code
            </button>
          </div>
          <pre class="text-wrap bg-transparent border-0 fs-xs text-body-emphasis p-4 pt-5" id="generated-styles"></pre>
        </div>
      </div>
    </div>

    <!-- Offcanvas footer (Action buttons) -->
    <div class="offcanvas-header border-top gap-3 d-none" id="customizer-btns">
      <button type="button" class="btn btn-lg btn-secondary w-100 fs-sm" id="customizer-reset">
        <i class="ci-trash fs-lg me-2 ms-n1"></i>
        Reset
      </button>
      <button class="btn btn-lg btn-primary hiding-collapse-toggle w-100 fs-sm collapsed" type="button" data-bs-toggle="collapse" data-bs-target=".customizer-collapse" aria-expanded="false" aria-controls="customizerSettings customizerCode">
        <i class="ci-code fs-lg me-2 ms-n1"></i>
        Show code
      </button>
    </div>
  </div>




{{-- Đây là Giỏ hàng sidebar --}}
{{-- Header ở dưới --}}

<!-- Shopping cart offcanvas -->
<div class="offcanvas offcanvas-end pb-sm-2 px-sm-2" id="shoppingCart" tabindex="-1" aria-labelledby="shoppingCartLabel" style="width: 500px">

    <!-- Header -->
<div class="offcanvas-header flex-column align-items-start py-3 pt-lg-4">
    <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-lg-4">
      <h4 class="offcanvas-title" id="shoppingCartLabel">Giỏ hàng</h4>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Đóng"></button>
    </div>
    @if (empty($cartItems) || $cartItems->count() == 0)
    <p class="fs-sm">Bạn chưa có sản phẩm nào trong giỏ hàng</p>
    @endif

    
    {{-- <div class="progress w-100" role="progressbar" aria-label="Tiến độ giao hàng miễn phí" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
      <div class="progress-bar bg-warning rounded-pill" style="width: 75%"></div>
    </div> --}}
  </div>

  <!-- Items -->
  <div class="offcanvas-body d-flex flex-column gap-4 pt-2">

    <!-- Item -->
    @foreach ($cartItems as $item)
    <div class="d-flex align-items-center">
      <a class="flex-shrink-0" href="shop-product-general-electronics.html">
        <img src="{{ asset('storage/' . $item->variant->product->image) }}" width="110" alt="iPhone 14">
      </a>
      <div class="w-100 min-w-0 ps-2 ps-sm-3">
        <h5 class="d-flex animate-underline mb-2">
          <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">{{ $item->variant->product->name }}</a>
        </h5>
        <div class="h6 pb-1 mb-2">{{ number_format($item->variant->sale_price) }}VND</div>
        <div class="d-flex align-items-center justify-content-between">
          {{-- <div class="count-input rounded-2">
            <button type="button" class="btn btn-icon btn-sm" data-decrement="" aria-label="Giảm số lượng">
              <i class="ci-minus"></i>
            </button>
            <input type="number" class="form-control form-control-sm" value="1" readonly="">
            <button type="button" class="btn btn-icon btn-sm" data-increment="" aria-label="Tăng số lượng">
              <i class="ci-plus"></i>
            </button>
          </div> --}}
          <div>
            <span class="fw-bold">Loại hàng:</span>
            <span class="d-block">Màu sắc: {{ $item->variant->color->name }}</span>
            <span class="d-block">Kích thước: {{ $item->variant->size->name }}</span>
          </div>
      

          <form action="{{ route('cart.destroy', $item->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-close fs-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Xóa" aria-label="Xóa khỏi giỏ hàng"></button>
        </form>
        </div>
      </div>
    </div>
    @endforeach

    
  </div>

  <!-- Footer -->
  <div class="offcanvas-header flex-column align-items-start">
    <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-md-4">
      <span class="text-light-emphasis">Tổng phụ:</span>
      <span class="h6 mb-0">{{ number_format($totalAmount) }}VND</span>
    </div>
    <div class="d-flex w-100 gap-3">
      <a class="btn btn-lg btn-secondary w-100" href="{{route('cart')}}">Xem giỏ hàng</a>
      <a class="btn btn-lg btn-primary w-100" href=" {{route('checkout')}}">Thanh toán</a>
    </div>
  </div>
</div>































{{-- Header --}}



<!-- Navigation bar (Page header) -->
<header class="navbar navbar-expand-lg navbar-dark bg-dark d-block z-fixed p-0" data-sticky-navbar="{&quot;offset&quot;: 500}">
    <div class="container d-block py-1 py-lg-3" data-bs-theme="dark">
      <div class="navbar-stuck-hide pt-1"></div>
      <div class="row flex-nowrap align-items-center g-0">
        <div class="col col-lg-3 d-flex align-items-center">

          <!-- Mobile offcanvas menu toggler (Hamburger) -->
          <button type="button" class="navbar-toggler me-4 me-lg-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar brand (Logo) -->
            <a class="navbar-brand me-0" href="{{ url('/home') }}">
                <span class="d-none d-sm-flex flex-shrink-0 text-primary me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                        <img src="{{ asset('assets/app-icons/Babel.png') }}" height="32" width="32">
                    </svg>
                </span>
                {{ config('app.name', 'BabelShop') }}
            </a>
        </div>
        <div class="col col-lg-9 d-flex align-items-center justify-content-end">

          <!-- Search visible on screens > 991px wide (lg breakpoint) -->
          <div class="position-relative flex-fill d-none d-lg-block pe-4 pe-xl-5">
            <form action="{{ route('search') }}" method="GET">
                <i class="ci-search position-absolute top-50 translate-middle-y d-flex fs-lg text-white ms-3"></i>
                <input type="search" name="query" class="form-control form-control-lg form-icon-start border-white rounded-pill" placeholder="Tìm kiếm sản phẩm">
            </form>
        </div>
        

          <!-- Sale link visible on screens > 1200px wide (xl breakpoint) -->
          <a class="d-none d-xl-flex align-items-center text-decoration-none animate-shake navbar-stuck-hide me-3 me-xl-4 me-xxl-5" href="shop-catalog-electronics.html">
            <div class="btn btn-icon btn-lg fs-lg text-primary bg-body-secondary bg-opacity-75 pe-none rounded-circle">
              <i class="ci-percent animate-target"></i>
            </div>
            <div class="ps-2 text-nowrap">
              <div class="fs-xs text-body">Chỉ trong tháng này</div>
              <div class="fw-medium text-white">Đại hạ giá 20%</div>
            </div>
          </a>

          <!-- Button group -->
          <div class="d-flex align-items-center">

            <!-- Navbar stuck nav toggler -->
            <button type="button" class="navbar-toggler d-none navbar-stuck-show me-3" data-bs-toggle="collapse" data-bs-target="#stuckNav" aria-controls="stuckNav" aria-expanded="false" aria-label="Toggle navigation in navbar stuck state">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Theme switcher (light/dark/auto) -->
            <div class="dropdown">
              <button type="button" class="theme-switcher btn btn-icon btn-lg btn-outline-secondary fs-lg border-0 rounded-circle animate-scale" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle theme (light)">
                <span class="theme-icon-active d-flex animate-target">
                  <i class="ci-sun"></i>
                </span>
              </button>
              <ul class="dropdown-menu" style="--cz-dropdown-min-width: 9rem">
                <li>
                  <button type="button" class="dropdown-item active" data-bs-theme-value="light" aria-pressed="true">
                    <span class="theme-icon d-flex fs-base me-2">
                      <i class="ci-sun"></i>
                    </span>
                    <span class="theme-label">Light</span>
                    <i class="item-active-indicator ci-check ms-auto"></i>
                  </button>
                </li>
                <li>
                  <button type="button" class="dropdown-item" data-bs-theme-value="dark" aria-pressed="false">
                    <span class="theme-icon d-flex fs-base me-2">
                      <i class="ci-moon"></i>
                    </span>
                    <span class="theme-label">Dark</span>
                    <i class="item-active-indicator ci-check ms-auto"></i>
                  </button>
                </li>
                <li>
                  <button type="button" class="dropdown-item" data-bs-theme-value="auto" aria-pressed="false">
                    <span class="theme-icon d-flex fs-base me-2">
                      <i class="ci-auto"></i>
                    </span>
                    <span class="theme-label">Auto</span>
                    <i class="item-active-indicator ci-check ms-auto"></i>
                  </button>
                </li>
              </ul>
            </div>

            <!-- Search toggle button visible on screens < 992px wide (lg breakpoint) -->
            <button type="button" class="btn btn-icon btn-lg fs-xl btn-outline-secondary border-0 rounded-circle animate-shake d-lg-none" data-bs-toggle="collapse" data-bs-target="#searchBar" aria-expanded="false" aria-controls="searchBar" aria-label="Toggle search bar">
              <i class="ci-search animate-target"></i>
            </button>

            <!-- Account button visible on screens > 768px wide (md breakpoint) -->
            <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-md-inline-flex" href="{{route('user-info')}}">
              <i class="ci-user animate-target"></i>
              <span class="visually-hidden">Account</span>
            </a>

            <!-- Wishlist button visible on screens > 768px wide (md breakpoint) -->
         

            <!-- Cart button -->
            <button type="button" class="btn btn-icon btn-lg btn-secondary position-relative rounded-circle ms-2" data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart" aria-label="Shopping cart">
              <span class="position-absolute top-0 start-100 mt-n1 ms-n3 badge text-bg-success border border-3 border-dark rounded-pill" style="--cz-badge-padding-y: .25em; --cz-badge-padding-x: .42em">{{$cartItems->count()}}</span>
              <span class="position-absolute top-0 start-0 d-flex align-items-center justify-content-center w-100 h-100 rounded-circle animate-slide-end fs-lg">
                <i class="ci-shopping-cart animate-target ms-n1"></i>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="navbar-stuck-hide pb-1"></div>
    </div>

    <!-- Search visible on screens < 992px wide (lg breakpoint). It is hidden inside collapse by default -->
    <div class="collapse position-absolute top-100 z-2 w-100 bg-dark d-lg-none" id="searchBar">
      <div class="container position-relative my-3" data-bs-theme="dark">
        <i class="ci-search position-absolute top-50 translate-middle-y d-flex fs-lg text-white ms-3"></i>
        <input type="search" class="form-control form-icon-start border-white rounded-pill" placeholder="Search the products" data-autofocus="collapse">
      </div>
    </div>

    <!-- Main navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
    <div class="collapse navbar-stuck-hide" id="stuckNav">
      <nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
        <div class="offcanvas-header py-3">
          <h5 class="offcanvas-title" id="navbarNavLabel">Browse Cartzilla</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body py-3 py-lg-0">
          <div class="container px-0 px-lg-3">
            <div class="row">

              <!-- Categories mega menu -->
              <div class="col-lg-3">
                <div class="navbar-nav">
                  <div class="dropdown w-100">

                    <!-- Buttton visible on screens > 991px wide (lg breakpoint) -->
                    <div class="cursor-pointer d-none d-lg-block" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-theme="dark">
                      <button type="button" class="btn btn-lg btn-secondary dropdown-toggle w-100 rounded-bottom-0 justify-content-start pe-none">
                        <i class="ci-grid fs-lg"></i>
                        <span class="ms-2 me-auto">Thể loại sản phẩm</span>
                      </button>
                    </div>

                    <!-- Mega menu -->
                    @isset($categories)
                    <ul class="dropdown-menu w-100 rounded-top-0 rounded-bottom-4 py-1 p-lg-1" style="--cz-dropdown-spacer: 0; --cz-dropdown-item-padding-y: .625rem; --cz-dropdown-item-spacer: 0">
                        @foreach($categories as $category)
                            <li class="dropend position-static">
                                <div class="position-relative rounded pt-2 pb-1 px-lg-2" data-bs-toggle="dropdown" data-bs-trigger="hover">
                                    <a class="dropdown-item fw-medium stretched-link d-none d-lg-flex" href="#">
                                        <i class="ci-computer fs-xl opacity-60 pe-1 me-2"></i>
                                        <span class="text-truncate">{{ $category->name }}</span>
                                        <i class="ci-chevron-right fs-base ms-auto me-n1"></i>
                                    </a>
                                </div>

                                    <div class="dropdown-menu rounded-4 p-4" style="top: 1rem; height: calc(100% - .1875rem); --cz-dropdown-spacer: .3125rem; animation: none;">
                                        <div class="d-flex flex-column flex-lg-row h-100 gap-4">
                                            <div style="min-width: 194px">
                                                <div class="d-flex w-100">
                                                    <a class="animate-underline animate-target d-inline h6 text-dark-emphasis text-decoration-none text-truncate" href="#">
                                                        {{ $category->name }}
                                                    </a>
                                                </div>
                                                <ul class="nav flex-column gap-2 mt-n2">
                                                    @foreach($category->products as $product)
                                                        <li class="d-flex w-100 pt-1">
                                                            <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="{{ route('productdetail', ['id' => $product->id]) }}">
                                                                {{ $product->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                            </li>
                        @endforeach
                    </ul>
                    @endisset


                  </div>
                </div>
              </div>

              <!-- Navbar nav -->
              <div class="col-lg-9 d-lg-flex pt-3 pt-lg-0 ps-lg-0">
                <ul class="navbar-nav position-relative">
                  <li class="nav-item dropdown me-lg-n1 me-xl-0">
                    <a class="nav-link" href="{{ route('home') }}" role="button">Trang chủ</a>
                  </li>
                  <li class="nav-item dropdown position-static me-lg-n1 me-xl-0">
                    <a class="nav-link dropdown-toggle" href="{{ route('product') }}" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Mua sắm</a>
                    <div class="dropdown-menu rounded-4 p-4">
                      <div class="d-flex flex-column flex-lg-row gap-4">
                        <div style="min-width: 190px">
                          <div class="h6 mb-2">Sản phẩm</div>
                          <ul class="nav flex-column gap-2 mt-0">
                            <li class="d-flex w-100 pt-1">
                              <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="{{ route('product') }}">Đoạn này để theo danh mục</a>
                            </li>

                          </ul>


                        </div>


                      </div>
                    </div>
                  </li>
                  <li class="nav-item dropdown me-lg-n1 me-xl-0 ">
                    <ul class="navbar-nav position-relative m-0">
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                            </li>
                        @endif
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Tài khoản
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('bill') }}">Lịch sử mua hàng</a>
                                    <a class="dropdown-item" href="{{ route('user-info') }}">Thông tin cá nhân</a>
                                    <a class="dropdown-item" href="{{ route('address') }}">Địa chỉ</a>
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard (tạm thời)</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>

                    </li>
                </ul>
                <hr class="d-lg-none my-3">
              </div>
            </div>
          </div>
        </div>
        <div class="offcanvas-header border-top px-0 py-3 mt-3 d-md-none">
          <div class="nav nav-justified w-100">
            <a class="nav-link border-end" href="account-signin.html">
              <i class="ci-user fs-lg opacity-60 me-2"></i>
              Tài khoản
            </a>
            <a class="nav-link" href="account-wishlist.html">
              <i class="ci-heart fs-lg opacity-60 me-2"></i>
              Yêu thích
            </a>
          </div>
        </div>
      </nav>
    </div>
  </header>
