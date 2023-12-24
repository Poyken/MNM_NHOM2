@php
    $settings = DB::table('settings')->get();
@endphp
<header class="header shop">
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="top-left">
                        <ul class="list-main">
                            <li>
                                <i class="ti-headphone-alt"></i>
                                @foreach ($settings as $data)
                                    {{ $data->phone }}
                                @endforeach
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                @foreach ($settings as $data)
                                    {{ $data->email }}
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-12">
                    <div class="right-content">
                        <ul class="list-main">
                            <li>
                                <i class="ti-location-pin"></i>
                                <a href="{{ route('order.track') }}">Theo dõi đơn hàng</a>
                            </li>
                            @auth
                                @if (Auth::user()->role == 'admin')
                                    <li>
                                        <i class="ti-user"></i>
                                        <a href="{{ route('admin') }}" target="_blank">Quản trị</a>
                                    </li>
                                @else
                                    <li>
                                        <i class="ti-user"></i>
                                        <a href="{{ route('user') }}" target="_blank">Cá nhân</a>
                                    </li>
                                @endif
                                <li>
                                    <i class="ti-power-off"></i>
                                    <a href="{{ route('user.logout') }}">Đăng xuất</a>
                                </li>
                            @else
                                <li>
                                    <i class="ti-power-off"></i>
                                    <a href="{{ route('login.form') }}">Đăng nhập</a>
                                    &nbsp;|&nbsp;
                                    <a href="{{ route('register.form') }}">Đăng ký</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="logo">
                        @php
                            $settings = DB::table('settings')->get();
                        @endphp
                        <a href="{{ route('home') }}">
                            <img src="@foreach ($settings as $data) {{ $data->logo }} @endforeach" alt="Logo"
                                style="max-height: 50px;">
                        </a>
                    </div>
                    <div class="mobile-nav"></div>
                </div>

                <div class="col-lg-8 col-md-8 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form action="{{ route('product.search') }}" method="post">
                                @csrf
                                <input type="search" name="search" placeholder="Nhập sản phẩm cần tìm ...">
                                <button class="btnn" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-12">
                    <div class="right-bar">
                        <div class="sinlge-bar shopping">
                            <a href="{{ route('cart') }}" class="single-icon">
                                <i class="ti-bag"></i>
                                <span class="total-count">{{ Helper::cartCount() }}</span>
                            </a>
                            @auth
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>
                                            {{ count(Helper::getAllProductFromCart()) }} sản phẩm
                                        </span>
                                        <a href="{{ route('cart') }}">Xem giỏ hàng</a>
                                    </div>

                                    <ul class="shopping-list">
                                        @foreach (Helper::getAllProductFromCart() as $data)
                                            @php
                                                $photo = explode(',', $data->product['photo']);
                                            @endphp
                                            <li>
                                                <a href="{{ route('cart-delete', $data->id) }}" class="remove"
                                                    title="Remove this item">
                                                    <i class="fa fa-remove"></i>
                                                </a>
                                                <a class="cart-img" href="#">
                                                    <img src="{{ $photo[0] }}" alt="{{ $data->product['title'] }}">
                                                </a>
                                                <h4>
                                                    <a href="{{ route('product-detail', $data->product['slug']) }}"
                                                        target="_blank">
                                                        {{ $data->product['title'] }}
                                                    </a>
                                                </h4>
                                                <p class="quantity">
                                                    {{ $data->quantity }} x -
                                                    <span class="amount">
                                                        {{ number_format($data->price, 0) }} VND
                                                    </span>
                                                </p>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <div class="bottom">
                                        <div class="total">
                                            <span>Tổng cộng</span>
                                            <span class="total-amount">
                                                {{ number_format(Helper::totalCartPrice(), 0) }} VND
                                            </span>
                                        </div>
                                        <a href="{{ route('checkout') }}" class="btn animate">Thanh toán</a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{ Request::path() == 'home' ? 'active' : '' }}">
                                                <a href="{{ route('home') }}">Trang chủ</a>
                                            </li>
                                            <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}">
                                                <a href="{{ route('about-us') }}">Về chúng tôi</a>
                                            </li>
                                            <li class="@if (Request::path() == 'product-grids' || Request::path() == 'product-lists') active @endif">
                                                <a href="{{ route('product-grids') }}">Sản phẩm</a>
                                            </li>
                                            {{ Helper::getHeaderCategory() }}
                                            {{-- <li class="{{ Request::path() == 'blog' ? 'active' : '' }}">
                                                <a href="{{ route('blog') }}">Blog</a>
                                            </li> --}}
                                            <li class="{{ Request::path() == 'contact' ? 'active' : '' }}">
                                                <a href="{{ route('contact') }}">Liên hệ</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
