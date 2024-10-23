@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lịch sử mua hàng</h1>
   
    <table class="table table-bordered" style="background-color:#fffbf6 ">
        <thead>
          <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Tên người mua</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Trạng thái đơn hàng</th>
            <th scope="col">Hành động</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($bills as $bill)
            <tr>
                <th>{{$bill->bill_code}}</th>
                <td>{{$bill->user_name}}</td>
                <td>
                  @php
                      $itemsToShow = $bill->billitems->take(2);
                  @endphp
                  @foreach($itemsToShow as $billitem)
                      {{ $billitem->product_name }}
                      @if (!$loop->last), @endif 
                  @endforeach
              
                  @if($bill->billitems->count() > 2)
                      ,...
                  @endif
              </td>
              <td>
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
            </td>
            <td>

              <a href="{{route('bill-detail', ['id' => $bill->id] )}}"><button type="button" class="btn btn-warning">Chi tiết</button></a>
              
            </td>
              </tr>
            @endforeach
         
         
        </tbody>
      </table>
</div>

@endsection
