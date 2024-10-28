@extends('layouts.app')

@section('content')
<main class="content-wrapper">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container py-5">
      <div class="row pt-1 pt-sm-3 pt-lg-4 pb-2 pb-md-3 pb-lg-4 pb-xl-5">
        <div class="col-lg-8 col-xl-7 mb-5 mb-lg-0">
          <div class="accordion d-flex flex-column gap-5 pe-lg-4 pe-xl-0" id="checkout">

            <!-- Tổng quan thông tin giao hàng + Nút chỉnh sửa -->

            <!-- Form địa chỉ giao hàng -->

            <div class="d-flex align-items-start">
              <div class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle fs-sm fw-semibold lh-1 flex-shrink-0" style="width: 2rem; height: 2rem; margin-top: -.125rem">1</div>
              <div class="w-100 ps-3 ps-md-4">
                <h1 class="h5 mb-md-4">Địa chỉ giao hàng</h1>
                <form class="needs-validation" action="{{ route('checkout.customer-info.store') }}" method="POST">
                  @csrf
                  <div class="row row-cols-1 row-cols-sm-2 g-3 g-sm-4 mb-4">
                      <div class="col">
                          <label for="user_name" class="form-label">Tên <span class="text-danger">*</span></label>
                          <input type="text" class="form-control form-control-lg" id="user_name" name="user_name" required value="{{ old('user_name', $user_info->name ?? '') }}">
                      </div>
                      <div class="col">
                          <label for="tel" class="form-label">Số điện thoại</label>
                          <input type="tel" class="form-control form-control-lg" id="tel" name="tel" required value="{{ old('tel', $user_info->tel ?? '') }}">
                      </div>
                      <div class="col">
                          <label for="city" class="form-label">Thành phố <span class="text-danger">*</span></label>
                          <input type="text" class="form-control form-control-lg" id="city" name="city" required value="{{ old('city', $address->city ?? '') }}">
                      </div>
                      <div class="col">
                          <label for="district" class="form-label">Quận/Huyện <span class="text-danger">*</span></label>
                          <input type="text" class="form-control form-control-lg" id="district" name="district" required value="{{ old('district', $address->district ?? '') }}">
                      </div>
                      <div class="col">
                          <label for="commune" class="form-label">Xã/Phường <span class="text-danger">*</span></label>
                          <input type="text" class="form-control form-control-lg" id="commune" name="commune" required value="{{ old('commune', $address->commune ?? '') }}">
                      </div>
                      <div class="col">
                          <label for="address" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                          <input type="text" class="form-control form-control-lg" id="address" name="address" required value="{{ old('address', $address->address ?? '') }}">
                      </div>
                      <button class="btn btn-lg btn-primary w-100 d-none d-lg-flex" type="submit">Tiếp tục <i class="ci-chevron-right fs-lg ms-1 me-n1"></i></button>
                  </div>
              </form>
              
              </div>
            </div>

            <!-- Phương thức thanh toán -->
            <div class="d-flex align-items-start">
              <div class="d-flex align-items-center justify-content-center bg-body-secondary text-body-secondary rounded-circle fs-sm fw-semibold lh-1 flex-shrink-0" style="width: 2rem; height: 2rem; margin-top: -.125rem">2</div>
              <h2 class="h5 text-body-secondary ps-3 ps-md-4 mb-0">Thanh toán</h2>
            </div>
          </div>
        </div>

        <!-- Tóm tắt đơn hàng (sidebar cố định) -->
       @include('user/partials/order_summary')
      </div>
    </div>
</main>
@endsection
