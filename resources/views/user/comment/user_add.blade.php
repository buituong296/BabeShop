@extends('layouts.app')
@push('style')
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
@endpush
@section('content')
    <div class="container py-5 mt-n2 mt-sm-0">
        <div class="row pt-md-2 pt-lg-3 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">


            <!-- Sidebar navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
            @include('user.partials.nav')


            <!-- Orders content -->
            <div class="col-lg-9">
                <div class="ps-lg-3 ps-xl-0">

                    <!-- Page title + Sorting selects -->
                    <div class="row align-items-center pb-3 pb-md-4 mb-md-1 mb-lg-2">

                        <div class="col-md-4 col-xl-6 mb-3 mb-md-0">
                            <h1 class="h2 me-3 mb-0">Đánh giá sản phẩm</h1>
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

                        <!-- Review form modal -->
                        <form class="modal-content needs-validation" action="{{ route('comment.addPost') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <div class="modal-header d-block pb-3">
                                <div class="d-flex align-items-center">
                                    <a class="flex-shrink-0" href="shop-product-general-electronics.html">
                                        <img src="{{ asset('storage/' . $product->image) }}" width="110"
                                            alt="{{ $product->name }}">
                                    </a>
                                    <div class="w-100 min-w-0 ps-2 ps-sm-3">
                                        <h5 class="d-flex animate-underline mb-2">
                                            <a class="d-block fs-sm fw-medium text-truncate animate-target"
                                                href="shop-product-general-electronics.html">{{ $product->name }}</a>
                                        </h5>
                                        <div class="h6 mb-0">{{ number_format($product->price, 0, ',', '.') }} VND</div>
                                    </div>
                                </div>
                            </div>
                            <label class="form-label" for="review-text">Đánh giá <span class="text-danger">*</span></label>
                            <div class="mb-3">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="review-text">Biến thể<span
                                        class="text-danger">*</span></label>
                                <select class="form-control" name="variant_id">
                                    @foreach ($variants as $item)
                                        <option value="{{ $item->id }}">{{ $item->color->name }},
                                            {{ $item->size->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="review-text">Bình luận <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" rows="4" id="review-text" required="" name="comment"></textarea>
                                <small class="form-text">Bình luận không vượt quá 300 kí tự</small>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Ảnh sản phẩm</label>
                                <input class="form-control" type="file" id="formFile" name="album[]" multiple>
                            </div>
                            <div class="modal-footer flex-nowrap gap-3 border-0 px-4">
                                <a href="{{route('comment')}}" class="btn btn-secondary w-100 m-0">Quay lại</a>
                                <button type="submit" class="btn btn-primary w-100 m-0">Xác nhận</button>
                            </div>
                        </form>
                    </div>





                </div>
            </div>
        </div>
    </div>
@endsection
