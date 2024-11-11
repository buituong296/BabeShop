@extends('layouts.app')

{{-- @section('content') --}} {{-- Layout bị duplicate --}}
{{-- <div class="container">
        <h2>Bill Details</h2>

        <div class="card mb-3">
            <div class="card-header">
                <strong>Mã hóa đơn:</strong> {{ $bill->bill_code }} <br> <!-- Assuming 'code' is the column for the bill code -->
                <strong>Tên người mua:</strong> {{ $bill->user_name }} <br> <!-- Assuming 'name' is the column for the user name -->
                <strong>Trạng thái đơn hàng:</strong>
                @if ($bill->payment_status == 0)
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
                        @foreach ($bill->billitems as $billitem)
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
    </div> --}}
{{-- @extends('layouts.app') --}} {{-- Layout bị duplicate --}}


@section('content')
    <div class="container py-5 mt-n2 mt-sm-0">
        <div class="row pt-md-2 pt-lg-3 pb-sm-2 pb-md-3 pb-lg-4 pb-xl-5">


            <!-- Sidebar navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
            @include('user.partials.nav')


            <!-- Orders content -->
            <div class="col-lg-9">
                <div class="ps-lg-3 ps-xl-0">

                    <!-- Page title + Sorting selects -->
                    <div class="row align-items-center pb-3 pb-md-4 mb-md-1 mb-lg-2">
                        <div class="col-md-4 col-xl-6 mb-3 mb-md-0">
                            <h1 class="h2 me-3 mb-0">Chi tiết đơn hàng</h1>
                        </div>

                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <!-- Sortable orders table -->
                    <div
                        data-filter-list="{&quot;listClass&quot;: &quot;orders-list&quot;, &quot;sortClass&quot;: &quot;orders-sort&quot;, &quot;valueNames&quot;: [&quot;date&quot;, &quot;total&quot;]}">
                        <div class="container">


                            <div class="card mb-3">
                                <div class="card-header">
                                    <strong>Mã hóa đơn:</strong> {{ $bill->bill_code }} <br>
                                    <!-- Assuming 'code' is the column for the bill code -->
                                    <strong>Tên người mua:</strong> {{ $bill->user_name }} <br>
                                    <!-- Assuming 'name' is the column for the user name -->
                                    <strong>Trạng thái đơn hàng:</strong>
                                    @if ($bill->bill_status == 0)
                                        Chưa thanh toán
                                    @elseif($bill->bill_status == 1)
                                        Chờ xác nhận
                                        <a href="{{ route('bill-cancel', $bill->id) }}" class="btn btn-primary w-25"> Hủy
                                            đơn hàng </a>
                                    @elseif($bill->bill_status == 2)
                                        Đã xác nhận
                                    @elseif($bill->bill_status == 3)
                                        Đang giao hàng
                                    @elseif($bill->bill_status == 4)
                                        Giao hàng thành công
                                        <a href="{{ route('bill-success', $bill->id) }}" class="btn btn-primary w-25"> Xác
                                            nhận nhận hàng </a>
                                        {{-- <a href="{{ route('bill-return', $bill->id) }}" class="btn btn-primary w-25"> Hoàn trả </a> --}}
                                    @elseif($bill->bill_status == 5)
                                        Đã hủy
                                    @elseif($bill->bill_status == 6)
                                        Hoàn trả
                                    @elseif($bill->bill_status == 7)
                                        Hoàn thành
                                    @elseif($bill->bill_status == 8)
                                        Hoàn trả thành công
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
                                                {{-- <th>Loại</th> --}}
                                                <th>Giá</th>
                                                <th>
                                                    Hình ảnh
                                                </th>
                                                <th>Số lượng</th>
                                                <th>Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bill->billitems as $billitem)
                                                <tr>
                                                    <td><h6>{{ $billitem->product_name }}</h6>                                         
                                                        <p>Màu sắc: {{ $billitem->variants->color->name }}, Kích thước: {{ $billitem->variants->size->name }}</p>
                                                    </td>
                                                    {{-- <td>{{ $billitem->product_name }}</td>
                                                    <td>
                                                        <span class=" btn d-block bg-primary p-2">
                                                            {{ $billitem->variants->color->name }}</span>
                                                        <span
                                                            class="btn d-block bg-info p-2">{{ $billitem->variants->size->name }}</span>

                                                    </td> --}}
                                                    <td>{{ number_format($billitem->variant_sale_price, 0, ',', '.') }} VND
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $billitem->product_image) }}"
                                                            alt="" width="80">
                                                    </td>
                                                    <td>{{ $billitem->quantity }}</td>
                                                    <td>{{ number_format($billitem->variant_sale_price * $billitem->quantity, 0, ',', '.') }}
                                                        VND</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <h5>Tổng thanh toán:</h5>
                                    <p>
                                        {{ number_format(
                                            $bill->billitems->sum(function ($billitem) {
                                                return $billitem->variant_sale_price * $billitem->quantity;
                                            }),
                                        ) }}
                                        VND
                                    </p>

                                </div>
                            </div>

                            <a href="{{ route('bill') }}" class="btn btn-primary">Quay lại lịch sử mua hàng</a>
                        </div>
                    </div>


                    <!-- Pagination -->

                </div>
            </div>
        </div>
    </div>
    {{-- <h1>Lịch sử mua hàng</h1>
   
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
                  @foreach ($itemsToShow as $billitem)
                      {{ $billitem->product_name }}
                      @if (!$loop->last), @endif 
                  @endforeach
              
                  @if ($bill->billitems->count() > 2)
                      ,...
                  @endif
              </td>
              <td>
                @if ($bill->payment_status == 0)
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
      </table> --}}
@endsection

{{-- @endsection --}} {{-- Layout bị duplicate --}}
