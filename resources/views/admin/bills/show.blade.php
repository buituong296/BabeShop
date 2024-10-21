@extends('adminlte::page')

@section('content')
        <div class="container pt-5 pb-5" style="padding-bottom: 20px;">
            <h3 class="text-center">Chi Tiết Đơn Hàng {{ $bill->bill_code }}</h3>

            <div class="card mb-4">
                <div class="card-body">
                    <h5>Thông Tin Đơn Hàng</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mã Đơn Hàng</label>
                                <input type="text" class="form-control" value="{{ $bill->bill_code }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trạng Thái Thanh Toán</label>
                                <input type="text" class="form-control"
                                    value="{{ $bill->payment_status == 1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phương Thức Thanh Toán</label>
                                <input type="text" class="form-control" value="{{ $bill->bankMethod->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Điện Thoại</label>
                                <input type="text" class="form-control" value="{{ $bill->user_tel }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tên Khách Hàng</label>
                        <input type="text" class="form-control" value="{{ $bill->user_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input type="text" class="form-control" value="{{ $bill->user_address }}" readonly>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5>Thông Tin Sản Phẩm</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Biến Thể</th>
                                <th>Số Lượng</th>
                                <th>Giá Bán</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($billProducts as $billProduct)
                                @php
                                    $productTotal = $billProduct->quantity * $billProduct->variant_sale_price;
                                    $total += $productTotal;
                                @endphp
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $billProduct->product_name }}</td>
                                    <td>Màu: {{ $billProduct->variants->color->name }}, Kích cỡ:
                                        {{ $billProduct->variants->size->name }}</td>
                                    <td>{{ $billProduct->quantity }}</td>
                                    <td>{{ number_format($billProduct->variant_sale_price, 0, ',', '.') }} VND</td>
                                    <td>{{ number_format($billProduct->quantity * $billProduct->variant_sale_price, 0, ',', '.') }}
                                        VND</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        {{-- <p>Mã giảm giá (Voucher): </p> --}}
                        <p><strong>Tổng: {{ number_format($total, 0, ',', '.') }} VND</strong></p>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5>Lịch Sử Thay Đổi Trạng Thái</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Trạng Thái Thay Đổi</th>
                                <th>Ghi Chú</th>
                                <th>Người Thay Đổi</th>
                                <th>Thời Gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($billHistories as $billHistory)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $billHistory->fromStatus == null ? 'Đơn hàng' : $billHistory->fromStatus->name }}->
                                        {{ $billHistory->toStatus->name }} </td>
                                    <td>{{ $billHistory->note }}</td>
                                    <td>{{ $billHistory->user->name }}</td>
                                    <td>{{ $billHistory->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('bills.index') }}" class="btn btn-info btn-sm">Trang chủ</a>
        </div>
@endsection
