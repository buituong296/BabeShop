@extends('layouts.app')

@section('content')
<main class="content-wrapper d-flex align-items-center justify-content-center">
  <div class="container">

    <!-- Error message -->
    <section class="text-center py-1 px-2 px-sm-0 my-2 my-md-3 my-lg-4 my-xl-5 mx-auto" style="max-width: 636px">
      <div class="pb-4 mb-3 mx-auto" style="max-width: 524px">
        {{-- <svg class="text-body-emphasis" viewBox="0 0 524 200" xmlns="http://www.w3.org/2000/svg">
          
          
        </svg> --}}
        
        <img src="{{ asset('assets/app-icons/search.png') }}" height="512" width="512">
      </div>
      <h1>Không tìm thấy trang</h1>
      <p class="pb-3">Trang ngài đang tìm kiếm không thể tìm thấy,hoặc chưa từng tồn tại.</p>
      <a class="btn btn-lg btn-primary" href="/">Quay về trang chủ</a>
    </section>


    
  </div>
</main>
 
@endsection