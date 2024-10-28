@extends('layouts.app')

@section('content')
    <div class="container py-5 mt-n2 mt-sm-0">
        <div class="row pt-md-2 pt-lg-3 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">


            <!-- Review form modal -->
            <div class="modal fade" id="reviewForm" data-bs-backdrop="static" tabindex="-1" aria-labelledby="reviewFormLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <form class="modal-content needs-validation" novalidate="">
                        <div class="modal-header d-block pb-3">
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="modal-title" id="reviewFormLabel">Leave a review for:</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="d-flex align-items-center">
                                <a class="flex-shrink-0" href="shop-product-general-electronics.html">
                                    <img src="assets/img/shop/electronics/thumbs/10.png" width="110" alt="MacBook">
                                </a>
                                <div class="w-100 min-w-0 ps-2 ps-sm-3">
                                    <h5 class="d-flex animate-underline mb-2">
                                        <a class="d-block fs-sm fw-medium text-truncate animate-target"
                                            href="shop-product-general-electronics.html">Apple iPhone 14 Plus 128GB Blue</a>
                                    </h5>
                                    <div class="h6 mb-0">$940.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body pb-3">
                            <div class="mb-3">
                                <label for="review-name" class="form-label">Your name</label>
                                <input type="text" class="form-control" id="review-name" value="Susan Gardner"
                                    readonly="">
                                <div class="invalid-feedback">Please enter your name!</div>
                                <small class="form-text">Will be displayed on the comment.</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rating <span class="text-danger">*</span></label>
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
                                <label class="form-label" for="review-text">Review <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" rows="4" id="review-text" required=""></textarea>
                                <div class="invalid-feedback">Please write a review!</div>
                                <small class="form-text">Your review must be at least 50 characters.</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pros</label>
                                <input type="text" class="form-select"
                                    data-select="{&quot;placeholderValue&quot;: &quot;Type and hit \&quot;Enter\&quot;&quot;}">
                            </div>
                            <div>
                                <label class="form-label">Cons</label>
                                <input type="text" class="form-select"
                                    data-select="{&quot;placeholderValue&quot;: &quot;Type and hit \&quot;Enter\&quot;&quot;}">
                            </div>
                        </div>
                        <div class="modal-footer flex-nowrap gap-3 border-0 px-4">
                            <button type="reset" class="btn btn-secondary w-100 m-0"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary w-100 m-0">Submit review</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Sidebar navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
            @include('user.partials.nav')


            <!-- Orders content -->
            <div class="col-lg-9">
                <div class="ps-lg-3 ps-xl-0">

                    <!-- Page title + Sorting selects -->
                    <div class="row align-items-center pb-3 pb-md-4 mb-md-1 mb-lg-2">
                        <div class="col-md-4 col-xl-6 mb-3 mb-md-0">
                            <h1 class="h2 me-3 mb-0">Đánh giá</h1>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                        @foreach ($products as $item)
                            <!-- Item -->
                            <div class="d-md-flex align-items-center justify-content-between gap-4 border-bottom py-3">
                                <div class="nav flex-nowrap position-relative align-items-center">
                                    <img src="{{ asset('storage/' . $item->image) }}" class="d-block my-xl-1"
                                        width="64" alt="{{$item->image}}">
                                    <a class="nav-link stretched-link hover-effect-underline ps-3 p-0"
                                        href="shop-product-general-electronics.html">{{$item->name}}</a>
                                </div>
                                <div class="d-flex pt-2 pt-md-0 ps-3 ps-md-0 mb-2 mb-md-0">
                                    <div class="d-md-none" style="width: 64px"></div>
                                    @if ($item->is_comment ==0)
                                    <a href="{{route('comment.add', $item->id)}}" class="btn btn-secondary">Đánh giá</a>
                                    @else
                                    <a href="{{route('comment.detail', $item->id)}}" class="btn btn-secondary">Chi tiết</a>
                                    @endif                                
                                </div>
                            </div>
                        @endforeach

                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
