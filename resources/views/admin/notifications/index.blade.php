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
                            <select name="code" id="code" class="form-control" onchange="updateSecondDropdown()">
                                <option value="ma_giam_gia" selected>Mã giảm giá</option>
                                <option value="san_pham">Sản phẩm</option>
                                <option value="binh_luan">Bình luận</option>
                            </select>
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="details">Tiêu đề</label>
                            <select name="details" id="details" class="form-control">
                               
                            </select>
                        </div>
                        
                        <script>
                             window.onload = function() {
                                updateSecondDropdown(); // Populate second dropdown on page load
                            };
                            function updateSecondDropdown() {
                                const code = document.getElementById('code').value;
                                const details = document.getElementById('details');
                                
                                // Clear existing options
                                details.innerHTML = '';
                        
                                // Populate options based on the selected value of the first dropdown
                                if (code === 'ma_giam_gia') {
                                    details.innerHTML = `
                                        <option value="discount_1">Mã giảm giá mới đến đây!</option>
                                        <option value="discount_2">Mã giảm giá của bạn sắp hết hạn</option>
                                    `;
                                } else if (code === 'san_pham') {
                                    details.innerHTML = `
                                        <option value="order_1">Sản phẩm trong giỏ hàng của bạn mới được giảm giá</option>
                                        <option value="order_2">Order Type 2</option>
                                    `;
                                } else if (code === 'binh_luan') {
                                    details.innerHTML = `
                                        <option value="comment_1">Comment Type 1</option>
                                        <option value="comment_2">Comment Type 2</option>
                                    `;
                                }
                            }
                        </script>
                        


                        
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
