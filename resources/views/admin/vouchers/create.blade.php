<!-- resources/views/vouchers/add.blade.php -->
@extends('adminlte::page')

@section('content')
<div class="container pt-5 pb-5">
    <h1 class="fw-bold">Tạo Mã Giảm Giá Mới</h1>
    <div class="p-3 bg-white rounded-3 shadow">
        <div class="">
            <form action="{{ route('vouchers.store') }}" method="POST">
                @csrf
                <div class="d-flex">
                    <div class="col-8">
                        <div class="form-group">
                            <label class="form-label" for="code">Mã giảm giá</label>
                            <input type="text" class="form-control" id="code" name="code" >
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="percentage">Giảm giá theo phần trăm</label>
                            <input type="number" class="form-control" id="percentage" name="percentage" >
                            @error('percentage')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="description">Mô tả</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-4">
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
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Lưu mã giảm giá</button>
            </form>

        </div>
    </div>
</div>
@endsection
