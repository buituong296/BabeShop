
@extends('layouts.app')

@section('content')






  <div class="container py-5 mt-n2 mt-sm-0">
    <div class="row pt-md-2 pt-lg-3 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">
      @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif

      <!-- Sidebar navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
      @include('user.partials.nav')


      <!-- Orders content -->
      <div class="col-lg-9">
        <div class="ps-lg-3 ps-xl-0">
    
            <!-- Tiêu đề trang -->
            <h1 class="h2 mb-1 mb-sm-2">Thông tin cá nhân</h1>
    
            <!-- Thông tin cơ bản -->
            <div class="border-bottom py-4">
                <div class="nav flex-nowrap align-items-center justify-content-between pb-1 mb-3">
                    <h2 class="h6 mb-0">Thông tin cơ bản</h2>
                    <a class="nav-link hiding-collapse-toggle text-decoration-underline p-0 collapsed" href="#basicInfoEdit" data-bs-toggle="collapse" aria-expanded="false" aria-controls="basicInfoPreview basicInfoEdit">Chỉnh sửa</a>
                  </div>
                <div class="collapse basic-info show" id="basicInfoPreview">
                    <ul class="list-unstyled fs-sm m-0">
                        <li>{{ Auth::user()->name }}</li>
           
                       
                    </ul>
                </div>
                <div class="collapse basic-info" id="basicInfoEdit">
                    <form class="row g-3 g-sm-4 needs-validation" novalidate="" action="{{ route('user-info.update')}}" method="POST">
                      @csrf

                        <div class="col-sm-6">
                            <label for="fn" class="form-label">Họ và Tên</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required="">
                                <div class="invalid-feedback">Vui lòng nhập tên của bạn!</div>
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="d-flex gap-3 pt-2 pt-sm-0">
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target=".basic-info" aria-expanded="true" aria-controls="basicInfoPreview basicInfoEdit">Đóng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    
            <!-- Liên hệ -->
            <div class="border-bottom py-4">
                <div class="nav flex-nowrap align-items-center justify-content-between pb-1 mb-3">
                    <div class="d-flex align-items-center gap-3 me-4">
                        <h2 class="h6 mb-0">Liên hệ</h2>
                    </div>
                    <a class="nav-link hiding-collapse-toggle text-decoration-underline p-0 collapsed" href="#contactInfoEdit" data-bs-toggle="collapse" aria-expanded="false" aria-controls="contactInfoPreview contactInfoEdit">Chỉnh sửa</a>
                </div>
                <div class="collapse contact-info show" id="contactInfoPreview">
                    <ul class="list-unstyled fs-sm m-0">
                        <li class="mb-1">{{ Auth::user()->email }}</li>
                        <li>
                          @if(Auth::user()->tel == 0)
                          Chưa thêm số điện thoại
                      @else
                          {{ Auth::user()->tel }}
                      @endif
                       <span class="text-success ms-1"></span></li>
                    </ul>
                </div>
                <div class="collapse contact-info" id="contactInfoEdit">
                    <form class="row g-3 g-sm-4 needs-validation" novalidate="" action="{{ route('user-info.updateContact')}}" method="POST">
                        @csrf
                        <div class="col-sm-6">
                            <label for="email" class="form-label">Địa chỉ email</label>
                            <div class="position-relative">
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required="">
                                <div class="invalid-feedback">Vui lòng nhập địa chỉ email hợp lệ!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" id="tel" name="tel" value="{{ Auth::user()->tel }}" required="">

                                <div class="invalid-feedback">Vui lòng nhập số điện thoại của bạn!</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex gap-3 pt-2 pt-sm-0">
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target=".contact-info" aria-expanded="true" aria-controls="contactInfoPreview contactInfoEdit">Đóng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    
            <!-- Mật khẩu -->
            <div class="border-bottom py-4">
                <div class="nav flex-nowrap align-items-center justify-content-between pb-1 mb-3">
                    <div class="d-flex align-items-center gap-3 me-4">
                        <h2 class="h6 mb-0">Mật khẩu</h2>
                    </div>
                    <a class="nav-link hiding-collapse-toggle text-decoration-underline p-0 collapsed" href="#passChangeEdit" data-bs-toggle="collapse" aria-expanded="false" aria-controls="passChangePreview passChangeEdit">Chỉnh sửa</a>
                </div>
                <div class="collapse password-change show" id="passChangePreview">
                    <ul class="list-unstyled fs-sm m-0">
                        <li>**************</li>
                    </ul>
                </div>
                <div class="collapse password-change" id="passChangeEdit">
                    
                    <form class="row g-3 g-sm-4 needs-validation" novalidate="" action="{{  route('user-info.updatePassword') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                            <div class="password-toggle">
                                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Nhập mật khẩu hiện tại" required="">
                                <label class="password-toggle-button" aria-label="Hiện/ẩn mật khẩu">
                                    <input type="checkbox" class="btn-check">
                                </label>
                            </div>
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Mật khẩu mới</label>
                            <div class="password-toggle">
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Tạo mật khẩu mới" required="">
                                <label class="password-toggle-button" aria-label="Hiện/ẩn mật khẩu">
                                    <input type="checkbox" class="btn-check">
                                </label>
                            </div>
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Nhập lại mật khẩu mới</label>

                            <div class="password-toggle">
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Nhập lai mật khẩu mới" required="">
                                <label class="password-toggle-button" aria-label="Hiện/ẩn mật khẩu">
                                    <input type="checkbox" class="btn-check">
                                </label>
                            </div>
                            @error('new_password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="col-12">
                            <div class="d-flex gap-3 pt-2 pt-sm-0">
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target=".password-change" aria-expanded="true" aria-controls="passChangePreview passChangeEdit">Đóng</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
    
            <!-- Xóa tài khoản -->
            <div class="pt-3 mt-2 mt-sm-3">
                <h2 class="h6">Xóa tài khoản</h2>
                <p class="fs-sm">
                    Khi bạn xóa tài khoản, hồ sơ công khai của bạn sẽ bị vô hiệu hóa ngay lập tức. 
                    Nếu bạn thay đổi ý định trước khi 14 ngày trôi qua, hãy đăng nhập bằng email và mật khẩu của bạn, 
                    và chúng tôi sẽ gửi cho bạn một liên kết để kích hoạt lại tài khoản của bạn.
                </p>
                <a class="text-danger fs-sm fw-medium" href="#!" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">Xóa tài khoản</a>
                
                <!-- Delete Account Modal -->
                <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteAccountModalLabel">Xác nhận xóa tài khoản</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc chắn muốn xóa tài khoản không? Hành động này không thể hoàn tác.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-danger" onclick="document.getElementById('delete-account-form').submit();">
                                    Xóa tài khoản
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <form id="delete-account-form" action="{{ route('user-info.delete') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                
                

            </div>
        </div>
    </div>
    
    </div>
  </div>
   

  
@endsection
