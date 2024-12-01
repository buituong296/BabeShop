@extends('layouts.app')

@section('content')
<main class="content-wrapper">


    <!-- Page title -->
    <section class="position-relative bg-body-tertiary py-4">
      <img src="assets/img/contact/title-bg.png" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover rtl-flip" alt="Hình nền">
      <div class="container position-relative z-2 py-4 py-md-5 my-lg-3 my-xl-4 my-xxl-5">
        <div class="row pt-lg-2 pb-2 pb-sm-3 pb-lg-4">
          <div class="col-9 col-md-8 col-lg-6">
            <h1 class="display-4 mb-lg-4">Liên hệ với chúng tôi</h1>
            <p class="mb-0">Hãy thoải mái liên hệ với chúng tôi, chúng tôi sẵn sàng hỗ trợ bạn!</p>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Chi tiết liên hệ -->
    <section class="container pt-5 mt-2 mt-sm-3 mt-lg-4 mt-xl-5 mb-n3">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 pt-lg-2 pt-xl-0">
    
        <!-- Địa điểm -->
        <div class="col">
          <div class="d-flex align-items-center">
            <i class="ci-map-pin fs-lg text-dark-emphasis"></i>
            <h3 class="h6 ps-2 ms-1 mb-0">Địa điểm cửa hàng</h3>
          </div>
          <hr class="text-dark-emphasis opacity-50 my-3 my-md-4">
          <ul class="list-unstyled">
            <li>New York 11741, Hoa Kỳ</li>
            <li>396 Lillian Bolavandy, Holbrook</li>
          </ul>
        </div>
    
        <!-- Số điện thoại -->
        <div class="col">
          <div class="d-flex align-items-center">
            <i class="ci-phone-outgoing fs-lg text-dark-emphasis"></i>
            <h3 class="h6 ps-2 ms-1 mb-0">Gọi trực tiếp cho chúng tôi</h3>
          </div>
          <hr class="text-dark-emphasis opacity-50 my-3 my-md-4">
          <ul class="list-unstyled">
            <li>Khách hàng: 1 50 537 53 082</li>
            <li>Nhượng quyền: 1 50 537 53 000</li>
          </ul>
        </div>
    
        <!-- Email -->
        <div class="col">
          <div class="d-flex align-items-center">
            <i class="ci-mail fs-lg text-dark-emphasis"></i>
            <h3 class="h6 ps-2 ms-1 mb-0">Gửi tin nhắn</h3>
          </div>
          <hr class="text-dark-emphasis opacity-50 my-3 my-md-4">
          <ul class="list-unstyled">
            <li>Khách hàng: help@cartzilla.com</li>
            <li>Nhượng quyền: franchise@catzilla.com</li>
          </ul>
        </div>
    
        <!-- Giờ làm việc -->
        <div class="col">
          <div class="d-flex align-items-center">
            <i class="ci-clock fs-lg text-dark-emphasis"></i>
            <h3 class="h6 ps-2 ms-1 mb-0">Giờ làm việc</h3>
          </div>
          <hr class="text-dark-emphasis opacity-50 my-3 my-md-4">
          <ul class="list-unstyled">
            <li>Thứ Hai - Thứ Sáu: 8:00 - 18:00</li>
            <li>Thứ Bảy - Chủ Nhật: 10:00 - 16:00</li>
          </ul>
        </div>
      </div>
    </section>
    
    <!-- Hỗ trợ / Trung tâm trợ giúp -->
    <section class="container py-5 my-2 my-sm-3 my-lg-4 my-xl-5">
      <div class="d-sm-flex align-items-center justify-content-between py-xxl-3">
        <div class="mb-4 mb-sm-0 me-sm-4">
          <h2 class="h3">Bạn cần hỗ trợ?</h2>
          <p class="mb-0">Chúng tôi có thể đã có câu trả lời bạn tìm kiếm. Xem Câu hỏi thường gặp hoặc truy cập Trung tâm trợ giúp của chúng tôi.</p>
        </div>
        <a class="btn btn-lg btn-outline-dark" href="{{route('support')}}">Trung tâm trợ giúp</a>
      </div>
    </section>
    


    <!-- Map -->
    <section class="position-relative bg-body-tertiary" style="padding: 10px; max-width: 1250px; margin: auto;">
      <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8856.806359515216!2d105.74456219887563!3d21.03955270805923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1sen!2s!4v1733061550688!5m2!1sen!2s" 
          width="500" 
          height="350" 
          style="border: 1px solid #ccc; border-radius: 8px;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </section>
    


    <!-- FAQ accordion -->

  </main>
@endsection