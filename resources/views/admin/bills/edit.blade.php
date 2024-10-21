@extends('adminlte::page')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container pt-5 pb-5">

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

            <div class="card mb-4">
                <div class="card-body">
                    <h5>Thay Đổi Trạng Thái Đơn Hàng</h5>
                    <form action="{{ route('bills.update', $bill->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="methodId" value="{{$bill->method_id}}">
                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <input type="hidden" name="fromStatus" value="{{$bill->bill_status}}">
                            <select class="form-control" name="toStatus">

                                @foreach ($billStatuses as $billStatus)
                                    <option value="{{ $billStatus->id }}"
                                        @if ($billStatus->id == $bill->bill_status) selected @endif>{{ $billStatus->name }}</option>
                                @endforeach


                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control" name="note" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary">Lưu</button>
                    </form>
                </div>

            </div>
        </div>
@endsection
