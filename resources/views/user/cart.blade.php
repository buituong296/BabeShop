@extends('layouts.app')

@section('content')
    <section class="container pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
        <h1 class="h3 mb-4">Giỏ hàng</h1>
        <div class="row">
            @if (session('discountAmount'))
                <div class="alert alert-success mt-3">
                    Đã áp dụng mã giảm giá! Bạn được giảm {{ number_format(session('discountAmount')) }} VND.
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            <!-- Items list -->
            <div class="col-lg-8">


                @if (empty($cartItems) || $cartItems->count() == 0)
                    <p class="fs-m">Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                @else
                    <table class="table position-relative z-2 mb-4">
                        <thead>
                            <tr>
                                <th scope="col" class="text-body" style="width: 10%;"><span class="text-body">Ảnh</span></th>
                                <th scope="col" class="text-body" style="width: 25%;"><span class="text-body">Tên sản phẩm</span></th>
                                <th scope="col" class="text-body" style="width: 20%;"><span class="text-body">Giá</span></th>
                                <th scope="col" class="text-body" style="width: 20%;"><span class="text-body">Số lượng</span></th>
                                <th scope="col" class="text-body" style="width: 20%;"><span class="text-body">Tổng</span></th>
                                <th scope="col" class="py-0 px-0" style="width: 5%;">
                                    <div class="nav justify-content-end">
                                        <button type="button" class="nav-link d-inline-block text-decoration text-nowrap py-3 px-0" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?');">
                                            Xóa &nbsp;
                                        </button>
                                    </div>
                                </th>
                            </tr>

                        </thead>
                        <tbody class="align-middle">
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->variant->product->image) }}"
                                            alt="{{ $item->variant->name }}"
                                            style="width: 50px; height: auto; margin-right: 10px;">
                                    </td>
                                    <td>
                                        <h6>{{ $item->variant->product->name }}</h6>
                                        <p>Màu sắc:{{ $item->variant->color->name }}, Kích
                                            thước:{{ $item->variant->size->name }}</p>
                                    </td>
                                    <td class="text-body fs-sm fw-normal d-none d-xl-table-cell">
                                        {{ number_format($item->variant->sale_price) }} VND
                                        <td class="d-none d-md-table-cell">
                                            <div class="input-group align-items-center">
                                                <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity('{{ $item->id }}', -1)">
                                                    <span class="icon-minus">-</span>
                                                </button>
                                                <input type="tel" name="quantity" id="quantity-{{ $item->id }}" value="{{ $item->quantity }}" min="1"
                                                    class="form-control text-center" style="max-width: 60px;" onchange="updateQuantity('{{ $item->id }}')">
                                                <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity('{{ $item->id }}', 1)">
                                                    <span class="icon-plus">+</span>
                                                </button>
                                            </div>
                                        </td>
                                    </td>
                                    <td class="text-body fs-sm fw-normal d-none d-md-table-cell">
                                        <span id="total-price-{{ $item->id }}">
                                            {{ number_format($item->variant->sale_price * $item->quantity) }} VND
                                        </span>
                                    </td>
                                    <td class="py-3">
                                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-close fs-sm" data-bs-toggle="tooltip"
                                                data-bs-custom-class="tooltip-sm" data-bs-title="Xóa"
                                                aria-label="Xóa khỏi giỏ hàng" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <!-- Table of items -->


                <div class="nav position-relative z-2 mb-4 mb-lg-0">
                    <a class="nav-link animate-underline px-0" href="{{ route('home') }}">
                        <i class="ci-chevron-left fs-lg me-1"></i>
                        <span class="animate-target">Tiếp tục mua sắm</span>
                    </a>
                </div>
            </div>


            <!-- Order summary (sticky sidebar) -->
            {{-- @if (empty($cartItems) || $cartItems->count() == 0)
                <p class="fs-m"></p>
            @else --}}
                <aside class="col-lg-4" style="margin-top: -100px">
                    <div class="position-sticky top-0" style="padding-top: 100px">
                        <div class="bg-body-tertiary rounded-5 p-4 mb-3">
                            <div class="p-sm-2 p-lg-0 p-xl-2">
                                <h5 class="border-bottom pb-4 mb-4">Tổng hóa đơn</h5>
                                <ul class="list-unstyled fs-sm gap-3 mb-0">
                                    <li class="d-flex justify-content-between">
                                        Tổng số tiền ({{ count($cartItems) }} mặt hàng):
                                        <span id="order-summary-total"
                                            class="text-dark-emphasis fw-medium">{{ number_format(session('total_amount', 0)) }}
                                            VND</span>
                                    </li>
                                    @if (session('total_discount', 0) > 0)
                                        @foreach (session('applied_vouchers', []) as $code => $percentage)
                                            <li class="d-flex justify-content-between align-items-center">
                                                Mã giảm giá {{ $code }} ({{ $percentage }}%):
                                                <div>
                                                    <span id="discount-{{ $code }}"
                                                        data-percentage="{{ $percentage }}"
                                                        class="text-danger fw-medium">
                                                        -{{ number_format(session('total_amount', 0) * ($percentage / 100)) }}
                                                        VND
                                                    </span>
                                                    <form action="{{ route('vouchers.remove') }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="voucher_code"
                                                            value="{{ $code }}">
                                                        <button type="submit" class="btn btn-link p-0 ms-2"
                                                            style="color: #ff0000;" onclick="return confirm('Bạn có chắc chắn muốn xóa mã giảm giá không?');">
                                                            <i class="ci-close-circle"></i> <!-- hoặc × -->
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>

                                <div class="border-top pt-4 mt-4">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span class="fs-sm">Tổng thanh toán sau cùng:</span>
                                        <span id="order-summary-final-total" class="h5 mb-0">
                                            {{ number_format(max(session('total_after_discount', session('total_amount', 0)), 0)) }} VND
                                        </span>

                                    </div>
                                    <a class="btn btn-lg btn-primary w-100" href="{{ route('checkout') }}">
                                        Đi tới thanh toán
                                        <i class="ci-chevron-right fs-lg ms-1 me-n1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion bg-body-tertiary rounded-5 p-4">
                            <div class="accordion-item border-0">
                                <h3 class="accordion-header" id="promoCodeHeading">
                                    <button type="button"
                                        class="accordion-button animate-underline collapsed py-0 ps-sm-2 ps-lg-0 ps-xl-2"
                                        data-bs-toggle="collapse" data-bs-target="#promoCode" aria-expanded="false"
                                        aria-controls="promoCode">
                                        <i class="ci-percent fs-xl me-2"></i>
                                        <span class="animate-target me-2">Áp dụng mã giảm giá</span>
                                    </button>
                                </h3>
                                <div class="accordion-collapse collapse" id="promoCode"
                                    aria-labelledby="promoCodeHeading">
                                    <div class="accordion-body pt-3 pb-2 ps-sm-2 px-lg-0 px-xl-2">
                                        <form action="{{ route('vouchers.apply') }}" method="POST"
                                            class="needs-validation d-flex gap-2" novalidate="">
                                            @csrf
                                            <div class="position-relative w-100">
                                                <input type="text" class="form-control" name="voucher_code"
                                                    placeholder="Nhập mã giảm giá" required>
                                                <div class="invalid-tooltip bg-transparent py-0">Hãy nhập mã giảm giá hợp
                                                    lệ!
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-dark">Xác nhận</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            {{-- @endif --}}

            @include('user.partials.trending_product')
        </div>




    </section>

@endsection
