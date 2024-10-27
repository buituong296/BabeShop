<!-- resources/views/vouchers/edit.blade.php -->
@extends('adminlte::page')

@section('content')
<div class="container pt-5 pb-5">
    <h1 class=" fw-bold">Edit Voucher</h1>
    <div class=" p-3 bg-white rounded-3 shadow">
        <form action="{{ route('vouchers.update', $voucher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="d-flex">
                <div class="col-8">
                    <div class="form-group">
                        <label for="code">Mã giảm giá</label>
                        <input type="text" class="form-control" id="code" name="code" value="{{ $voucher->code }}" >
                        @error('code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="percentage">Giảm giá theo phần trăm</label>
                        <input type="number" class="form-control" id="percentage" name="percentage" value="{{ $voucher->percentage }}" >
                        @error('percentage')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" id="description" name="description">{{ $voucher->description }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $voucher->quantity }}" >
                        @error('quantity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="start">Ngày bắt đầu</label>
                        <input type="datetime-local" class="form-control" id="start" name="start"
                               value="{{ \Carbon\Carbon::parse($voucher->start)->format('Y-m-d\TH:i') }}" >
                        @error('start')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="end">Ngày kết thúc</label>
                        <input type="datetime-local" class="form-control" id="end" name="end"
                               value="{{ \Carbon\Carbon::parse($voucher->end)->format('Y-m-d\TH:i') }}" >
                        @error('end')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>

        </form>
    </div>
</div>
@endsection
