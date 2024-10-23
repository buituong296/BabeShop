
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Bill Details</h2>

        <div class="card mb-3">
            <div class="card-header">
                <strong>Mã hóa đơn:</strong> {{ $bill->bill_code }} <br> <!-- Assuming 'code' is the column for the bill code -->
                <strong>Tên người mua:</strong> {{ $bill->user_name }} <br> <!-- Assuming 'name' is the column for the user name -->
                <strong>Trạng thái đơn hàng:</strong>
                @if($bill->payment_status == 0)
                    Chưa thanh toán 
                @elseif($bill->payment_status == 1)
                    Chờ xác nhận
                @elseif($bill->payment_status == 2)
                  Đang xử lí
                @elseif($bill->payment_status == 3)
                  Đang giao hàng
                @elseif($bill->payment_status == 4)
                  Giao hàng thành công
                @elseif($bill->payment_status == 5)
                  Đã hủy
                @elseif($bill->payment_status == 6)
                  Hoàn trả
                @else
                    Unknown
                @endif
            </div>

            <div class="card-body">
                <h5>Sản phẩm đã mua:</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bill->billitems as $billitem)
                            <tr>
                                <td>{{ $billitem->product_name }}</td> 
                                <td>{{ number_format($billitem->variant_sale_price, 0, ',', '.') }} VND</td>
                                <td>{{ $billitem->quantity }}</td>
                                <td>{{ number_format($billitem->variant_sale_price * $billitem->quantity, 0, ',', '.') }} VND</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <h5>Tổng thanh toán:</h5>
                <p>
                    {{ number_format($bill->billitems->sum(function($billitem) {
                        return $billitem->variant_sale_price * $billitem->quantity;
                    })) }} VND
                </p>
                
            </div>
        </div>

        <a href="{{ route('bill') }}" class="btn btn-primary">Quay lại lịch sử mua hàng</a>
    </div>
@endsection
