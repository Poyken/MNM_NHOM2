<nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mx-2">
        <i class="fa fa-bars"></i>
    </button>
    <a href="{{ route('storage.link') }}" class="btn btn-outline-warning btn-sm mx-2">
        Liên kết kho lưu trữ
    </a>
    <a href="{{ route('cache.clear') }}" class="btn btn-outline-danger btn-sm mx-2">
        Xóa bộ nhớ đệm
    </a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
            <a href="{{ route('home') }}" class="nav-link dropdown-toggle" role="button" target="_blank"
                data-toggle="tooltip" data-placement="bottom" title="Trang chủ">
                <i class="fas fa-home"></i>
                Quay lại trang chủ
            </a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            @include('backend.notification.show')
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            @include('backend.message.message')
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow mx-1">
            <a href="#" id="userDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth()->user()->name }}</span>
                @if (Auth()->user()->photo)
                    <img class="img-profile rounded-circle" src="{{ Auth()->user()->photo }}">
                @else
                    <img class="img-profile rounded-circle" src="{{ asset('backend/img/avatar.png') }}">
                @endif
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a href="{{ route('admin-profile') }}" class="dropdown-item">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-500"></i>
                    Thông tin cá nhân
                </a>
                <a href="{{ route('change.password.form') }}" class="dropdown-item">
                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-500"></i>
                    Đổi mật khẩu
                </a>
                <a href="{{ route('settings') }}" class="dropdown-item">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-500"></i>
                    Cài đặt
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}"class="dropdown-item"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-500"></i>
                    Đăng xuất
                </a>

                <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
