@extends('layouts.app')

@section('content')
<main class="content-wrapper">

    <!-- Hero -->
    
    <!-- FAQ (Accordion) -->
    <section class="container py-5 mb-1 mb-sm-2 mb-md-3 mb-lg-4 mb-xl-5">
      <div class="row pt-xl-2">
        <div class="col-md-4 col-xl-3 mb-4 mb-md-0" style="margin-top: -120px">
          <div class="sticky-md-top text-center text-md-start pe-md-4 pe-lg-5 pe-xl-0" style="padding-top: 120px;">
            <h2>Câu hỏi thường gặp</h2>
            <p class="pb-2 pb-md-3">Vẫn còn thắc mắc chưa được giải đáp?</p>
            <a class="btn btn-lg btn-primary" href="{{route('contact')}}">Liện hệ cho chúng tôi</a>
          </div>
        </div>
        <div class="col-md-8 offset-xl-1">

          <!-- Accordion of questions -->
          <div class="accordion" id="faq">

            <!-- Question -->
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeading-1">
                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-1" aria-expanded="false" aria-controls="faqCollapse-1">
                  <span class="me-2">Thời gian giao hàng sẽ mất bao lâu?</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="faqCollapse-1" aria-labelledby="faqHeading-1" data-bs-parent="#faq">
                <div class="accordion-body">Thời gian giao hàng phụ thuộc vào vị trí của bạn và phương thức vận chuyển đã chọn. Thông thường, giao hàng tiêu chuẩn của chúng tôi mất tối đa 5 ngày, trong khi giao hàng nhanh đảm bảo đơn hàng của bạn đến trong vòng 1 ngày. Xin lưu ý rằng thời gian này có thể thay đổi do các yếu tố không lường trước, nhưng chúng tôi sẽ cố gắng đáp ứng dự kiến này.</div>
              </div>
            </div>
    
            <!-- Câu hỏi -->
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeading-2">
                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-2" aria-expanded="false" aria-controls="faqCollapse-2">
                  <span class="me-2">Bạn chấp nhận các phương thức thanh toán nào?</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="faqCollapse-2" aria-labelledby="faqHeading-2" data-bs-parent="#faq">
                <div class="accordion-body">Chúng tôi cung cấp nhiều tùy chọn thanh toán an toàn để bạn có sự linh hoạt và tiện lợi. Các phương thức được chấp nhận bao gồm thẻ tín dụng/thẻ ghi nợ chính, PayPal và các cổng thanh toán trực tuyến an toàn khác. Bạn có thể xem danh sách đầy đủ các phương thức thanh toán được chấp nhận trong quá trình thanh toán.</div>
              </div>
            </div>
    
            <!-- Câu hỏi -->
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeading-3">
                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-3" aria-expanded="false" aria-controls="faqCollapse-3">
                  <span class="me-2">Bạn có giao hàng quốc tế không?</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="faqCollapse-3" aria-labelledby="faqHeading-3" data-bs-parent="#faq">
                <div class="accordion-body">Có, chúng tôi tự hào cung cấp dịch vụ giao hàng quốc tế để phục vụ khách hàng toàn cầu. Chi phí và thời gian giao hàng sẽ được tính toán tự động tại bước thanh toán dựa trên điểm đến của bạn. Xin lưu ý rằng các loại thuế hải quan hoặc phí thuế tại quốc gia của bạn sẽ do khách hàng chịu trách nhiệm.</div>
              </div>
            </div>
    
            <!-- Câu hỏi -->
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeading-4">
                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-4" aria-expanded="false" aria-controls="faqCollapse-4">
                  <span class="me-2">Tôi có cần tài khoản để đặt hàng không?</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="faqCollapse-4" aria-labelledby="faqHeading-4" data-bs-parent="#faq">
                <div class="accordion-body">Bạn có thể đặt hàng dưới dạng khách, tuy nhiên việc tạo tài khoản sẽ mang lại nhiều lợi ích hơn. Với tài khoản, bạn có thể dễ dàng theo dõi đơn hàng, quản lý các tùy chọn và tận hưởng quy trình thanh toán nhanh hơn cho những lần mua sắm tiếp theo. Ngoài ra, bạn sẽ nhận được các đề xuất cá nhân hóa và ưu đãi độc quyền.</div>
              </div>
            </div>
    
            <!-- Câu hỏi -->
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeading-5">
                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-5" aria-expanded="false" aria-controls="faqCollapse-5">
                  <span class="me-2">Làm thế nào để theo dõi đơn hàng của tôi?</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="faqCollapse-5" aria-labelledby="faqHeading-5" data-bs-parent="#faq">
                <div class="accordion-body">Khi đơn hàng của bạn được gửi đi, bạn sẽ nhận được email xác nhận chứa số theo dõi độc quyền. Bạn có thể sử dụng số này trên trang web của chúng tôi để theo dõi trạng thái vận chuyển theo thời gian thực. Ngoài ra, nếu bạn đăng nhập vào tài khoản của mình, bạn sẽ có quyền truy cập vào lịch sử đơn hàng chi tiết, bao gồm thông tin theo dõi.</div>
              </div>
            </div>

            <!-- Question -->
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeading-6">
                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-6" aria-expanded="false" aria-controls="faqCollapse-6">
                  <span class="me-2">Điều kiện hoàn tiền sản phẩm là gì?</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="faqCollapse-6" aria-labelledby="faqHeading-6" data-bs-parent="#faq">
                <div class="accordion-body">Chính sách hoàn tiền của chúng tôi được thiết kế để đảm bảo sự hài lòng của khách hàng. Bạn có thể xem chi tiết trong [trang chính sách hoàn tiền](insert link). Nói một cách đơn giản, chúng tôi chấp nhận hoàn trả sản phẩm trong vòng [nhập số ngày] kể từ khi nhận hàng, với điều kiện sản phẩm phải còn nguyên trạng, bao gồm cả tem và bao bì. Hoàn tiền sẽ được xử lý nhanh chóng sau khi sản phẩm hoàn trả được kiểm tra và phê duyệt.</div>
              </div>
            </div>
            
            <!-- Câu hỏi -->
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeading-7">
                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-7" aria-expanded="false" aria-controls="faqCollapse-7">
                  <span class="me-2">Tôi có thể tìm bảng kích thước ở đâu?</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="faqCollapse-7" aria-labelledby="faqHeading-7" data-bs-parent="#faq">
                <div class="accordion-body">Bảng kích thước chi tiết của chúng tôi có sẵn trên từng trang sản phẩm để hỗ trợ bạn lựa chọn kích thước phù hợp. Ngoài ra, bạn có thể tìm bảng kích thước trong menu chính dưới mục "Bảng Kích Thước". Chúng tôi khuyến khích bạn tham khảo tài nguyên này để đảm bảo sản phẩm bạn chọn vừa với kích thước mong muốn.</div>
              </div>
            </div>
            
            <!-- Câu hỏi -->
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeading-8">
                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-8" aria-expanded="false" aria-controls="faqCollapse-8">
                  <span class="me-2">Tôi có cần tạo tài khoản để mua sắm không?</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="faqCollapse-8" aria-labelledby="faqHeading-8" data-bs-parent="#faq">
                <div class="accordion-body">Mua hàng với tư cách khách không cần tài khoản luôn khả dụng để thuận tiện cho bạn, tuy nhiên tạo tài khoản sẽ nâng cao trải nghiệm mua sắm của bạn. Với tài khoản, bạn có thể dễ dàng theo dõi tình trạng đơn hàng, lưu nhiều địa chỉ giao hàng, và tận hưởng quy trình thanh toán nhanh hơn. Hơn nữa, người dùng có tài khoản sẽ nhận được ưu đãi độc quyền và truy cập sớm vào các chương trình khuyến mãi. Đăng ký nhanh chóng và dễ dàng!</div>
              </div>
            </div>
            
            <!-- Câu hỏi -->
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeading-9">
                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-9" aria-expanded="false" aria-controls="faqCollapse-9">
                  <span class="me-2">Có giá trị tối thiểu nào để được miễn phí vận chuyển không?</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="faqCollapse-9" aria-labelledby="faqHeading-9" data-bs-parent="#faq">
                <div class="accordion-body">Có, chúng tôi cung cấp miễn phí vận chuyển cho các đơn hàng trên $250. Đối với các đơn hàng dưới mức này, phí vận chuyển tiêu chuẩn sẽ được hiển thị trong quá trình thanh toán.</div>
              </div>
            </div>
            
            <!-- Câu hỏi -->
            <div class="accordion-item">
              <h3 class="accordion-header" id="faqHeading-10">
                <button type="button" class="accordion-button hover-effect-underline collapsed" data-bs-toggle="collapse" data-bs-target="#faqCollapse-10" aria-expanded="false" aria-controls="faqCollapse-10">
                  <span class="me-2">Tôi có thể chỉnh sửa hoặc hủy đơn hàng sau khi đã đặt không?</span>
                </button>
              </h3>
              <div class="accordion-collapse collapse" id="faqCollapse-10" aria-labelledby="faqHeading-10" data-bs-parent="#faq">
                <div class="accordion-body">Sau khi đơn hàng được xác nhận, hệ thống của chúng tôi sẽ xử lý ngay lập tức để đảm bảo giao hàng kịp thời. Do đó, việc chỉnh sửa hoặc hủy đơn hàng trở nên khó khăn sau thời điểm này. Tuy nhiên, vui lòng liên hệ bộ phận hỗ trợ khách hàng của chúng tôi càng sớm càng tốt, và chúng tôi sẽ cố gắng hết sức để hỗ trợ bạn dựa trên tình trạng đơn hàng.</div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection