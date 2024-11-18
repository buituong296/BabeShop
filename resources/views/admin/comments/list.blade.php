@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1 class="fw-bold">ĐÁNH GIÁ CỦA SẢN PHẨM : {{$name}} </h1>
@stop

@section('content')
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên tài khoản</th>
                        <th>Nội dung đánh giá</th>
                        <th>Đánh giá</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->comment}}</td>
                            <td>
                                <div class="d-flex gap-1 fs-sm">
                                    @if (isset($comment->rating) && $comment->rating > 0)
                                        @php
                                            $fullStars = floor($comment->rating);
                                            $halfStar = $comment->rating - $fullStars >= 0.5 ? 1 : 0;
                                            $emptyStars = 5 - $fullStars - $halfStar;
                                        @endphp
                                        @for ($i = 0; $i < $fullStars; $i++)
                                            <i class="fas fa-star text-warning"></i>
                                        @endfor
                                        @if ($halfStar)
                                            <i class="fas fa-star-half-alt text-warning"></i>
                                        @endif
                                        @for ($i = 0; $i < $emptyStars; $i++)
                                            <i class="far fa-star text-body-tertiary opacity-75 text-warning"  ></i>
                                        @endfor
                                    @else
                                        <span>Chưa có đánh giá</span>
                                    @endif
                                </div>

                            </td>
                            <td>
                                @if($comment->status == 0)
                                    Hợp lệ
                                @elseif($comment->status == 1)
                                    Đã xóa
                                @endif
                            </td>
                            
                            <td>
                                <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-info btn-sm">Xem</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop