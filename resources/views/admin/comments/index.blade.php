@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1 class="fw-bold">DANH SÁCH ĐƠN HÀNG</h1>
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
                        <th>Sản phẩm</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->product->name}}</td>
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
