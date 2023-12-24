@php
    $settings = DB::table('settings')->get();
@endphp
<footer class="footer clearfix">
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 col-md-6">
                    <div class="single-footer about d-flex mb-3">
                        <div class="logo mr-5">
                            <a href="{{ route('home') }}">
                                <img src="@foreach ($settings as $data){{ $data->logo }} @endforeach" alt="Logo" style="max-width: 100px;">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6">
                    <div class="single-footer links mb-3">
                        <ul>
                            <li><a href="#">Tình trạng đơn hàng</a></li>
                            <li><a href="#">Phương thức thanh toán</a></li>
                            <li><a href="#">Vận chuyển và giao hàng</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6">
                    <div class="single-footer links mb-3">
                        <ul>
                            <li><a href="#">Hướng dẫn</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Điều khoản sử dụng</a></li>
                        </ul>
                    </div>
                </div>

                @php
                    $settings = DB::table('settings')->get();
                @endphp
                <div class="col-12 col-lg-3 col-md-6">
                    <div class="single-footer social">
                        <div class="contact">
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    @foreach ($settings as $data)
                                        {{ $data->address }}
                                    @endforeach
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    @foreach ($settings as $data)
                                        {{ $data->email }}
                                    @endforeach
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    @foreach ($settings as $data)
                                        {{ $data->phone }}
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="inner">
                <div class="row align-items-end">
                    <div class="col-12 col-md-6">
                        <p>
                            Shop
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </p>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="right">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"
                                style="font-size: large;">
                                <i class="fa fa-facebook text-white" aria-hidden="true"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"
                                style="font-size: large;">
                                <i class="fa fa-instagram text-white" aria-hidden="true"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"
                                style="font-size: large;">
                                <i class="fa fa-twitter text-white" aria-hidden="true"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"
                                style="font-size: large;">
                                <i class="fa fa-pinterest text-white" aria-hidden="true"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"
                                style="font-size: large;">
                                <i class="fa fa-youtube-play text-white" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Jquery -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.0.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<!-- Color JS -->
<script src="{{ asset('frontend/js/colors.js') }}"></script>
<!-- Slicknav JS -->
<script src="{{ asset('frontend/js/slicknav.min.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('frontend/js/magnific-popup.js') }}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
<!-- Countdown JS -->
<script src="{{ asset('frontend/js/finalcountdown.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('frontend/js/nicesellect.js') }}"></script>
<!-- Flex Slider JS -->
<script src="{{ asset('frontend/js/flex-slider.js') }}"></script>
<!-- ScrollUp JS -->
<script src="{{ asset('frontend/js/scrollup.js') }}"></script>
<!-- Onepage Nav JS -->
<script src="{{ asset('frontend/js/onepage-nav.min.js') }}"></script>
{{-- Isotope --}}
<script src="{{ asset('frontend/js/isotope/isotope.pkgd.min.js') }}"></script>
<!-- Easing JS -->
<script src="{{ asset('frontend/js/easing.js') }}"></script>

<!-- Active JS -->
<script src="{{ asset('frontend/js/active.js') }}"></script>

@stack('scripts')
<script>
    setTimeout(function() {
        $('.alert').slideUp();
    }, 5000);
    $(function() {
        // Multi Level dropdowns
        $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).siblings().toggleClass("show");
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass("show");
            });
        });
    });
</script>
