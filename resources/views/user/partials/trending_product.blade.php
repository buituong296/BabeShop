<section class="container pt-5 mt-2 mt-sm-3 mt-lg-4">

    <!-- Tiêu đề -->
    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 pb-md-4">
        <h2 class="h3 mb-0">Sản phẩm thịnh hành</h2>
        <div class="nav ms-3">
            <a class="nav-link animate-underline px-0 py-2" href="shop-catalog-electronics.html">
                <span class="animate-target">Xem tất cả</span>
                <i class="ci-chevron-right fs-base ms-1"></i>
            </a>
        </div>
    </div>

    <!-- Lưới sản phẩm -->
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 pt-4">

        <!-- Sản phẩm -->
        @foreach ($products_3 as $product)
        <div class="col">
          <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
              <div class="position-relative">
                  <div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
                      <div class="d-flex flex-column gap-2">
                          <button type="button"
                              class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex"
                              aria-label="Thêm vào danh sách yêu thích">
                              <i class="ci-heart fs-base animate-target"></i>
                          </button>
                          <button type="button"
                              class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex"
                              aria-label="So sánh">
                              <i class="ci-refresh-cw fs-base animate-target"></i>
                          </button>
                      </div>
                  </div>
                  <div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
                      <button type="button" class="btn btn-icon btn-sm btn-secondary bg-body"
                          data-bs-toggle="dropdown" aria-expanded="false" aria-label="Thao tác khác">
                          <i class="ci-more-vertical fs-lg"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end fs-xs p-2" style="min-width: auto">
                          <li>
                              <a class="dropdown-item" href="#!">
                                  <i class="ci-heart fs-sm ms-n1 me-2"></i>
                                  Thêm vào yêu thích
                              </a>
                          </li>
                          <li>
                              <a class="dropdown-item" href="#!">
                                  <i class="ci-refresh-cw fs-sm ms-n1 me-2"></i>
                                  So sánh
                              </a>
                          </li>
                      </ul>
                  </div>
                  <a class="d-block rounded-top overflow-hidden p-3 p-sm-4"
                      href="{{ route('productdetail', $product->id) }}">
                      {{-- DISCOUNT --}}
                      {{-- <span
                          class="badge bg-danger position-absolute top-0 start-0 mt-2 ms-2 mt-lg-3 ms-lg-3">-21%</span> --}}
                      <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                          <img src="{{ asset('storage/' . $product->image) }}" alt="Kính thực tế ảo VR">
                      </div>
                  </a>
              </div>
              <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
                  <div class="d-flex align-items-center gap-2 mb-2">
                      <div class="d-flex gap-1 fs-xs">
                          <i class="ci-star-filled text-warning"></i>
                          <i class="ci-star-filled text-warning"></i>
                          <i class="ci-star-filled text-warning"></i>
                          <i class="ci-star-filled text-warning"></i>
                          <i class="ci-star text-body-tertiary opacity-75"></i>
                      </div>
                      <span class="text-body-tertiary fs-xs">(123)</span>
                  </div>
                  <h3 class="pb-1 mb-2">
                      <a class="d-block fs-sm fw-medium text-truncate"
                          href="{{ route('productdetail', $product->id) }}">
                          <span class="animate-target">{{$product->name}}</span>
                      </a>
                  </h3>
                  <div class="d-flex align-items-center justify-content-between">
                      <div class="h5 lh-1 mb-0">{{$product->price}} VND 
                        {{-- <del class="text-body-tertiary fs-sm fw-normal">430.00 USD</del> --}}
                      </div>
                      <button type="button"
                          class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2"
                          aria-label="Thêm vào giỏ hàng">
                          <i class="ci-shopping-cart fs-base animate-target"></i>
                      </button>
                  </div>
              </div>
              <div
                  class="product-card-details position-absolute top-100 start-0 w-100 bg-body rounded-bottom shadow mt-n2 p-3 pt-1">
                  <span class="position-absolute top-0 start-0 w-100 bg-body mt-n2 py-2"></span>
                  <ul class="list-unstyled d-flex flex-column gap-2 m-0">
                      <li class="d-flex align-items-center">
                          <span class="fs-xs">Màn hình:</span>
                          <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                          <span class="text-dark-emphasis fs-xs fw-medium text-end">OLED 1440x1600</span>
                      </li>
                      <li class="d-flex align-items-center">
                          <span class="fs-xs">Đồ họa:</span>
                          <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                          <span class="text-dark-emphasis fs-xs fw-medium text-end">Adreno 540</span>
                      </li>
                      <li class="d-flex align-items-center">
                          <span class="fs-xs">Âm thanh:</span>
                          <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                          <span class="text-dark-emphasis fs-xs fw-medium text-end">2x3.5mm jack</span>
                      </li>
                      <li class="d-flex align-items-center">
                          <span class="fs-xs">Đầu vào:</span>
                          <span class="d-block flex-grow-1 border-bottom border-dashed px-1 mt-2 mx-2"></span>
                          <span class="text-dark-emphasis fs-xs fw-medium text-end">4 camera tích hợp</span>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
        @endforeach
        

    </div>
</section>