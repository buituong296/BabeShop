
<aside class="col-lg-4 offset-xl-1" style="margin-top: -100px">
  <div class="position-sticky top-0" style="padding-top: 100px">
    <div class="bg-body-tertiary rounded-5 p-4 mb-3">
      <div class="p-sm-2 p-lg-0 p-xl-2">
        <div class="border-bottom pb-4 mb-4">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0">Tóm tắt đơn hàng</h5>
            <div class="nav">
              <a class="nav-link text-decoration-underline p-0" href="{{route('cart')}}">Chỉnh sửa</a>
            </div>
          </div>
          <a class="d-flex align-items-center gap-2 text-decoration-none" href="#orderPreview" data-bs-toggle="offcanvas">
            @foreach ($cartItems as $item)
            <div class="ratio ratio-1x1" style="max-width: 64px">
              <img src="{{ asset('storage/' . $item->variant->product->image) }}" class="d-block p-1" alt="">
            </div>
            @endforeach
            <i class="ci-chevron-right text-body fs-xl p-0 ms-auto"></i>
          </a>
        </div>
        <ul class="list-unstyled fs-sm gap-3 mb-0">
          <li class="d-flex justify-content-between">
            Tạm tính (3 sản phẩm):
            <span class="text-dark-emphasis fw-medium">{{ number_format($totalAmount) }}VND</span>
          </li>
          <li class="d-flex justify-content-between">
            Tiết kiệm:
            <span class="text-danger fw-medium">-$110.00</span>
          </li>
          <li class="d-flex justify-content-between">
            Thuế thu:
            <span class="text-dark-emphasis fw-medium">$73.40</span>
          </li>
          <li class="d-flex justify-content-between">
            Phí vận chuyển:
            <span class="text-dark-emphasis fw-medium">$16.50</span>
          </li>
        </ul>
        <div class="border-top pt-4 mt-4">
          <div class="d-flex justify-content-between mb-3">
            <span class="fs-sm">Tổng ước tính:</span>
            <span class="h5 mb-0">{{ number_format($totalAmount) }}VND</span>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-body-tertiary rounded-5 p-4">
      <div class="d-flex align-items-center px-sm-2 px-lg-0 px-xl-2">
        <svg class="text-warning flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"><path d="M1.333 9.667H7.5V16h-5c-.64 0-1.167-.527-1.167-1.167V9.667zm13.334 0v5.167c0 .64-.527 1.167-1.167 1.167h-5V9.667h6.167zM0 5.833V7.5c0 .64.527 1.167 1.167 1.167h.167H7.5v-1-3H1.167C.527 4.667 0 5.193 0 5.833zm14.833-1.166H8.5v3 1h6.167.167C15.473 8.667 16 8.14 16 7.5V5.833c0-.64-.527-1.167-1.167-1.167z"></path><path d="M8 5.363a.5.5 0 0 1-.495-.573C7.752 3.123 9.054-.03 12.219-.03c1.807.001 2.447.977 2.447 1.813 0 1.486-2.069 3.58-6.667 3.58zM12.219.971c-2.388 0-3.295 2.27-3.595 3.377 1.884-.088 3.072-.565 3.756-.971.949-.563 1.287-1.193 1.287-1.595 0-.599-.747-.811-1.447-.811z"></path><path d="M8.001 5.363c-4.598 0-6.667-2.094-6.667-3.58 0-.836.641-1.812 2.448-1.812 3.165 0 4.467 3.153 4.713 4.819a.5.5 0 0 1-.495.573zM3.782.971c-.7 0-1.448.213-1.448.812 0 .851 1.489 2.403 5.042 2.566C7.076 3.241 6.169.971 3.782.971z"></path></svg>
        <div class="text-dark-emphasis fs-sm ps-2 ms-1">Chúc mừng! Bạn đã tích lũy được <span class="fw-semibold">240 điểm thưởng</span></div>
      </div>
    </div>
  </div>
</aside>
