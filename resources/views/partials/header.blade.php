<!-- resources/views/partials/header.blade.php -->



{{-- Đây là Giỏ hàng sidebar --}}
{{-- Header ở dưới --}}

<!-- Shopping cart offcanvas -->
<div class="offcanvas offcanvas-end pb-sm-2 px-sm-2" id="shoppingCart" tabindex="-1" aria-labelledby="shoppingCartLabel" style="width: 500px">

    <!-- Header -->
    <div class="offcanvas-header flex-column align-items-start py-3 pt-lg-4">
      <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-lg-4">
        <h4 class="offcanvas-title" id="shoppingCartLabel">Shopping cart</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <p class="fs-sm">Buy <span class="text-dark-emphasis fw-semibold">$183</span> more to get <span class="text-dark-emphasis fw-semibold">Free Shipping</span></p>
      <div class="progress w-100" role="progressbar" aria-label="Free shipping progress" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 4px">
        <div class="progress-bar bg-warning rounded-pill" style="width: 75%"></div>
      </div>
    </div>

    <!-- Items -->
    <div class="offcanvas-body d-flex flex-column gap-4 pt-2">

      <!-- Item -->
      <div class="d-flex align-items-center">
        <a class="flex-shrink-0" href="shop-product-general-electronics.html">
          <img src="assets/img/shop/electronics/thumbs/08.png" width="110" alt="iPhone 14">
        </a>
        <div class="w-100 min-w-0 ps-2 ps-sm-3">
          <h5 class="d-flex animate-underline mb-2">
            <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">Apple iPhone 14 128GB White</a>
          </h5>
          <div class="h6 pb-1 mb-2">$899.00</div>
          <div class="d-flex align-items-center justify-content-between">
            <div class="count-input rounded-2">
              <button type="button" class="btn btn-icon btn-sm" data-decrement="" aria-label="Decrement quantity">
                <i class="ci-minus"></i>
              </button>
              <input type="number" class="form-control form-control-sm" value="1" readonly="">
              <button type="button" class="btn btn-icon btn-sm" data-increment="" aria-label="Increment quantity">
                <i class="ci-plus"></i>
              </button>
            </div>
            <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Remove" aria-label="Remove from cart"></button>
          </div>
        </div>
      </div>

      <!-- Item -->
      <div class="d-flex align-items-center">
        <a class="position-relative flex-shrink-0" href="shop-product-general-electronics.html">
          <span class="badge text-bg-danger position-absolute top-0 start-0">-10%</span>
          <img src="assets/img/shop/electronics/thumbs/09.png" width="110" alt="iPad Pro">
        </a>
        <div class="w-100 min-w-0 ps-2 ps-sm-3">
          <h5 class="d-flex animate-underline mb-2">
            <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">Tablet Apple iPad Pro M2</a>
          </h5>
          <div class="h6 pb-1 mb-2">$989.00 <del class="text-body-tertiary fs-xs fw-normal">$1,099.00</del></div>
          <div class="d-flex align-items-center justify-content-between">
            <div class="count-input rounded-2">
              <button type="button" class="btn btn-icon btn-sm" data-decrement="" aria-label="Decrement quantity">
                <i class="ci-minus"></i>
              </button>
              <input type="number" class="form-control form-control-sm" value="1" readonly="">
              <button type="button" class="btn btn-icon btn-sm" data-increment="" aria-label="Increment quantity">
                <i class="ci-plus"></i>
              </button>
            </div>
            <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Remove" aria-label="Remove from cart"></button>
          </div>
        </div>
      </div>

      <!-- Item -->
      <div class="d-flex align-items-center">
        <a class="flex-shrink-0" href="shop-product-general-electronics.html">
          <img src="assets/img/shop/electronics/thumbs/01.png" width="110" alt="Smart Watch">
        </a>
        <div class="w-100 min-w-0 ps-2 ps-sm-3">
          <h5 class="d-flex animate-underline mb-2">
            <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">Smart Watch Series 7, White</a>
          </h5>
          <div class="h6 pb-1 mb-2">$429.00</div>
          <div class="d-flex align-items-center justify-content-between">
            <div class="count-input rounded-2">
              <button type="button" class="btn btn-icon btn-sm" data-decrement="" aria-label="Decrement quantity">
                <i class="ci-minus"></i>
              </button>
              <input type="number" class="form-control form-control-sm" value="1" readonly="">
              <button type="button" class="btn btn-icon btn-sm" data-increment="" aria-label="Increment quantity">
                <i class="ci-plus"></i>
              </button>
            </div>
            <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Remove" aria-label="Remove from cart"></button>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="offcanvas-header flex-column align-items-start">
      <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-md-4">
        <span class="text-light-emphasis">Subtotal:</span>
        <span class="h6 mb-0">$2,317.00</span>
      </div>
      <div class="d-flex w-100 gap-3">
        <a class="btn btn-lg btn-secondary w-100" href="checkout-v1-cart.html">View cart</a>
        <a class="btn btn-lg btn-primary w-100" href="checkout-v1-delivery-1.html">Checkout</a>
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
            <a class="navbar-brand me-0" href="{{ url('/') }}">
                <span class="d-none d-sm-flex flex-shrink-0 text-primary me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"><path d="M36 18.01c0 8.097-5.355 14.949-12.705 17.2a18.12 18.12 0 0 1-5.315.79C9.622 36 2.608 30.313.573 22.611.257 21.407.059 20.162 0 18.879v-1.758c.02-.395.059-.79.099-1.185.099-.908.277-1.817.514-2.686C2.687 5.628 9.682 0 18 0c5.572 0 10.551 2.528 13.871 6.517 1.502 1.797 2.648 3.91 3.359 6.201.494 1.659.771 3.436.771 5.292z" fill="currentColor"></path><g fill="#fff"><path d="M17.466 21.624c-.514 0-.988-.316-1.146-.829-.198-.632.138-1.303.771-1.501l7.666-2.469-1.205-8.254-13.317 4.621a1.19 1.19 0 0 1-1.521-.75 1.19 1.19 0 0 1 .751-1.521l13.89-4.818c.553-.197 1.166-.138 1.64.158a1.82 1.82 0 0 1 .85 1.284l1.344 9.183c.138.987-.494 1.994-1.482 2.33l-7.864 2.528-.375.04zm7.31.138c-.178-.632-.85-1.007-1.482-.81l-5.177 1.58c-2.331.79-3.28.02-3.418-.099l-6.56-8.412a4.25 4.25 0 0 0-4.406-1.758l-3.122.987c-.237.889-.415 1.777-.514 2.686l4.228-1.363a1.84 1.84 0 0 1 1.857.81l6.659 8.551c.751.948 2.015 1.323 3.359 1.323.909 0 1.857-.178 2.687-.474l5.078-1.54c.632-.178 1.008-.829.81-1.481z"></path><use href="#czlogo"></use><use href="#czlogo" x="8.516" y="-2.172"></use></g><defs><path id="czlogo" d="M18.689 28.654a1.94 1.94 0 0 1-1.936 1.935 1.94 1.94 0 0 1-1.936-1.935 1.94 1.94 0 0 1 1.936-1.935 1.94 1.94 0 0 1 1.936 1.935z"></path></defs></svg>
                </span>
                {{ config('app.name', 'BabelShop') }}
            </a>
        </div>
        <div class="col col-lg-9 d-flex align-items-center justify-content-end">

          <!-- Search visible on screens > 991px wide (lg breakpoint) -->
          <div class="position-relative flex-fill d-none d-lg-block pe-4 pe-xl-5">
            <i class="ci-search position-absolute top-50 translate-middle-y d-flex fs-lg text-white ms-3"></i>
            <input type="search" class="form-control form-control-lg form-icon-start border-white rounded-pill" placeholder="Search the products">
          </div>

          <!-- Sale link visible on screens > 1200px wide (xl breakpoint) -->
          <a class="d-none d-xl-flex align-items-center text-decoration-none animate-shake navbar-stuck-hide me-3 me-xl-4 me-xxl-5" href="shop-catalog-electronics.html">
            <div class="btn btn-icon btn-lg fs-lg text-primary bg-body-secondary bg-opacity-75 pe-none rounded-circle">
              <i class="ci-percent animate-target"></i>
            </div>
            <div class="ps-2 text-nowrap">
              <div class="fs-xs text-body">Only this month</div>
              <div class="fw-medium text-white">Super Sale 20%</div>
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
            <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-md-inline-flex" href="account-signin.html">
              <i class="ci-user animate-target"></i>
              <span class="visually-hidden">Account</span>
            </a>

            <!-- Wishlist button visible on screens > 768px wide (md breakpoint) -->
            <a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-pulse d-none d-md-inline-flex" href="account-wishlist.html">
              <i class="ci-heart animate-target"></i>
              <span class="visually-hidden">Wishlist</span>
            </a>

            <!-- Cart button -->
            <button type="button" class="btn btn-icon btn-lg btn-secondary position-relative rounded-circle ms-2" data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart" aria-label="Shopping cart">
              <span class="position-absolute top-0 start-100 mt-n1 ms-n3 badge text-bg-success border border-3 border-dark rounded-pill" style="--cz-badge-padding-y: .25em; --cz-badge-padding-x: .42em">3</span>
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
                      <a class="position-absolute top-0 start-0 w-100 h-100" href="shop-categories-electronics.html">
                        <span class="visually-hidden">Categories</span>
                      </a>
                      <button type="button" class="btn btn-lg btn-secondary dropdown-toggle w-100 rounded-bottom-0 justify-content-start pe-none">
                        <i class="ci-grid fs-lg"></i>
                        <span class="ms-2 me-auto">Categories</span>
                      </button>
                    </div>

                    <!-- Buttton visible on screens < 992px wide (lg breakpoint) -->
                    <button type="button" class="btn btn-lg btn-secondary dropdown-toggle w-100 justify-content-start d-lg-none mb-2" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                      <i class="ci-grid fs-lg"></i>
                      <span class="ms-2 me-auto">Categories</span>
                    </button>

                    <!-- Mega menu -->
                    <ul class="dropdown-menu dropdown-menu-static w-100 rounded-top-0 rounded-bottom-4 py-1 p-lg-1" style="--cz-dropdown-spacer: 0; --cz-dropdown-item-padding-y: .625rem; --cz-dropdown-item-spacer: 0">
                      <li class="d-lg-none pt-2">
                        <a class="dropdown-item fw-medium" href="shop-categories-electronics.html">
                          <i class="ci-grid fs-xl opacity-60 pe-1 me-2"></i>
                          All Categories
                          <i class="ci-chevron-right fs-base ms-auto me-n1"></i>
                        </a>
                      </li>
                      <li class="dropend position-static">
                        <div class="position-relative rounded pt-2 pb-1 px-lg-2" data-bs-toggle="dropdown" data-bs-trigger="hover">
                          <a class="dropdown-item fw-medium stretched-link d-none d-lg-flex" href="shop-catalog-electronics.html">
                            <i class="ci-computer fs-xl opacity-60 pe-1 me-2"></i>
                            <span class="text-truncate">Computers &amp; Accessories</span>
                            <i class="ci-chevron-right fs-base ms-auto me-n1"></i>
                          </a>
                          <div class="dropdown-item fw-medium text-wrap stretched-link d-lg-none">
                            <i class="ci-computer fs-xl opacity-60 pe-1 me-2"></i>
                            Computers &amp; Accessories
                            <i class="ci-chevron-down fs-base ms-auto me-n1"></i>
                          </div>
                        </div>
                        <div class="dropdown-menu rounded-4 p-4" style="top: 1rem; height: calc(100% - .1875rem); --cz-dropdown-spacer: .3125rem; animation: none;">
                          <div class="d-flex flex-column flex-lg-row h-100 gap-4">
                            <div style="min-width: 194px">
                              <div class="d-flex w-100">
                                <a class="animate-underline animate-target d-inline h6 text-dark-emphasis text-decoration-none text-truncate" href="shop-catalog-electronics.html">Computers</a>
                              </div>
                              <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-catalog-electronics.html">Laptops &amp; Tablets</a>
                                </li>
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-catalog-electronics.html">Desktop Computers</a>
                                </li>

                              </ul>
                            </div>
                            <div style="min-width: 194px">
                              <div class="d-flex w-100">
                                <a class="animate-underline animate-target d-inline h6 text-dark-emphasis text-decoration-none text-truncate" href="shop-catalog-electronics.html">Accessories</a>
                              </div>
                              <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-catalog-electronics.html">Monitors</a>
                                </li>
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-catalog-electronics.html">Bags, Cases &amp; Sleeves</a>
                                </li>


                              </ul>
                            </div>
                            <div class="d-none d-lg-block">
                              <div class="d-none d-xl-block" style="width: 284px"></div>
                              <div class="d-xl-none" style="width: 240px"></div>
                              <div class="position-relative d-flex flex-column justify-content-center h-100 bg-body-secondary rounded-5 py-4 px-3">
                                <div class="text-center px-2">
                                  <span class="badge bg-danger bg-opacity-10 text-danger fs-sm rounded-pill mb-2">Save up to $400</span>
                                  <div class="fs-sm text-light-emphasis mb-2">Starts from <del>$1,599.00</del> $1,399.00</div>
                                  <div class="h2 mb-4">Surface Laptop Studio</div>
                                </div>
                                <img src="assets/img/mega-menu/electronics/01.png" width="252" alt="Surface Laptop Studio">
                                <div class="text-center mt-4">
                                  <a class="btn btn-sm btn-primary stretched-link" href="shop-catalog-electronics.html">Shop now</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="dropend position-static">
                        <div class="position-relative rounded pb-1 px-lg-2" tabindex="0" data-bs-toggle="dropdown" data-bs-trigger="hover">
                          <a class="dropdown-item fw-medium stretched-link d-none d-lg-flex" href="shop-catalog-electronics.html">
                            <i class="ci-smartphone-2 fs-xl opacity-60 pe-1 me-2"></i>
                            <span class="text-truncate">Smartphones &amp; Tablets</span>
                            <i class="ci-chevron-right fs-base ms-auto me-n1"></i>
                          </a>
                          <div class="dropdown-item fw-medium stretched-link d-lg-none">
                            <i class="ci-smartphone-2 fs-xl opacity-60 pe-1 me-2"></i>
                            Smartphones &amp; Tablets
                            <i class="ci-chevron-down fs-base ms-auto me-n1"></i>
                          </div>
                        </div>
                        <div class="dropdown-menu rounded-4 p-4" style="top: 1rem; height: calc(100% - .1875rem); --cz-dropdown-spacer: .3125rem; animation: none;">
                          <div class="d-flex flex-column flex-lg-row h-100 gap-4">
                            <div style="min-width: 194px">
                              <div class="d-flex w-100">
                                <a class="animate-underline animate-target d-inline h6 text-dark-emphasis text-decoration-none text-truncate" href="shop-catalog-electronics.html">Smartphones</a>
                              </div>
                              <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-catalog-electronics.html">Apple iPhone</a>
                                </li>
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-catalog-electronics.html">Google Pixel</a>
                                </li>

                              </ul>
                              <div class="d-flex w-100 pt-4">
                                <a class="animate-underline animate-target d-inline h6 text-dark-emphasis text-decoration-none text-truncate" href="shop-catalog-electronics.html">Tablets</a>
                              </div>
                              <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-catalog-electronics.html">Apple iPad</a>
                                </li>

                              </ul>
                            </div>
                            <div style="min-width: 194px">
                              <div class="d-flex w-100">
                                <a class="animate-underline animate-target d-inline h6 text-dark-emphasis text-decoration-none text-truncate" href="shop-catalog-electronics.html">Accessories</a>
                              </div>
                              <ul class="nav flex-column gap-2 mt-n2">
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-catalog-electronics.html">Accessory Kits</a>
                                </li>
                                <li class="d-flex w-100 pt-1">
                                  <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-catalog-electronics.html">Batteries &amp; Battery Packs</a>
                                </li>

                              </ul>
                            </div>
                            <div class="d-none d-lg-block">
                              <div class="d-none d-xl-block" style="width: 284px"></div>
                              <div class="d-xl-none" style="width: 240px"></div>
                              <div class="position-relative d-flex flex-column justify-content-center h-100 bg-body-secondary rounded-5 py-4 px-3">
                                <div class="text-center px-2">
                                  <i class="ci-apple fs-1 text-dark-emphasis mb-2"></i>
                                  <div class="fs-sm text-light-emphasis mb-2">Deal of the week</div>
                                  <div class="h2 mb-4">iPad Pro M1</div>
                                </div>
                                <img src="assets/img/mega-menu/electronics/02.png" width="252" alt="iPad Pro">
                                <div class="text-center mt-4">
                                  <a class="btn btn-sm btn-primary stretched-link" href="shop-catalog-electronics.html">Shop now</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>



                    </ul>
                  </div>
                </div>
              </div>

              <!-- Navbar nav -->
              <div class="col-lg-9 d-lg-flex pt-3 pt-lg-0 ps-lg-0">
                <ul class="navbar-nav position-relative">
                  <li class="nav-item dropdown me-lg-n1 me-xl-0">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Trang chu</a>
                  </li>
                  <li class="nav-item dropdown position-static me-lg-n1 me-xl-0">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" aria-expanded="false">Shop</a>
                    <div class="dropdown-menu rounded-4 p-4">
                      <div class="d-flex flex-column flex-lg-row gap-4">
                        <div style="min-width: 190px">
                          <div class="h6 mb-2">San Pham</div>
                          <ul class="nav flex-column gap-2 mt-0">
                            <li class="d-flex w-100 pt-1">
                              <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0" href="shop-categories-electronics.html">Doan nay do theo danh muc</a>
                            </li>

                          </ul>


                        </div>


                      </div>
                    </div>
                  </li>
                  <li class="nav-item dropdown me-lg-n1 me-xl-0 ">
                            @guest
                                @if (Route::has('login'))
                                    <li class="">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest

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
              Account
            </a>
            <a class="nav-link" href="account-wishlist.html">
              <i class="ci-heart fs-lg opacity-60 me-2"></i>
              Wishlist
            </a>
          </div>
        </div>
      </nav>
    </div>
  </header>
