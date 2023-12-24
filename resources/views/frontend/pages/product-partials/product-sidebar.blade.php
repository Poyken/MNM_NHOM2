<div class="shop-sidebar">
    <div class="single-widget category">
        <h3 class="title">Danh mục sản phẩm</h3>
        <ul class="categor-list">
            @php
                $menu = App\Models\Category::getAllCategory();
            @endphp
            @if ($menu)
                @foreach ($menu as $cat_info)
                    <li>
                        <a href="{{ route('product-cat', $cat_info->slug) }}">
                            {{ $cat_info->title }}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

    <div class="single-widget range">
        <h3 class="title">Khoảng giá</h3>
        <div class="price-filter">
            <div class="price-filter-inner">
                @php
                    $max = DB::table('products')->max('price');
                @endphp
                <div id="slider-range" data-min="0" data-max="{{ $max }}"></div>
                <div class="product_filter">
                    <button type="submit" class="filter_button">Lọc</button>
                    <div class="label-input">
                        <span>Phạm vi:</span>
                        <input id="amount" type="text" readonly />
                        <input id="price_range" type="hidden" name="price_range"
                            value="@if (!empty($_GET['price'])) {{ $_GET['price'] }} @endif" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-widget category">
        <h3 class="title">Thương hiệu</h3>
        <ul class="categor-list">
            @php
                $brands = DB::table('brands')
                    ->orderBy('title', 'ASC')
                    ->where('status', 'active')
                    ->get();
            @endphp
            @foreach ($brands as $brand)
                <li>
                    <a href="{{ route('product-brand', $brand->slug) }}">
                        {{ $brand->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
