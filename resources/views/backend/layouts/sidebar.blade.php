<ul class="navbar-nav bg-white sidebar accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
        <i class="fas fa-fw fa-power-off"></i>
        <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
    </a>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Banner</div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('banner.index') }}">
            <i class="fas fa-image"></i>
            <span>Banners</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Cửa hàng</div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-sitemap"></i>
            <span>Danh mục sản phẩm</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('product.index') }}">
            <i class="fas fa-cubes"></i>
            <span>Sản phẩm</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('brand.index') }}">
            <i class="fas fa-table"></i>
            <span>Thương hiệu</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('shipping.index') }}">
            <i class="fas fa-truck"></i>
            <span>Vận chuyển</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('order.index') }}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Đơn hàng</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('review.index') }}">
            <i class="fas fa-comments"></i>
            <span>Đánh giá</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Bài viết</div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('post.index') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Bài viết</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('post-category.index') }}">
            <i class="fas fa-sitemap fa-folder"></i>
            <span>Danh mục bài viết</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('post-tag.index') }}">
            <i class="fas fa-tags fa-folder"></i>
            <span>Thẻ</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('comment.index') }}">
            <i class="fas fa-comments fa-chart-area"></i>
            <span>Bình luận</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Cài đặt chung</div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('coupon.index') }}">
            <i class="fas fa-table"></i>
            <span>Phiếu mua hàng</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-users"></i>
            <span>Quản lý người dùng</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('settings') }}">
            <i class="fas fa-cog"></i>
            <span>Thông tin cửa hàng</span>
        </a>
    </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
