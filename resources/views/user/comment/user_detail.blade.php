@extends('layouts.app')
@push('style')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                    <a class="flex-shrink-0" href="{{ route('productdetail', $product->id) }}">
                                        <img src="{{ asset('storage/' . $product->image) }}" width="110"
                                            alt="{{ $product->name }}">
                                    </a>
                                    <div class="w-100 min-w-0 ps-2 ps-sm-3">
                                        <h5 class="d-flex animate-underline mb-2">
                                            <a class="d-block fs-sm fw-medium text-truncate animate-target"
                                                href="{{ route('productdetail', $product->id) }}">{{ $product->name }}</a>
                                        </h5>
                                        <div class="h6 mb-0">{{ number_format($product->price, 0, ',', '.') }} VND</div>
                                    </div>
                                </div>
                            </div>
                            <label class="form-label" for="review-text">Đánh giá <span class="text-danger">*</span></label>
                            <div class="mb-3">
                                <div class="d-flex gap-1 fs-sm me-2 me-sm-3">
                                    @if ($comment->rating >= '0')
                                    <i class="ci-star-filled text-warning"></i>
                                    @else
                                    <i class="ci-star text-body-tertiary opacity-75"></i>
                                    @endif
                                    @if ($comment->rating >= '2')
                                    <i class="ci-star-filled text-warning"></i>
                                    @else
                                    <i class="ci-star text-body-tertiary opacity-75"></i>
                                    @endif
                                    @if ($comment->rating >= '3')
                                    <i class="ci-star-filled text-warning"></i>
                                    @else
                                    <i class="ci-star text-body-tertiary opacity-75"></i>
                                    @endif
                                    @if ($comment->rating >= '4')
                                    <i class="ci-star-filled text-warning"></i>
                                    @else
                                    <i class="ci-star text-body-tertiary opacity-75"></i>
                                    @endif
                                    @if ($comment->rating >= '5')
                                    <i class="ci-star-filled text-warning"></i>
                                    @else
                                    <i class="ci-star text-body-tertiary opacity-75"></i>
                                    @endif


                                  </div>
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label" for="review-text">Biến thể<span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="variant_id" value="{{ $variant->color->name }}, {{ $variant->size->name }}" disabled>
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label" for="review-text">Bình luận <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" rows="4" id="review-text"  required="" name="comment" disabled >{{$comment->comment}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Ảnh sản phẩm</label>
                                <div class="d-flex">
                                    @foreach($comment->album as $key => $image)
                                    <img src="{{ asset('storage/albums/' . $image->image) }}" alt="Ảnh album" class="mx-1 rounded-3 img-thumbnail" width="15%" 
                                         data-bs-toggle="modal" data-bs-target="#imageModal" data-image="{{ asset('storage/albums/' . $image->image) }}">
                                @endforeach
                                </div>
                            </div>
                            <div class="modal-footer flex-nowrap gap-3 border-0 px-4">
                                <a href="{{route('comment')}}" class="btn btn-secondary w-100 m-0">Quay lại</a>
                            </div>
                        </form>
                    </div>

                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img id="modalImage" src="" class="d-block w-100" alt="Ảnh lớn">
                                </div>
                            </div>
                        </div>
                    </div>
            


                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        $('img[data-bs-toggle="modal"]').on('click', function() {
            let imageUrl = $(this).data('image');
            console.log(imageUrl); // Kiểm tra URL ảnh trong console

            $('#modalImage').attr('src', imageUrl);
        });
    });
</script>
@endpush