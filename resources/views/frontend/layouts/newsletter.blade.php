<hr>
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Miễn phí vận chuyển</h4>
                    <p>Cho đơn hàng từ {{ number_format('5000000') }} hoặc giao hàng dưới 20km</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Miễn phí đổi trả</h4>
                    <p>Trong vòng 30 ngày</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Thanh toán bảo mật</h4>
                    <p>Đảm bảo an toàn</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Giá tốt nhất</h4>
                    <p>Đảm bảo về giá</p>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="inner">
                        <h4>Tin tức</h4>
                        <p>
                            Đăng ký nhận bản tin của chúng tôi và nhận ngay ưu đãi giảm <span>10%</span> cho lần mua
                            hàng đầu tiên
                        </p>
                        <form action="{{ route('subscribe') }}" method="post" class="newsletter-inner">
                            @csrf
                            <input type="email" name="email"
                                placeholder="Vui lòng cho chúng tôi biết địa chỉ email của bạn ..." required>
                            <button class="btn" type="submit">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
