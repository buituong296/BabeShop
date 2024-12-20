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

      <!-- Thanh điều hướng sidebar chuyển thành offcanvas khi màn hình < 992px (điểm ngắt lg) -->
      @include('user.partials.nav')

      <!-- Nội dung địa chỉ -->
      <div class="col-lg-9">
        <div class="ps-lg-3 ps-xl-0">

          <!-- Tiêu đề trang -->
          <h1 class="h2 mb-1 mb-sm-2">Thông báo</h1>

          <!-- Địa chỉ giao hàng chính -->


          @if (empty($noti) || $noti->count() == 0)
          <div class="border-bottom py-4">
           
              
          <h2 class="h6 mb-0">Bạn chưa có thông báo nào</h2>
          
          </div>
          @endif


          @foreach ($noti as $item)
          <div class="border-bottom py-4">
            <div class="nav flex-nowrap align-items-center justify-content-between pb-1 mb-3">
              <div class="d-flex align-items-center gap-3 me-4">
                <h2 class="h6 mb-0">{{ $item->type }} </h2>
              </div>
              <p class="nav-link hiding-collapse-toggle p-0 collapsed" 
              {{-- <p class="nav-link hiding-collapse-toggle text-decoration-underline p-0 collapsed"  --}}
                {{-- href="#primaryAddressEdit{{ $item->id }}" 
                data-bs-toggle="collapse" 
                aria-expanded="false" 
                aria-controls="primaryAddressEdit{{ $item->id }}" --}}
                >
                {{$item->created_at}}
            </p>
            </div>
            <div class="collapse primary-address show" id="primaryAddressPreview">
              <ul class="list-unstyled fs-sm m-0">
                <li>{{ $item->message }}</li>

              </ul>
            </div>
            <div class="collapse primary-address" id="primaryAddressEdit{{ $item->id }}">

             
            </div>
          </div>
          @endforeach
          

          <!-- Địa chỉ giao hàng thay thế -->
   

        </div>
      </div>
    
    </div>
  </div>




  
@endsection

