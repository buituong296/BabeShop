@extends('layouts.app')

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
              <h1 class="h2 me-3 mb-0">Lịch sử mua hàng</h1>
            </div>
            {{-- <div class="col-md-8 col-xl-6">
              <div class="row row-cols-1 row-cols-sm-2 g-3 g-xxl-4">
                <div class="col">
                  <select class="form-select" data-select="{
                    &quot;placeholderValue&quot;: &quot;Select status&quot;,
                    &quot;choices&quot;: [
                      {
                        &quot;value&quot;: &quot;&quot;,
                        &quot;label&quot;: &quot;Select status&quot;,
                        &quot;placeholder&quot;: true
                      },
                      {
                        &quot;value&quot;: &quot;inprogress&quot;,
                        &quot;label&quot;: &quot;<div class=\&quot;d-flex align-items-center\&quot;><span class=\&quot;bg-info rounded-circle p-1 me-2\&quot;></span>In progress</div>&quot;
                      },
                      {
                        &quot;value&quot;: &quot;delivered&quot;,
                        &quot;label&quot;: &quot;<div class=\&quot;d-flex align-items-center\&quot;><span class=\&quot;bg-success rounded-circle p-1 me-2\&quot;></span>Delivered</div>&quot;
                      },
                      {
                        &quot;value&quot;: &quot;canceled&quot;,
                        &quot;label&quot;: &quot;<div class=\&quot;d-flex align-items-center\&quot;><span class=\&quot;bg-danger rounded-circle p-1 me-2\&quot;></span>Canceled</div>&quot;
                      },
                      {
                        &quot;value&quot;: &quot;delayed&quot;,
                        &quot;label&quot;: &quot;<div class=\&quot;d-flex align-items-center\&quot;><span class=\&quot;bg-warning rounded-circle p-1 me-2\&quot;></span>Delayed</div>&quot;
                      }
                    ]
                  }" data-select-template="true" aria-label="Status sorting"></select>
                </div>
                <div class="col">
                  <select class="form-select" data-select="{&quot;removeItemButton&quot;: false}" aria-label="Timeframe sorting">
                    <option value="all-time">For all time</option>
                    <option value="last-year">For last year</option>
                    <option value="last-3-months">For last 3 months</option>
                    <option value="last-30-days">For last 30 days</option>
                    <option value="last-week">For last week</option>
                  </select>
                </div>
              </div>
            </div> --}}
          </div>


          <!-- Sortable orders table -->
          <div data-filter-list="{&quot;listClass&quot;: &quot;orders-list&quot;, &quot;sortClass&quot;: &quot;orders-sort&quot;, &quot;valueNames&quot;: [&quot;date&quot;, &quot;total&quot;]}">
            <table class="table align-middle fs-sm text-nowrap">
              <thead>
                <tr>
                  <th scope="col" class="py-3 ps-0">
                    <span class="text-body fw-normal">Mã đơn hàng <span class="d-none d-md-inline"></span></span>
                  </th>
                  <th scope="col" class="py-3 d-none d-md-table-cell">
                    <button type="button" class="btn orders-sort fw-normal text-body p-0" data-sort="date">Ngày đặt</button>
                  </th>
                  <th scope="col" class="py-3 d-none d-md-table-cell">
                    <span class="text-body fw-normal">Trạng thái</span>
                  </th>
                  <th scope="col" class="py-3 d-none d-md-table-cell">
                    <button type="button" class="btn orders-sort fw-normal text-body p-0" data-sort="total">Tổng</button>
                  </th>
                  <th scope="col" class="py-3">&nbsp;</th>
                </tr>
              </thead>
              <tbody class="text-body-emphasis orders-list">

                <!-- Item -->
                @foreach ($bills as $bill)
                <tr>
                  <td class="fw-medium pt-2 pb-3 py-md-2 ps-0">
                    <a class="d-inline-block animate-underline text-body-emphasis text-decoration-none py-2" href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails" aria-label="Show order details">
                      <span class="animate-target">{{$bill->bill_code}}</span>
                    </a>
                    <ul class="list-unstyled fw-normal text-body m-0 d-md-none">
                      <li>{{ $bill->created_at->format('Y-m-d H:i:s') }}</li>
                      <li class="d-flex align-items-center">
                        <span class="bg-info rounded-circle p-1 me-2"></span>
                        In progress
                      </li>
                      <li class="fw-medium text-body-emphasis">$2,105.90</li>
                    </ul>
                  </td>
                  <td class="fw-medium py-3 d-none d-md-table-cell">
                    {{ $bill->created_at->format('d-m-Y') }}

                    <span class="date d-none">{{ $bill->created_at->format('d-m-Y') }}
                    </span>
                  </td>
                  <td class="fw-medium py-3 d-none d-md-table-cell">
                    <span class="d-flex align-items-center">
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
                    </span>
                  </td>
                  <td class="fw-medium py-3 d-none d-md-table-cell">
                    {{ number_format($bill->billitems->sum(function($billitem) {
                      return $billitem->variant_sale_price * $billitem->quantity;
                  })) }} VND
                  </td>
                  <td class="py-3 pe-0">
                    <span class="d-flex align-items-center justify-content-end position-relative gap-1 gap-sm-2 ms-n2 ms-sm-0">

                      @php
                      $itemsToShow = $bill->billitems->take(3);
                      @endphp
                      @foreach($itemsToShow as $billitem)
                      <span><img src="{{ asset('storage/' . $billitem->product_image) }}" width="64" alt=""></span>
                          
                          
                      @endforeach
                     
                      
                      {{-- <a class="btn btn-icon btn-ghost btn-secondary stretched-link border-0" href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails" aria-label="Show order details" data-order-id="{{ $bill->id }}">
                       
                      </a> --}}
                      <a href="{{route('bill-detail', ['id' => $bill->id] )}}"><button type="button" class="btn btn-icon btn-ghost btn-secondary stretched-link border-0"> <i class="ci-chevron-right fs-lg"></i></button></a>
   
                    </span>
                  </td>
                </tr>
                @endforeach      
              </tbody>
            </table>
          </div>


          <!-- Pagination -->
          <nav class="pt-3 pb-2 pb-sm-0 mt-2 mt-md-3" aria-label="Page navigation example">
            {{-- <ul class="pagination">
              <li class="page-item active" aria-current="page">
                <span class="page-link">
                  1
                  <span class="visually-hidden">(current)</span>
                </span>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">4</a>
              </li>
            </ul> --}}

            {{ $bills->links() }}

          </nav>
        </div>
      </div>
    </div>
  </div>
   
   {{-- Modal Info --}}
      {{-- <div class="offcanvas offcanvas-end pb-sm-2 px-sm-2" id="orderDetails" tabindex="-1" aria-labelledby="orderDetailsLabel" style="width: 500px">
     
        <!-- Header -->
        <div class="offcanvas-header align-items-start py-3 pt-lg-4">
          <div>
            <h4 class="offcanvas-title mb-1" id="orderDetailsLabel">{{$bill->bill_code}}</h4>
            <span class="d-flex align-items-center fs-sm fw-medium text-body-emphasis">
              <span class="bg-info rounded-circle p-1 me-2"></span>
              In progress
            </span>
          </div>
          <button type="button" class="btn-close mt-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
  
        <!-- Body -->
        <div class="offcanvas-body d-flex flex-column gap-4 pt-2 pb-3">
  
          <!-- Items -->
          <div class="d-flex flex-column gap-3">
  
            <!-- Item -->
            <div class="d-flex align-items-center">
              <a class="flex-shrink-0" href="shop-product-general-electronics.html">
                <img src="assets/img/shop/electronics/thumbs/01.png" width="110" alt="Smart Watch">
              </a>
              <div class="w-100 min-w-0 ps-2 ps-sm-3">
                <h5 class="d-flex animate-underline mb-2">
                  <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">Smart Watch Series 7, White</a>
                </h5>
                <div class="h6 mb-2">$429.00</div>
                <div class="fs-xs">Qty: 1</div>
              </div>
            </div>
  
            <!-- Item -->
            <div class="d-flex align-items-center">
              <a class="flex-shrink-0" href="shop-product-general-electronics.html">
                <img src="assets/img/shop/electronics/thumbs/08.png" width="110" alt="iPhone 14">
              </a>
              <div class="w-100 min-w-0 ps-2 ps-sm-3">
                <h5 class="d-flex animate-underline mb-2">
                  <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">Apple iPhone 14 128GB White</a>
                </h5>
                <div class="h6 mb-2">$899.00</div>
                <div class="fs-xs">Qty: 1</div>
              </div>
            </div>
  
            <!-- Item -->
            <div class="d-flex align-items-center">
              <a class="flex-shrink-0" href="shop-product-general-electronics.html">
                <img src="assets/img/shop/electronics/thumbs/09.png" width="110" alt="iPad Pro">
              </a>
              <div class="w-100 min-w-0 ps-2 ps-sm-3">
                <h5 class="d-flex animate-underline mb-2">
                  <a class="d-block fs-sm fw-medium text-truncate animate-target" href="shop-product-general-electronics.html">Tablet Apple iPad Pro M2</a>
                </h5>
                <div class="h6 mb-2">$989.00</div>
                <div class="fs-xs">Qty: 1</div>
              </div>
            </div>
          </div>
  
  
          <!-- Delivery + Payment info -->
          <div class="border-top pt-4">
            <h6>Delivery</h6>
            <ul class="list-unstyled fs-sm mb-4">
              <li class="d-flex justify-content-between mb-1">
                Estimated delivery date:
                <span class="text-body-emphasis fw-medium text-end ms-2">Feb 8, 2025 / 10:00 - 12:00</span>
              </li>
              <li class="d-flex justify-content-between mb-1">
                Shipping method:
                <span class="text-body-emphasis fw-medium text-end ms-2">Courier delivery</span>
              </li>
              <li class="d-flex justify-content-between">
                Shipping address:
                <span class="text-body-emphasis fw-medium text-end ms-2">567 Cherry Lane Apt B12,<br>Harrisburg</span>
              </li>
            </ul>
            <h6>Payment</h6>
            <ul class="list-unstyled fs-sm m-0">
              <li class="d-flex justify-content-between mb-1">
                Payment method:
                <span class="text-body-emphasis fw-medium text-end ms-2">Cash on delivery </span>
              </li>
              <li class="d-flex justify-content-between mb-1">
                Tax collected:
                <span class="text-body-emphasis fw-medium text-end ms-2">$12.40</span>
              </li>
              <li class="d-flex justify-content-between">
                Shipping:
                <span class="text-body-emphasis fw-medium text-end ms-2">$26.50</span>
              </li>
            </ul>
          </div>
  
          <!-- Total -->
          <div class="d-flex align-items-center justify-content-between fs-sm border-top pt-4">
            Estimated total:
            <span class="h5 text-end ms-2 mb-0">$2,105.90</span>
          </div>
        </div>
  
        <!-- Footer -->
        <div class="offcanvas-header">
          <a class="btn btn-lg btn-secondary w-100" href="#!">Change the delivery time</a>
        </div>
      </div> --}}
  
@endsection
