<!-- resources/views/product.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">


    <!-- Body -->

    <body>



<!-- Review form modal -->
<div class="modal fade" id="reviewForm" data-bs-backdrop="static" tabindex="-1" aria-labelledby="reviewFormLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content needs-validation" novalidate="">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="reviewFormLabel">Bình luận</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-3 pt-0">
                <div class="mb-3">
                    <label for="review-name" class="form-label">Tên <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="review-name" required="">
                    <div class="invalid-feedback">Please enter your name!</div>
                    <small class="form-text">Will be displayed on the comment.</small>
                </div>
                <div class="mb-3">
                    <label for="review-email" class="form-label">Email <span
                            class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="review-email" required="">
                    <div class="invalid-feedback">Please provide a valid email address!</div>
                    <small class="form-text">Authentication only - we won't spam you.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Đánh giá <span class="text-danger">*</span></label>
                    <select class="form-select"
                        data-select="{
                    &quot;placeholderValue&quot;: &quot;Choose rating&quot;,
                    &quot;choices&quot;: [
                      {
                        &quot;value&quot;: &quot;&quot;,
                        &quot;label&quot;: &quot;Choose rating&quot;,
                        &quot;placeholder&quot;: true
                      },
                      {
                        &quot;value&quot;: &quot;1&quot;,
                        &quot;label&quot;: &quot;<span class=\&quot;visually-hidden\&quot;>1 star</span>&quot;,
                        &quot;customProperties&quot;: {
                          &quot;icon&quot;: &quot;<span class=\&quot;d-flex gap-1 py-1\&quot;><i class=\&quot;ci-star-filled text-warning\&quot;></i></span>&quot;,
                          &quot;selected&quot;: &quot;1 star&quot;
                        }
                      },
                      {
                        &quot;value&quot;: &quot;2&quot;,
                        &quot;label&quot;: &quot;<span class=\&quot;visually-hidden\&quot;>2 stars</span>&quot;,
                        &quot;customProperties&quot;: {
                          &quot;icon&quot;: &quot;<span class=\&quot;d-flex gap-1 py-1\&quot;><i class=\&quot;ci-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i></span>&quot;,
                          &quot;selected&quot;: &quot;2 stars&quot;
                        }
                      },
                      {
                        &quot;value&quot;: &quot;3&quot;,
                        &quot;label&quot;: &quot;<span class=\&quot;visually-hidden\&quot;>3 stars</span>&quot;,
                        &quot;customProperties&quot;: {
                          &quot;icon&quot;: &quot;<span class=\&quot;d-flex gap-1 py-1\&quot;><i class=\&quot;ci-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i></span>&quot;,
                          &quot;selected&quot;: &quot;3 stars&quot;
                        }
                      },
                      {
                        &quot;value&quot;: &quot;4&quot;,
                        &quot;label&quot;: &quot;<span class=\&quot;visually-hidden\&quot;>4 stars</span>&quot;,
                        &quot;customProperties&quot;: {
                          &quot;icon&quot;: &quot;<span class=\&quot;d-flex gap-1 py-1\&quot;><i class=\&quot;ci-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i></span>&quot;,
                          &quot;selected&quot;: &quot;4 stars&quot;
                        }
                      },
                      {
                        &quot;value&quot;: &quot;5&quot;,
                        &quot;label&quot;: &quot;<span class=\&quot;visually-hidden\&quot;>5 stars</span>&quot;,
                        &quot;customProperties&quot;: {
                          &quot;icon&quot;: &quot;<span class=\&quot;d-flex gap-1 py-1\&quot;><i class=\&quot;ci-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i><i class=\&quot;ci-star-filled text-warning\&quot;></i></span>&quot;,
                          &quot;selected&quot;: &quot;5 stars&quot;
                        }
                      }
                    ]
                  }"
                        data-select-template="true" required=""></select>
                    <div class="invalid-feedback">Please choose your rating!</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="review-text">Bình luận <span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="4" id="review-text" required=""></textarea>
                    <div class="invalid-feedback">Please write a review!</div>
                    <small class="form-text">Your review must be at least 50 characters.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ưu điểm</label>
                    <input type="text" class="form-select"
                        data-select="{&quot;placeholderValue&quot;: &quot;Type and hit \&quot;Enter\&quot;&quot;}">
                </div>
                <div>
                    <label class="form-label">Nhược điểm</label>
                    <input type="text" class="form-select"
                        data-select="{&quot;placeholderValue&quot;: &quot;Type and hit \&quot;Enter\&quot;&quot;}">
                </div>
            </div>
            <div class="modal-footer flex-nowrap gap-3 border-0 px-4">
                <button type="reset" class="btn btn-secondary w-100 m-0" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary w-100 m-0">Submit review</button>
            </div>
        </form>
    </div>
</div>




<!-- Page content -->
<main class="content-wrapper">

    <!-- Breadcrumb -->
    <nav class="container pt-3 my-3 my-md-4" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product') }}">{{ $category->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>



    <!-- Nav links + Reviews -->
    <section class="container pb-2 pb-lg-4">
        <div class="d-flex align-items-center border-bottom">
            <ul class="nav nav-underline flex-nowrap gap-4">

                <!-- Page title -->
                <h1 class="h3 container mb-4">{{ $product->name }}</h1>

            </ul>
            <a class="d-none d-md-flex align-items-center gap-2 text-decoration-none ms-auto mb-1" href="#reviews">
                <div class="d-flex gap-1 fs-sm">
                    <i class="ci-star-filled text-warning"></i>
                    <i class="ci-star-filled text-warning"></i>
                    <i class="ci-star-filled text-warning"></i>
                    <i class="ci-star-filled text-warning"></i>
                    <i class="ci-star-half text-warning"></i>
                </div>
                <span class="text-body-tertiary fs-xs">68 đánh giá</span>
            </a>
        </div>
    </section>


    <!-- Gallery + Product options -->
    <section class="container pb-5 mb-1 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
        <div class="row">

            <!-- Product gallery -->
            <div class="col-md-6">

                <!-- Preview (Large image) -->
                <div class="swiper"
                    data-swiper="{
                  &quot;loop&quot;: true,
                  &quot;navigation&quot;: {
                    &quot;prevEl&quot;: &quot;.btn-prev&quot;,
                    &quot;nextEl&quot;: &quot;.btn-next&quot;
                  },
                  &quot;thumbs&quot;: {
                    &quot;swiper&quot;: &quot;#thumbs&quot;
                  }
                }">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="ratio ratio-1x1">
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"
                                    data-zoom="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"
                                    data-zoom-options="{
                          &quot;paneSelector&quot;: &quot;#zoomPane&quot;,
                          &quot;inlinePane&quot;: 768,
                          &quot;hoverDelay&quot;: 500,
                          &quot;touchDisable&quot;: true
                        }"
                                    alt="Preview">
                            </div>
                        </div>


                        {{-- <div class="swiper-slide">
                            <div class="ratio ratio-1x1">
                                <img src="assets/img/shop/electronics/product/gallery/02.png"
                                    data-zoom="assets/img/shop/electronics/product/gallery/02.png"
                                    data-zoom-options="{
                          &quot;paneSelector&quot;: &quot;#zoomPane&quot;,
                          &quot;inlinePane&quot;: 768,
                          &quot;hoverDelay&quot;: 500,
                          &quot;touchDisable&quot;: true
                        }"
                                    alt="Preview">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ratio ratio-1x1">
                                <img src="assets/img/shop/electronics/product/gallery/03.png"
                                    data-zoom="assets/img/shop/electronics/product/gallery/03.png"
                                    data-zoom-options="{
                          &quot;paneSelector&quot;: &quot;#zoomPane&quot;,
                          &quot;inlinePane&quot;: 768,
                          &quot;hoverDelay&quot;: 500,
                          &quot;touchDisable&quot;: true
                        }"
                                    alt="Preview">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ratio ratio-1x1">
                                <img src="assets/img/shop/electronics/product/gallery/04.png"
                                    data-zoom="assets/img/shop/electronics/product/gallery/04.png"
                                    data-zoom-options="{
                          &quot;paneSelector&quot;: &quot;#zoomPane&quot;,
                          &quot;inlinePane&quot;: 768,
                          &quot;hoverDelay&quot;: 500,
                          &quot;touchDisable&quot;: true
                        }"
                                    alt="Preview">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ratio ratio-1x1">
                                <img src="assets/img/shop/electronics/product/gallery/05.png"
                                    data-zoom="assets/img/shop/electronics/product/gallery/05.png"
                                    data-zoom-options="{
                          &quot;paneSelector&quot;: &quot;#zoomPane&quot;,
                          &quot;inlinePane&quot;: 768,
                          &quot;hoverDelay&quot;: 500,
                          &quot;touchDisable&quot;: true
                        }"
                                    alt="Preview">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ratio ratio-1x1">
                                <img src="assets/img/shop/electronics/product/gallery/06.png"
                                    data-zoom="assets/img/shop/electronics/product/gallery/06.png"
                                    data-zoom-options="{
                          &quot;paneSelector&quot;: &quot;#zoomPane&quot;,
                          &quot;inlinePane&quot;: 768,
                          &quot;hoverDelay&quot;: 500,
                          &quot;touchDisable&quot;: true
                        }"
                                    alt="Preview">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ratio ratio-1x1">
                                <img src="assets/img/shop/electronics/product/gallery/07.png"
                                    data-zoom="assets/img/shop/electronics/product/gallery/07.png"
                                    data-zoom-options="{
                          &quot;paneSelector&quot;: &quot;#zoomPane&quot;,
                          &quot;inlinePane&quot;: 768,
                          &quot;hoverDelay&quot;: 500,
                          &quot;touchDisable&quot;: true
                        }"
                                    alt="Preview">
                            </div>
                        </div> --}}
                    </div>

                    <!-- Prev button -->
                    <div class="position-absolute top-50 start-0 z-2 translate-middle-y ms-sm-2 ms-lg-3">
                        <button type="button"
                            class="btn btn-prev btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start"
                            aria-label="Prev">
                            <i class="ci-chevron-left fs-lg animate-target"></i>
                        </button>
                    </div>

                    <!-- Next button -->
                    <div class="position-absolute top-50 end-0 z-2 translate-middle-y me-sm-2 me-lg-3">
                        <button type="button"
                            class="btn btn-next btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end"
                            aria-label="Next">
                            <i class="ci-chevron-right fs-lg animate-target"></i>
                        </button>
                    </div>
                </div>

                <!-- Thumbnails -->
                {{-- <div class="swiper swiper-load swiper-thumbs pt-2 mt-1" id="thumbs"
                    data-swiper="{
                  &quot;loop&quot;: true,
                  &quot;spaceBetween&quot;: 12,
                  &quot;slidesPerView&quot;: 3,
                  &quot;watchSlidesProgress&quot;: true,
                  &quot;breakpoints&quot;: {
                    &quot;340&quot;: {
                      &quot;slidesPerView&quot;: 4
                    },
                    &quot;500&quot;: {
                      &quot;slidesPerView&quot;: 5
                    },
                    &quot;600&quot;: {
                      &quot;slidesPerView&quot;: 6
                    },
                    &quot;768&quot;: {
                      &quot;slidesPerView&quot;: 4
                    },
                    &quot;992&quot;: {
                      &quot;slidesPerView&quot;: 5
                    },
                    &quot;1200&quot;: {
                      &quot;slidesPerView&quot;: 6
                    }
                  }
                }">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide swiper-thumb">
                            <div class="ratio ratio-1x1" style="max-width: 94px">
                                <img src="assets/img/shop/electronics/product/gallery/th01.png"
                                    class="swiper-thumb-img" alt="Thumbnail">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                            <div class="ratio ratio-1x1" style="max-width: 94px">
                                <img src="assets/img/shop/electronics/product/gallery/th02.png"
                                    class="swiper-thumb-img" alt="Thumbnail">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                            <div class="ratio ratio-1x1" style="max-width: 94px">
                                <img src="assets/img/shop/electronics/product/gallery/th03.png"
                                    class="swiper-thumb-img" alt="Thumbnail">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                            <div class="ratio ratio-1x1" style="max-width: 94px">
                                <img src="assets/img/shop/electronics/product/gallery/th04.png"
                                    class="swiper-thumb-img" alt="Thumbnail">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                            <div class="ratio ratio-1x1" style="max-width: 94px">
                                <img src="assets/img/shop/electronics/product/gallery/th05.png"
                                    class="swiper-thumb-img" alt="Thumbnail">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                            <div class="ratio ratio-1x1" style="max-width: 94px">
                                <img src="assets/img/shop/electronics/product/gallery/th06.png"
                                    class="swiper-thumb-img" alt="Thumbnail">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-thumb">
                            <div class="ratio ratio-1x1" style="max-width: 94px">
                                <img src="assets/img/shop/electronics/product/gallery/th07.png"
                                    class="swiper-thumb-img" alt="Thumbnail">
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>


            <!-- Product options -->
            <div class="col-md-6 col-xl-5 offset-xl-1 pt-4">
                <div class="ps-md-4 ps-xl-0">
                    <div class="position-relative" id="zoomPane">

                        <!-- Model -->
                        <div class="pb-3 mb-2 mb-lg-3">
                            <label class="form-label fw-semibold pb-1 mb-2">Kích thước</label>

                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($sizes as $size)
                                <input type="radio" class="btn-check" name="model-options" id="{{$size->name}}" value="">
                                <label for="{{$size->name}}" class="btn btn-sm btn-outline-secondary">{{$size->name}}</label>
                                @endforeach

                            </div>

                        </div>

                        <!-- Color -->
                        <div class="pb-3 mb-2 mb-lg-3">
                            <label class="form-label fw-semibold pb-1 mb-2">Màu sắc:</label>

                            {{-- <div class="d-flex flex-wrap gap-2" data-binded-label="#colorOption">
                                <input type="radio" class="btn-check" name="color-options" id="color-1"
                                    checked="">
                                <label for="color-1" class="btn btn-color fs-xl" data-label="Gray blue"
                                    style="color: #5a7aa1">
                                    <span class="visually-hidden">Gray blue</span>
                                </label>
                                <input type="radio" class="btn-check" name="color-options" id="color-2">
                                <label for="color-2" class="btn btn-color fs-xl" data-label="Pink"
                                    style="color: #ee7976">
                                    <span class="visually-hidden">Pink</span>
                                </label>
                                <input type="radio" class="btn-check" name="color-options" id="color-3">
                                <label for="color-3" class="btn btn-color fs-xl" data-label="Light blue"
                                    style="color: #9acbf1">
                                    <span class="visually-hidden">Light blue</span>
                                </label>
                                <input type="radio" class="btn-check" name="color-options" id="color-4">
                                <label for="color-4" class="btn btn-color fs-xl" data-label="Green"
                                    style="color: #8cd1ab">
                                    <span class="visually-hidden">Green</span>
                                </label>
                            </div> --}}

                            <div class="d-flex flex-wrap gap-2" data-binded-label="#colorOption">
                                @foreach ($colors as $color)

                                <input type="radio" class="btn-check" name="color-options" id="{{$color->name}}" value="">
                                {{-- <label for="{{$color->name}}" class="btn btn-sm btn-outline-secondary">{{$color->name}}</label> --}}
                                <label for="{{ $color->name }}" class="btn btn-sm btn-outline-secondary"
                                    style="background-color: {{ $color->value }};">
                                 {{ $color->name }}
                             </label>

                                @endforeach

                            </div>

                        </div>

                        <!-- Price -->
                        <div class="d-flex flex-wrap align-items-center mb-3">
                            <div class="h3 mb-0 me-3">Giá: </div>
                            <div class="h4 mb-0 me-3">{{ number_format($product->price, 0, ',', '.') }} VND</div>
                            <div class="d-flex align-items-center text-success fs-sm ms-auto">
                                @if ($product->quantity > 0)
                                <i class="ci-check-circle fs-base me-2"></i>
                                Còn hàng
                                @else
                                <i class="ci-close-circle fs-base me-2"></i>
                                Hết hàng
                                @endif
                            </div>
                        </div>

                        <!-- Count + Buttons -->
                        <div
                            class="d-flex flex-wrap flex-sm-nowrap flex-md-wrap flex-lg-nowrap gap-3 gap-lg-2 gap-xl-3 mb-4">
                            <div class="count-input flex-shrink-0 order-sm-1">
                                <button type="button" class="btn btn-icon btn-lg" data-decrement=""
                                    aria-label="Decrement quantity">
                                    <i class="ci-minus"></i>
                                </button>
                                <input type="number" class="form-control form-control-lg" value="1"
                                    min="1" max="5" readonly="">
                                <button type="button" class="btn btn-icon btn-lg" data-increment=""
                                    aria-label="Increment quantity">
                                    <i class="ci-plus"></i>
                                </button>
                            </div>
                            <button type="button"
                                class="btn btn-icon btn-lg btn-secondary animate-pulse order-sm-3 order-md-2 order-lg-3"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm"
                                data-bs-title="Add to Wishlist" aria-label="Add to Wishlist">
                                <i class="ci-heart fs-lg animate-target"></i>
                            </button>
                            <button type="button"
                                class="btn btn-icon btn-lg btn-secondary animate-rotate order-sm-4 order-md-3 order-lg-4"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm"
                                data-bs-title="Compare" aria-label="Compare">
                                <i class="ci-refresh-cw fs-lg animate-target"></i>
                            </button>
                            <button type="button"
                                class="btn btn-lg btn-primary w-100 animate-slide-end order-sm-2 order-md-4 order-lg-2">
                                <i class="ci-shopping-cart fs-lg animate-target ms-n1 me-2"></i>
                                Thêm vào giỏ hàng
                            </button>
                        </div>

                        <!-- Features -->
                        <div class="d-flex flex-wrap gap-3 gap-xl-4 pb-4 pb-lg-5 mb-2 mb-lg-0 mb-xl-2">
                            <div class="d-flex align-items-center fs-sm">
                                <svg class="text-warning me-2" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor">
                                    <path
                                        d="M1.333 9.667H7.5V16h-5c-.64 0-1.167-.527-1.167-1.167V9.667zm13.334 0v5.167c0 .64-.527 1.167-1.167 1.167h-5V9.667h6.167zM0 5.833V7.5c0 .64.527 1.167 1.167 1.167h.167H7.5v-1-3H1.167C.527 4.667 0 5.193 0 5.833zm14.833-1.166H8.5v3 1h6.167.167C15.473 8.667 16 8.14 16 7.5V5.833c0-.64-.527-1.167-1.167-1.167z">
                                    </path>
                                    <path
                                        d="M8 5.363a.5.5 0 0 1-.495-.573C7.752 3.123 9.054-.03 12.219-.03c1.807.001 2.447.977 2.447 1.813 0 1.486-2.069 3.58-6.667 3.58zM12.219.971c-2.388 0-3.295 2.27-3.595 3.377 1.884-.088 3.072-.565 3.756-.971.949-.563 1.287-1.193 1.287-1.595 0-.599-.747-.811-1.447-.811z">
                                    </path>
                                    <path
                                        d="M8.001 5.363c-4.598 0-6.667-2.094-6.667-3.58 0-.836.641-1.812 2.448-1.812 3.165 0 4.467 3.153 4.713 4.819a.5.5 0 0 1-.495.573zM3.782.971c-.7 0-1.448.213-1.448.812 0 .851 1.489 2.403 5.042 2.566C7.076 3.241 6.169.971 3.782.971z">
                                    </path>
                                </svg>
                                <div class="text-body-emphasis text-nowrap"><span class="fw-semibold">+32</span>
                                    bonuses</div>
                            </div>
                            <div class="d-flex align-items-center fs-sm">
                                <svg class="text-primary me-2" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="none">
                                    <path
                                        d="M15.264 8.001l.702-1.831a.5.5 0 0 0-.152-.568l-1.522-1.234-.308-1.937a.5.5 0 0 0-.416-.415l-1.937-.308L10.399.185a.5.5 0 0 0-.567-.152L8 .736 6.169.034a.5.5 0 0 0-.567.152L4.368 1.709l-1.937.308a.5.5 0 0 0-.415.415l-.308 1.937L.185 5.603a.5.5 0 0 0-.152.567l.702 1.831-.702 1.831a.5.5 0 0 0 .152.567l1.523 1.233.308 1.937a.5.5 0 0 0 .415.416l1.937.308 1.234 1.522c.137.17.366.23.568.152L8 15.265l1.831.702a.5.5 0 0 0 .568-.153l1.233-1.522 1.937-.308a.5.5 0 0 0 .416-.416l.308-1.937 1.522-1.233a.5.5 0 0 0 .152-.567l-.702-1.831z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M6.5 7.001a1.5 1.5 0 1 1 0-3 1.5 1.5 0 1 1 0 3zm0-2a.5.5 0 1 0 0 1 .5.5 0 1 0 0-1zM9.5 12a1.5 1.5 0 1 1 0-3 1.5 1.5 0 1 1 0 3zm0-2a.5.5 0 1 0 0 1 .5.5 0 1 0 0-1zm-4 2c-.101 0-.202-.03-.29-.093a.5.5 0 0 1-.116-.698l5-7a.5.5 0 1 1 .814.581l-5 7A.5.5 0 0 1 5.5 12z"
                                        fill="white"></path>
                                </svg>
                                <div class="text-body-emphasis text-nowrap">Interest-free loan</div>
                            </div>
                            <div class="d-flex align-items-center fs-sm">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16">
                                    <path class="text-success"
                                        d="M7.42169 1.15662C3.3228 1.15662 0 4.47941 0 8.5783C0 12.6772 3.3228 16 7.42169 16C11.5206 16 14.8434 12.6772 14.8434 8.5783H7.42169V1.15662Z"
                                        fill="currentColor"></path>
                                    <path class="text-info"
                                        d="M8.57812 0V7.42169H15.9998C15.9998 3.3228 12.677 0 8.57812 0Z"
                                        fill="currentColor"></path>
                                    <defs>
                                        <rect width="16" height="16" fill="white"></rect>
                                    </defs>
                                </svg>
                                <div class="text-body-emphasis text-nowrap">Pay by installments</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <!-- Product details and Reviews shared container -->
    <section class="container pb-5 mb-2 mb-md-3 mb-lg-4 mb-xl-5">
        <div class="row">
            <div class="col-md-7">

                <!-- Product details -->
                <h2 class="h3 pb-2 pb-md-3">Chi tiết sản phẩm</h2>
                <ul class="list-unstyled d-flex flex-column gap-3 fs-sm pb-3 m-0 mb-2 mb-sm-3">
                    <li class="d-flex align-items-center position-relative pe-4">
                        <span>Tên sản phẩm:</span>
                        <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                        <span class="text-dark-emphasis fw-medium text-end">{{ $product->name }}</span>
                    </li>
                    <li class="d-flex align-items-center position-relative pe-4">
                        <span>Phân loại:</span>
                        <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                        <span class="text-dark-emphasis fw-medium text-end">{{ $category->name }}</span>
                    </li>
                    <li class="d-flex align-items-center position-relative pe-4">
                        <span>Kích thước:</span>
                        <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                        <span class="text-dark-emphasis fw-medium text-end">20cm</span>
                    </li>
                    <span>Mô tả:</span>
                    <li class="d-flex align-items-center position-relative pe-4">
                        <span>{{ $product->description }}</span>
                    </li>
                </ul>


                <!-- Reviews -->
                <div class="d-flex align-items-center pt-5 mb-4 mt-2 mt-md-3 mt-lg-4" id="reviews"
                    style="scroll-margin-top: 80px">
                    <h2 class="h3 mb-0">Đánh giá</h2>
                    <button type="button" class="btn btn-secondary ms-auto" data-bs-toggle="modal"
                        data-bs-target="#reviewForm">
                        <i class="ci-edit-3 fs-base ms-n1 me-2"></i>
                        Để lại đánh giá
                    </button>
                </div>

                <!-- Reviews stats -->
                <div class="row g-4 pb-3">
                    <div class="col-sm-4">

                    </div>
                </div>

                <!-- Review -->
                <div class="border-bottom py-3 mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="text-nowrap me-3">
                            <span class="h6 mb-0">Rafael Marquez</span>
                            <i class="ci-check-circle text-success align-middle ms-1" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-custom-class="tooltip-sm"
                                data-bs-title="Verified customer"></i>
                        </div>
                        <span class="text-body-secondary fs-sm ms-auto">28/4/2024</span>
                    </div>
                    <div class="d-flex gap-1 fs-sm pb-2 mb-1">
                        <i class="ci-star-filled text-warning"></i>
                        <i class="ci-star-filled text-warning"></i>
                        <i class="ci-star-filled text-warning"></i>
                        <i class="ci-star-filled text-warning"></i>
                        <i class="ci-star-filled text-warning"></i>
                    </div>
                    <ul class="list-inline gap-2 pb-2 mb-1">
                        <li class="fs-sm me-4"><span class="text-dark-emphasis fw-medium">Màu sắc:</span> Blue
                        </li>
                        <li class="fs-sm"><span class="text-dark-emphasis fw-medium">Kích thước:</span> 128GB
                        </li>
                    </ul>
                    <p class="fs-sm">The phone has a new A15 Bionic chip, which makes it lightning-fast and
                        responsive. The camera system has also been upgraded, and it now includes a 12-megapixel
                        ultra-wide lens and a 12-megapixel wide lens.</p>
                    {{-- <ul class="list-unstyled fs-sm pb-2 mb-1">
                        <li><span class="text-dark-emphasis fw-medium">Pros:</span> Powerful A15 Bionic chip,
                            improved camera</li>
                        <li><span class="text-dark-emphasis fw-medium">Cons:</span> High price tag</li>
                    </ul> --}}
                    {{-- <div class="nav align-items-center">
                        <button type="button" class="nav-link animate-underline px-0">
                            <i class="ci-corner-down-right fs-base ms-1 me-1"></i>
                            <span class="animate-target">Reply</span>
                        </button>
                        <button type="button"
                            class="nav-link text-body-secondary animate-scale px-0 ms-auto me-n1">
                            <i class="ci-thumbs-up fs-base animate-target me-1"></i>
                            0
                        </button>
                        <hr class="vr my-2 mx-3">
                        <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                            <i class="ci-thumbs-down fs-base animate-target me-1"></i>
                            0
                        </button>
                    </div> --}}
                </div>
                <!-- Review -->
                <div class="border-bottom py-3 mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="text-nowrap me-3">
                            <span class="h6 mb-0">Rafael Marquez</span>
                            <i class="ci-check-circle text-success align-middle ms-1" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-custom-class="tooltip-sm"
                                data-bs-title="Verified customer"></i>
                        </div>
                        <span class="text-body-secondary fs-sm ms-auto">28/4/2024</span>
                    </div>
                    <div class="d-flex gap-1 fs-sm pb-2 mb-1">
                        <i class="ci-star-filled text-warning"></i>
                        <i class="ci-star-filled text-warning"></i>
                        <i class="ci-star-filled text-warning"></i>
                        <i class="ci-star-filled text-warning"></i>
                        <i class="ci-star-filled text-warning"></i>
                    </div>
                    <ul class="list-inline gap-2 pb-2 mb-1">
                        <li class="fs-sm me-4"><span class="text-dark-emphasis fw-medium">Màu sắc:</span> Blue
                        </li>
                        <li class="fs-sm"><span class="text-dark-emphasis fw-medium">Kích thước:</span> 128GB
                        </li>
                    </ul>
                    <p class="fs-sm">The phone has a new A15 Bionic chip, which makes it lightning-fast and
                        responsive. The camera system has also been upgraded, and it now includes a 12-megapixel
                        ultra-wide lens and a 12-megapixel wide lens.</p>
                    {{-- <ul class="list-unstyled fs-sm pb-2 mb-1">
                        <li><span class="text-dark-emphasis fw-medium">Pros:</span> Powerful A15 Bionic chip,
                            improved camera</li>
                        <li><span class="text-dark-emphasis fw-medium">Cons:</span> High price tag</li>
                    </ul> --}}
                    {{-- <div class="nav align-items-center">
                        <button type="button" class="nav-link animate-underline px-0">
                            <i class="ci-corner-down-right fs-base ms-1 me-1"></i>
                            <span class="animate-target">Reply</span>
                        </button>
                        <button type="button"
                            class="nav-link text-body-secondary animate-scale px-0 ms-auto me-n1">
                            <i class="ci-thumbs-up fs-base animate-target me-1"></i>
                            0
                        </button>
                        <hr class="vr my-2 mx-3">
                        <button type="button" class="nav-link text-body-secondary animate-scale px-0 ms-n1">
                            <i class="ci-thumbs-down fs-base animate-target me-1"></i>
                            0
                        </button>
                    </div> --}}
                </div>
                {{-- <div class="nav">
                    <a class="nav-link text-primary animate-underline px-0"
                        href="shop-product-reviews-electronics.html">
                        <span class="animate-target">Toàn </span>
                        <i class="ci-chevron-right fs-base ms-1"></i>
                    </a>
                </div> --}}
            </div>


            <!-- Sticky product preview visible on screens > 991px wide (lg breakpoint) -->
            <aside class="col-md-5 col-xl-4 offset-xl-1 d-none d-md-block" style="margin-top: -100px">
                <div class="position-sticky top-0 ps-3 ps-lg-4 ps-xl-0" style="padding-top: 100px">
                    <div class="border rounded p-3 p-lg-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="ratio ratio-1x1 flex-shrink-0" style="width: 110px">
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }} width="110">
                            </div>
                            <div class="w-100 min-w-0 ps-2 ps-sm-3">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="d-flex gap-1 fs-xs">
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star text-body-tertiary opacity-75"></i>
                                    </div>
                                    <span class="text-body-tertiary fs-xs">68</span>
                                </div>
                                <h4 class="fs-sm fw-medium mb-2">{{ $product->name }}</h4>
                                <div class="h5 mb-0">{{ number_format($product->price, 0, ',', '.') }} VND</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 gap-lg-3">
                            <button type="button" class="btn btn-primary w-100 animate-slide-end">
                                <i class="ci-shopping-cart fs-base animate-target ms-n1 me-2"></i>
                                Thêm vào giỏ hàng
                            </button>
                            <button type="button" class="btn btn-icon btn-secondary animate-pulse"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm"
                                data-bs-title="Add to Wishlist" aria-label="Add to Wishlist">
                                <i class="ci-heart fs-base animate-target"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-secondary animate-rotate"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-sm"
                                data-bs-title="Compare" aria-label="Compare">
                                <i class="ci-refresh-cw fs-base animate-target"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>


    <!-- Viewed products (Carousel) -->
    <section class="container pb-4 pb-md-5 mb-2 mb-sm-0 mb-lg-2 mb-xl-4">
        <h2 class="h3 border-bottom pb-4 mb-0">Sản phẩm có liên quan</h2>

        <!-- Product carousel -->
        <div class="position-relative mx-md-1">

            <!-- External slider prev/next buttons visible on screens > 500px wide (sm breakpoint) -->
            <button type="button"
                class="viewed-prev btn btn-prev btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start position-absolute top-50 start-0 z-2 translate-middle-y ms-n1 d-none d-sm-inline-flex"
                aria-label="Prev">
                <i class="ci-chevron-left fs-lg animate-target"></i>
            </button>
            <button type="button"
                class="viewed-next btn btn-next btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end position-absolute top-50 end-0 z-2 translate-middle-y me-n1 d-none d-sm-inline-flex"
                aria-label="Next">
                <i class="ci-chevron-right fs-lg animate-target"></i>
            </button>

            <!-- Slider -->
            <div class="swiper py-4 px-sm-3"
                data-swiper="{
                &quot;slidesPerView&quot;: 2,
                &quot;spaceBetween&quot;: 24,
                &quot;loop&quot;: true,
                &quot;navigation&quot;: {
                  &quot;prevEl&quot;: &quot;.viewed-prev&quot;,
                  &quot;nextEl&quot;: &quot;.viewed-next&quot;
                },
                &quot;breakpoints&quot;: {
                  &quot;768&quot;: {
                    &quot;slidesPerView&quot;: 3
                  },
                  &quot;992&quot;: {
                    &quot;slidesPerView&quot;: 4
                  }
                }
              }">
                <div class="swiper-wrapper">

                    <!-- Item -->
                    @foreach ($productCategory as $item)
                    <div class="swiper-slide">
                        <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                            <div class="position-relative">
                                <div
                                    class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                                    <div class="d-flex flex-column gap-2">
                                        <button type="button"
                                            class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex"
                                            aria-label="Add to Wishlist">
                                            <i class="ci-heart fs-base animate-target"></i>
                                        </button>
                                        <button type="button"
                                            class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex"
                                            aria-label="Compare">
                                            <i class="ci-refresh-cw fs-base animate-target"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                                    <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body"
                                        data-bs-toggle="dropdown" aria-expanded="false" aria-label="More actions">
                                        <i class="ci-more-vertical fs-lg"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end fs-xs p-2" style="min-width: auto">
                                        <li>
                                            <a class="dropdown-item" href="#!">
                                                <i class="ci-heart fs-sm ms-n1 me-2"></i>
                                                Add to Wishlist
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#!">
                                                <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                                                Compare
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="{{ route('productdetail', $item->id) }}">
                                    <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}">
                                    </div>
                                </a>
                            </div>
                            <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="d-flex gap-1 fs-xs">
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                        <i class="ci-star-filled text-warning"></i>
                                    </div>
                                    <span class="text-body-tertiary fs-xs">(187)</span>
                                </div>
                                <h3 class="pb-1 mb-2">
                                    <a class="d-block fs-sm fw-medium text-truncate" href="{{ route('productdetail', $item->id) }}">
                                        <span class="animate-target">{{$item->name}}</span>
                                    </a>
                                </h3>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="h5 lh-1 mb-0">{{ number_format($item->price, 0, ',', '.') }} VND</div>
                                    <button type="button"
                                        class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2"
                                        aria-label="Add to Cart">
                                        <i class="ci-shopping-cart fs-base animate-target"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>




            <!-- External slider prev/next buttons visible on screens < 500px wide (sm breakpoint) -->
            <div class="d-flex justify-content-center gap-2 mt-n2 mb-3 pb-1 d-sm-none">
                <button type="button"
                    class="viewed-prev btn btn-prev btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start me-1"
                    aria-label="Prev">
                    <i class="ci-chevron-left fs-lg animate-target"></i>
                </button>
                <button type="button"
                    class="viewed-next btn btn-next btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end"
                    aria-label="Next">
                    <i class="ci-chevron-right fs-lg animate-target"></i>
                </button>
            </div>
        </div>
    </section>



            <!-- Trending products (Carousel) -->
            <section class="container pb-4 pb-md-5 mb-2 mb-sm-0 mb-lg-2 mb-xl-4">
                <h2 class="h3 border-bottom pb-4 mb-0">Sản phẩm mới</h2>

                <!-- Product carousel -->
                <div class="position-relative mx-md-1">

                    <!-- External slider prev/next buttons visible on screens > 500px wide (sm breakpoint) -->
                    <button type="button"
                        class="trending-prev btn btn-prev btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start position-absolute top-50 start-0 z-2 translate-middle-y ms-n1 d-none d-sm-inline-flex"
                        aria-label="Prev">
                        <i class="ci-chevron-left fs-lg animate-target"></i>
                    </button>
                    <button type="button"
                        class="trending-next btn btn-next btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end position-absolute top-50 end-0 z-2 translate-middle-y me-n1 d-none d-sm-inline-flex"
                        aria-label="Next">
                        <i class="ci-chevron-right fs-lg animate-target"></i>
                    </button>

                    <!-- Slider -->
                    <div class="swiper py-4 px-sm-3"
                        data-swiper="{
                        &quot;slidesPerView&quot;: 2,
                        &quot;spaceBetween&quot;: 24,
                        &quot;loop&quot;: true,
                        &quot;navigation&quot;: {
                          &quot;prevEl&quot;: &quot;.trending-prev&quot;,
                          &quot;nextEl&quot;: &quot;.trending-next&quot;
                        },
                        &quot;breakpoints&quot;: {
                          &quot;768&quot;: {
                            &quot;slidesPerView&quot;: 3
                          },
                          &quot;992&quot;: {
                            &quot;slidesPerView&quot;: 4
                          }
                        }
                      }">
                        <div class="swiper-wrapper">

                            <!-- Item -->
                            @foreach ($productNewest as $item)
                            <div class="swiper-slide">
                                <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
                                    <div class="position-relative">
                                        <div
                                            class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                                            <div class="d-flex flex-column gap-2">
                                                <button type="button"
                                                    class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex"
                                                    aria-label="Add to Wishlist">
                                                    <i class="ci-heart fs-base animate-target"></i>
                                                </button>
                                                <button type="button"
                                                    class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex"
                                                    aria-label="Compare">
                                                    <i class="ci-refresh-cw fs-base animate-target"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                                            <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body"
                                                data-bs-toggle="dropdown" aria-expanded="false" aria-label="More actions">
                                                <i class="ci-more-vertical fs-lg"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end fs-xs p-2" style="min-width: auto">
                                                <li>
                                                    <a class="dropdown-item" href="#!">
                                                        <i class="ci-heart fs-sm ms-n1 me-2"></i>
                                                        Add to Wishlist
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#!">
                                                        <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                                                        Compare
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="{{ route('productdetail', $item->id) }}">
                                            <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                                                <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <div class="d-flex gap-1 fs-xs">
                                                <i class="ci-star-filled text-warning"></i>
                                                <i class="ci-star-filled text-warning"></i>
                                                <i class="ci-star-filled text-warning"></i>
                                                <i class="ci-star-filled text-warning"></i>
                                                <i class="ci-star-filled text-warning"></i>
                                            </div>
                                            <span class="text-body-tertiary fs-xs">(187)</span>
                                        </div>
                                        <h3 class="pb-1 mb-2">
                                            <a class="d-block fs-sm fw-medium text-truncate" href="{{ route('productdetail', $item->id) }}">
                                                <span class="animate-target">{{$item->name}}</span>
                                            </a>
                                        </h3>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="h5 lh-1 mb-0">{{ number_format($product->price, 0, ',', '.') }} VND</div>
                                            <button type="button"
                                                class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2"
                                                aria-label="Add to Cart">
                                                <i class="ci-shopping-cart fs-base animate-target"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>

                    <!-- External slider prev/next buttons visible on screens < 500px wide (sm breakpoint) -->
                    <div class="d-flex justify-content-center gap-2 mt-n2 mb-3 pb-1 d-sm-none">
                        <button type="button"
                            class="trending-prev btn btn-prev btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-start me-1"
                            aria-label="Prev">
                            <i class="ci-chevron-left fs-lg animate-target"></i>
                        </button>
                        <button type="button"
                            class="trending-next btn btn-next btn-icon btn-outline-secondary bg-body rounded-circle animate-slide-end"
                            aria-label="Next">
                            <i class="ci-chevron-right fs-lg animate-target"></i>
                        </button>
                    </div>
                </div>
            </section>

<!-- Vendor scripts -->
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/drift-zoom/Drift.min.js"></script>
<script src="assets/vendor/simplebar/simplebar.min.js"></script>
<script src="assets/vendor/choices.js/choices.min.js"></script>

<!-- Bootstrap + Theme scripts -->
<script src="assets/js/theme.min.js"></script>


</body>

</html>
</div>
@endsection
