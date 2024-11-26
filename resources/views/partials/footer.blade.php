<!-- resources/views/partials/footer.blade.php -->

<!-- Page footer -->
<footer class="footer position-relative bg-dark">
    <span class="position-absolute top-0 start-0 w-100 h-100 bg-body d-none d-block-dark"></span>
    <div class="container position-relative z-1 pt-sm-2 pt-md-3 pt-lg-4" data-bs-theme="dark">

        <!-- Các cột chứa liên kết trở thành accordion trên màn hình < 500px (sm breakpoint) -->
        <div class="accordion py-5" id="footerLinks">
            <div class="row">
                <div class="col-md-4 d-sm-flex flex-md-column align-items-center align-items-md-start pb-3 mb-sm-4">
                    <h4 class="mb-sm-0 mb-md-4 me-4">
                      <a class="navbar-brand " href="{{ url('/home') }}">
                        <span class="d-none d-sm-flex flex-shrink-0 text-primary me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36">
                                <img src="{{ asset('assets/app-icons/Babel.png') }}" height="32" width="32">
                            </svg>
                        </span>
                        {{ config('app.name', 'BabelShop') }}
                    </a>
                    </h4>
                    <p class="text-body fs-sm text-sm-end text-md-start mb-sm-0 mb-md-3 ms-0 ms-sm-auto ms-md-0 me-4">Có
                        câu hỏi? Liên hệ với chúng tôi 24/7</p>
                    <div class="dropdown" style="max-width: 250px">
                        <button type="button"
                            class="btn btn-light dropdown-toggle justify-content-between w-100 d-none-dark"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hỗ trợ và tư vấn
                        </button>
                        <button type="button"
                            class="btn btn-secondary dropdown-toggle justify-content-between w-100 d-none d-flex-dark"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hỗ trợ và tư vấn
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#!">Trung tâm trợ giúp &amp; FAQ</a></li>
                            <li><a class="dropdown-item" href="#!">Trò chuyện hỗ trợ</a></li>
                            <li><a class="dropdown-item" href="#!">Mở phiếu hỗ trợ</a></li>
                            <li><a class="dropdown-item" href="#!">Trung tâm cuộc gọi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row row-cols-1 row-cols-sm-3 gx-3 gx-md-4">
                        <div class="accordion-item col border-0">
                            <h6 class="accordion-header" id="companyHeading">
                                <span class="text-dark-emphasis d-none d-sm-block">Công ty</span>
                                <button type="button" class="accordion-button collapsed py-3 d-sm-none"
                                    data-bs-toggle="collapse" data-bs-target="#companyLinks" aria-expanded="false"
                                    aria-controls="companyLinks">Công ty</button>
                            </h6>
                            <div class="accordion-collapse collapse d-sm-block" id="companyLinks"
                                aria-labelledby="companyHeading" data-bs-parent="#footerLinks">
                                <ul class="nav flex-column gap-2 pt-sm-3 pb-3 mt-n1 mb-1">
                                    <li class="d-flex w-100 pt-1">
                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                            href="#!">Về công ty</a>
                                    </li>
                                    <li class="d-flex w-100 pt-1">
                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                            href="#!">Đội ngũ của chúng tôi</a>
                                    </li>
                                </ul>
                            </div>
                            <hr class="d-sm-none my-0">
                        </div>
                        <div class="accordion-item col border-0">
                            <h6 class="accordion-header" id="accountHeading">
                                <span class="text-dark-emphasis d-none d-sm-block">Tài khoản</span>
                                <button type="button" class="accordion-button collapsed py-3 d-sm-none"
                                    data-bs-toggle="collapse" data-bs-target="#accountLinks" aria-expanded="false"
                                    aria-controls="accountLinks">Tài khoản</button>
                            </h6>
                            <div class="accordion-collapse collapse d-sm-block" id="accountLinks"
                                aria-labelledby="accountHeading" data-bs-parent="#footerLinks">
                                <ul class="nav flex-column gap-2 pt-sm-3 pb-3 mt-n1 mb-1">
                                    <li class="d-flex w-100 pt-1">
                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                            href="#!">Tài khoản của bạn</a>
                                    </li>
                                    <li class="d-flex w-100 pt-1">
                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                            href="#!">Phí &amp; chính sách vận chuyển</a>
                                    </li>
                                </ul>
                            </div>
                            <hr class="d-sm-none my-0">
                        </div>
                        <div class="accordion-item col border-0">
                            <h6 class="accordion-header" id="customerHeading">
                                <span class="text-dark-emphasis d-none d-sm-block">Dịch vụ khách hàng</span>
                                <button type="button" class="accordion-button collapsed py-3 d-sm-none"
                                    data-bs-toggle="collapse" data-bs-target="#customerLinks" aria-expanded="false"
                                    aria-controls="customerLinks">Dịch vụ khách hàng</button>
                            </h6>
                            <div class="accordion-collapse collapse d-sm-block" id="customerLinks"
                                aria-labelledby="customerHeading" data-bs-parent="#footerLinks">
                                <ul class="nav flex-column gap-2 pt-sm-3 pb-3 mt-n1 mb-1">
                                    <li class="d-flex w-100 pt-1">
                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                            href="#!">Phương thức thanh toán</a>
                                    </li>
                                    <li class="d-flex w-100 pt-1">
                                        <a class="nav-link animate-underline animate-target d-inline fw-normal text-truncate p-0"
                                            href="#!">Cam kết hoàn tiền</a>
                                    </li>
                                </ul>
                            </div>
                            <hr class="d-sm-none my-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liên kết danh mục / nhãn -->
        <div class="d-flex flex-column gap-3 pb-3 pb-md-4 pb-lg-5 mt-n2 mt-sm-n4 mt-lg-0 mb-4">
            <ul class="nav align-items-center text-body-tertiary gap-2">
                <li class="animate-underline">
                    <a class="nav-link fw-normal p-0 animate-target"
                        href="{{ route('product', [
                            'category' => [1],
                            'min' => 1000,
                            'max' => 10000000,
                            ]) }}">Móc khóa</a>
                </li>
                <li class="px-1">/</li>
                <li class="animate-underline">
                    <a class="nav-link fw-normal p-0 animate-target" href="{{ route('product', [
                            'category' => [2],
                            'min' => 1000,
                            'max' => 10000000,
                            ]) }}">Nhồi bông</a>
                </li>
            </ul>
            <ul class="nav align-items-center text-body-tertiary gap-2">
                <li class="animate-underline">
                    <a class="nav-link fw-normal p-0 animate-target" href="{{ route('product', [
                            'category' => [3],
                            'min' => 1000,
                            'max' => 10000000,
                            ]) }}">Tiện ích</a>
                </li>
                <li class="px-1">/</li>
                <li class="animate-underline">
                    <a class="nav-link fw-normal p-0 animate-target" href="{{ route('product', [
                            'category' => [1],
                            'min' => 1000,
                            'max' => 10000000,
                            ]) }}">Mô hình</a>
                </li>
            </ul>
        </div>

        <!-- Bản quyền + Phương thức thanh toán -->
        <div class="d-md-flex align-items-center border-top py-4">
            {{-- <div class="d-flex gap-2 gap-sm-3 justify-content-center ms-md-auto mb-4 mb-md-0 order-md-2">
                <div>
                    <img src="assets/img/payment-methods/visa-dark-mode.svg" alt="Visa">
                </div>
                <div>
                    <img src="assets/img/payment-methods/mastercard.svg" alt="Mastercard">
                </div>
                <div>
                    <img src="assets/img/payment-methods/paypal-dark-mode.svg" alt="PayPal">
                </div>
                <div>
                    <img src="assets/img/payment-methods/google-pay-dark-mode.svg" alt="Google Pay">
                </div>
                <div>
                    <img src="assets/img/payment-methods/apple-pay-dark-mode.svg" alt="Apple Pay">
                </div>
            </div> --}}
            <p class="text-body fs-xs text-center text-md-start mb-0 me-4 order-md-1">© Bản quyền thuộc về. Thiết kế
                bởi <span class="animate-underline"><a
                        class="animate-target text-dark-emphasis fw-medium text-decoration-none"
                        href="" target="_blank" rel="noreferrer">Babel Studio</a></span></p>
        </div>
    </div>
</footer>



<!-- Back to top button -->
<div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
    <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
        Top
        <i class="ci-arrow-right fs-base ms-1 me-n1 animate-target"></i>
        <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
        <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor"
                stroke-width="1.5" stroke-miterlimit="10"></rect>
        </svg>
    </a>
    <a class="btn btn-sm btn-outline-secondary text-uppercase bg-body rounded-pill shadow animate-rotate ms-2 me-n5"
        href="#customizer" style="font-size: .625rem; letter-spacing: .05rem;" data-bs-toggle="offcanvas"
        role="button" aria-controls="customizer">
        Customize<i class="ci-settings fs-base ms-1 me-n2 animate-target"></i>
    </a>
</div>
