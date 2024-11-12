@extends('adminlte::page')

@section('title', 'Thông báo')

@section('content_header')
    <h1 class="fw-bold">TẠO THÔNG BÁO</h1>
@stop

@section('content')
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('vouchers.store') }}" method="POST">
                @csrf
                <div class="d-flex">
                    <div class="col-8">
                        <div class="form-group">
                            <label class="form-label" for="code">Loại thông báo</label>
                            <input type="text" class="form-control" id="code" name="code" >
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="percentage">Đối tượng</label>
                            <input type="number" class="form-control" id="percentage" name="percentage" >
                            @error('percentage')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="description">Nội dung thông báo</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-4">
                        <div class="form-group">
                            <label class="form-label" for="quantity">Số lượng</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" >
                            @error('quantity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="start">Ngày bắt đầu</label>
                            <input type="datetime-local" class="form-control" id="start" name="start" >
                            @error('start')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="end">Ngày kết thúc</label>
                            <input type="datetime-local" class="form-control" id="end" name="end" >
                            @error('end')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}
                </div>

                <button type="submit" class="btn btn-success">Gửi thông báo</button>
            </form>
        </div>
    </div>
@stop
