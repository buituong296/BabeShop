<aside class="col-lg-3">
  <div class="offcanvas-lg offcanvas-start pe-lg-0 pe-xl-4" id="accountSidebar">

    <!-- Tiêu đề -->
    <div class="offcanvas-header d-lg-block py-3 p-lg-0">
      <div class="d-flex align-items-center">
        <div class="h5 d-flex justify-content-center align-items-center flex-shrink-0 text-primary bg-primary-subtle lh-1 rounded-circle mb-0" style="width: 3rem; height: 3rem">S</div>
        <div class="min-w-0 ps-3">
          <h5 class="h6 mb-1">{{ Auth::user()->name }}</h5>
          <div class="nav flex-nowrap text-nowrap min-w-0">
            <a class="nav-link animate-underline text-body p-0" href="#bonusesModal" data-bs-toggle="modal">
              <svg class="text-warning flex-shrink-0 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"><path d="M1.333 9.667H7.5V16h-5c-.64 0-1.167-.527-1.167-1.167V9.667zm13.334 0v5.167c0 .64-.527 1.167-1.167 1.167h-5V9.667h6.167zM0 5.833V7.5c0 .64.527 1.167 1.167 1.167h.167H7.5v-1-3H1.167C.527 4.667 0 5.193 0 5.833zm14.833-1.166H8.5v3 1h6.167.167C15.473 8.667 16 8.14 16 7.5V5.833c0-.64-.527-1.167-1.167-1.167z"></path><path d="M8 5.363a.5.5 0 0 1-.495-.573C7.752 3.123 9.054-.03 12.219-.03c1.807.001 2.447.977 2.447 1.813 0 1.486-2.069 3.58-6.667 3.58zM12.219.971c-2.388 0-3.295 2.27-3.595 3.377 1.884-.088 3.072-.565 3.756-.971.949-.563 1.287-1.193 1.287-1.595 0-.599-.747-.811-1.447-.811z"></path><path d="M8.001 5.363c-4.598 0-6.667-2.094-6.667-3.58 0-.836.641-1.812 2.448-1.812 3.165 0 4.467 3.153 4.713 4.819a.5.5 0 0 1-.495.573zM3.782.971c-.7 0-1.448.213-1.448.812 0 .851 1.489 2.403 5.042 2.566C7.076 3.241 6.169.971 3.782.971z"></path></svg>
              <span class="animate-target me-1">100 điểm thưởng</span>
              <span class="text-body fw-normal text-truncate">có sẵn</span>
            </a>
          </div>
        </div>
      </div>
      <button type="button" class="btn-close d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#accountSidebar" aria-label="Đóng"></button>
    </div>

    <!-- Nội dung (Điều hướng) -->
    <div class="offcanvas-body d-block pt-2 pt-lg-4 pb-lg-0">
      <nav class="list-group list-group-borderless">
        
        <a class="list-group-item list-group-item-action d-flex align-items-center" href=" {{ route('bill') }} ">
          <i class="ci-shopping-bag fs-base opacity-75 me-2"></i>
          Đơn hàng
        </a>
        <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-wishlist.html">
          <i class="ci-heart fs-base opacity-75 me-2"></i>
          Danh sách yêu thích
        </a>
        <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-payment.html">
          <i class="ci-credit-card fs-base opacity-75 me-2"></i>
          Phương thức thanh toán
        </a>
        <a class="list-group-item list-group-item-action d-flex align-items-center" href="{{route('comment')}}">
          <i class="ci-star fs-base opacity-75 me-2"></i>
          Đánh giá của tôi
        </a>
      </nav>
      <h6 class="pt-4 ps-2 ms-1">Quản lý tài khoản</h6>
      <nav class="list-group list-group-borderless">
        <a class="list-group-item list-group-item-action d-flex align-items-center"     href="{{route('user-info')}}">
          <i class="ci-user fs-base opacity-75 me-2"></i>
          Thông tin cá nhân
        </a>
        <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-addresses.html">
          <i class="ci-map-pin fs-base opacity-75 me-2"></i>
          Địa chỉ
        </a>
        <a class="list-group-item list-group-item-action d-flex align-items-center" href="account-notifications.html">
          <i class="ci-bell fs-base opacity-75 mt-1 me-2"></i>
          Thông báo
        </a>
      </nav>
      <h6 class="pt-4 ps-2 ms-1">Dịch vụ khách hàng</h6>
      <nav class="list-group list-group-borderless">
        <a class="list-group-item list-group-item-action d-flex align-items-center" href="help-topics-v1.html">
          <i class="ci-help-circle fs-base opacity-75 me-2"></i>
          Trung tâm trợ giúp
        </a>
        <a class="list-group-item list-group-item-action d-flex align-items-center" href="terms-and-conditions.html">
          <i class="ci-info fs-base opacity-75 me-2"></i>
          Điều khoản và điều kiện
        </a>
      </nav>
      <nav class="list-group list-group-borderless pt-3">
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button type="submit" class="list-group-item list-group-item-action d-flex align-items-center"><i class="ci-log-out fs-base opacity-75 me-2"></i>
            Đăng xuất</button>
        </form>
       
      </nav>
    </div>
  </div>
</aside>
