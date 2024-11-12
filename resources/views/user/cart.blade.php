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




                    <!-- Table of items -->
                    <table class="table position-relative z-2 mb-4">
                        <thead>
                            <tr>
                                <th scope="col" class="fs-sm fw-normal py-3 ps-0"><span class="text-body">Sản phẩm</span>
                                </th>
                                <th scope="col" class="fs-sm fw-normal py-3 ps-0"><span class="text-body">Loại
                                        hàng</span></th>
                                <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-xl-table-cell"><span
                                        class="text-body">Giá</span></th>
                                <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-md-table-cell"><span
                                        class="text-body">Số lượng</span></th>
                                <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-md-table-cell"><span
                                        class="text-body">Tổng</span></th>
                                <th scope="col" class="py-0 px-0">
                                    <div class="nav justify-content-end">
                                        <button type="button"
                                            class="nav-link d-inline-block text-decoration text-nowrap py-3 px-0">Xóa
                                            &nbsp;</button>
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
                                        {{ $item->variant->product->name }}
                                    </td>
                                    <td>
                                        <span class=" btn d-block bg-primary p-2"> {{ $item->variant->color->name }}</span>
                                        <span class="btn d-block bg-info p-2">{{ $item->variant->size->name }}</span>

                                    </td>
                                    <td class="text-body fs-sm fw-normal d-none d-xl-table-cell">
                                        {{ number_format($item->variant->sale_price) }} VND
                                        <td class="d-none d-md-table-cell">
                                            <div class="input-group">
                                                <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity('{{ $item->id }}', -1)">
                                                    <span class="icon-minus">-</span>
                                                </button>
                                                <input type="number" name="quantity" id="quantity-{{ $item->id }}" value="{{ $item->quantity }}" min="1" class="form-control" style="width: 60px;" onchange="updateQuantity('{{ $item->id }}')">
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
                                                aria-label="Xóa khỏi giỏ hàng"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="nav position-relative z-2 mb-4 mb-lg-0">
                        <a class="nav-link animate-underline px-0" href="{{ route('home') }}">
                            <i class="ci-chevron-left fs-lg me-1"></i>
                            <span class="animate-target">Tiếp tục mua sắm</span>
                        </a>
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
                                    Tổng số tiền ({{ count($cartItems) }} mặt hàng):
                                    <span id="order-summary-total" class="text-dark-emphasis fw-medium">{{ number_format(session('total_amount', 0)) }} VND</span>
                                </li>
                                @if (session('total_discount', 0) > 0)
                                    @foreach (session('applied_vouchers', []) as $code => $percentage)
                                    <li class="d-flex justify-content-between align-items-center">
                                        Mã giảm giá {{ $code }} ({{ $percentage }}%):
                                        <div>
                                            <span id="discount-{{ $code }}" data-percentage="{{ $percentage }}" class="text-danger fw-medium">
                                                -{{ number_format(session('total_amount', 0) * ($percentage / 100)) }} VND
                                            </span>
                                            <form action="{{ route('vouchers.remove') }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                <input type="hidden" name="voucher_code" value="{{ $code }}">
                                                <button type="submit" class="btn btn-link p-0 ms-2" style="color: #ff0000;">
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
                                    <span id="order-summary-final-total" class="h5 mb-0">{{ number_format(session('total_after_discount', session('total_amount', 0))) }} VND</span>
                                </div>
                                <a class="btn btn-lg btn-primary w-100" href="{{ route('checkout') }}">
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
                                <button type="button"
                                    class="accordion-button animate-underline collapsed py-0 ps-sm-2 ps-lg-0 ps-xl-2"
                                    data-bs-toggle="collapse" data-bs-target="#promoCode" aria-expanded="false"
                                    aria-controls="promoCode">
                                    <i class="ci-percent fs-xl me-2"></i>
                                    <span class="animate-target me-2">Áp dụng mã giảm giá</span>
                                </button>
                            </h3>
                            <div class="accordion-collapse collapse" id="promoCode" aria-labelledby="promoCodeHeading">
                                <div class="accordion-body pt-3 pb-2 ps-sm-2 px-lg-0 px-xl-2">
                                    <form action="{{ route('vouchers.apply') }}" method="POST"
                                        class="needs-validation d-flex gap-2" novalidate="">
                                        @csrf
                                        <div class="position-relative w-100">
                                            <input type="text" class="form-control" name="voucher_code"
                                                placeholder="Nhập mã giảm giá" required>
                                            <div class="invalid-tooltip bg-transparent py-0">Hãy nhập mã giảm giá hợp lệ!
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
        </div>

        <script>
            function updateQuantity(itemId, change = 0) {
    let input = document.getElementById(`quantity-${itemId}`);
    let newQuantity = parseInt(input.value) + change;
    if (newQuantity < 1) newQuantity = 1;

    input.value = newQuantity;

    fetch(`/cart/update-ajax/${itemId}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ quantity: newQuantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`total-price-${itemId}`).innerText = data.totalPrice + ' VND';
            document.querySelector('#order-summary-total').innerText = data.totalAmount + ' VND'; // Cập nhật tổng số tiền
            document.querySelector('#order-summary-final-total').innerText = data.totalAfterDiscount + ' VND'; // Cập nhật tổng thanh toán sau cùng

            // Cập nhật giảm giá
            const discountElements = document.querySelectorAll("[id^='discount-']");
            discountElements.forEach(discountElement => {
                discountElement.innerText = `-${data.totalDiscount} VND`;
            });
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}




document.addEventListener("DOMContentLoaded", function () {
    const totalAmountElement = document.getElementById("order-summary-total");
    const finalTotalElement = document.getElementById("order-summary-final-total");
    const discountElements = document.querySelectorAll("[id^='discount-']");

    function updateDiscounts() {
        const totalAmount = parseFloat(totalAmountElement.textContent.replace(/,/g, '')) || 0;
        let totalDiscount = 0;

        discountElements.forEach((discountElement) => {
            const percentage = parseFloat(discountElement.getAttribute("data-percentage")) || 0;
            const discountAmount = totalAmount * (percentage / 100);
            discountElement.textContent = `-${discountAmount.toLocaleString()} VND`;
            totalDiscount += discountAmount;
        });

        const finalTotal = totalAmount - totalDiscount;
        finalTotalElement.textContent = `${finalTotal.toLocaleString()} VND`;
    }

    updateDiscounts(); // Gọi hàm này ban đầu khi trang load
});


        </script>

    </section>
@endsection
