@extends('frontend.layouts.master')

@section('title', 'Giỏ hàng')

@section('main-content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
    </nav>

    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th class="text-center text-uppercase">Tên sản phẩm</th>
                                <th class="text-center text-uppercase">Hình ảnh</th>
                                <th class="text-center text-uppercase">Đơn giá (VND)</th>
                                <th class="text-center text-uppercase">Số lượng</th>
                                <th class="text-center text-uppercase">Tổng (VND)</th>
                                <th class="text-center text-uppercase">Xoá</th>
                            </tr>
                        </thead>
                        <tbody id="cart_item_list">
                            <form action="{{ route('cart.update') }}" method="post">
                                @csrf
                                @if (Helper::getAllProductFromCart())
                                    @foreach (Helper::getAllProductFromCart() as $key => $cart)
                                        <tr>
                                            @php
                                                $photo = explode(',', $cart->product['photo']);
                                            @endphp
                                            <td class="product-des" data-title="Description">
                                                <p class="product-name">
                                                    <a href="{{ route('product-detail', $cart->product['slug']) }}"
                                                        target="_blank">
                                                        {{ $cart->product['title'] }}
                                                    </a>
                                                </p>
                                                <p class="product-des">{!! $cart['summary'] !!}</p>
                                            </td>
                                            <td class="image" data-title="No">
                                                <img src="{{ $photo[0] }}" alt="{{ $cart->product['title'] }}">
                                            </td>
                                            <td class="price" data-title="Price">
                                                <span>{{ number_format($cart['price'], 0) }}</span>
                                            </td>
                                            <td class="qty" data-title="Qty">
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            disabled="disabled" data-type="minus"
                                                            data-field="quant[{{ $key }}]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>

                                                    <input type="text" name="quant[{{ $key }}]"
                                                        class="input-number" data-min="1" data-max="100"
                                                        value="{{ $cart->quantity }}">
                                                    <input type="hidden" name="qty_id[]" value="{{ $cart->id }}">

                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            data-type="plus" data-field="quant[{{ $key }}]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-amount cart_single_price" data-title="Total">
                                                <span class="money">{{ number_format($cart['amount']) }}</span>
                                            </td>
                                            <td class="action" data-title="Remove">
                                                <a href="{{ route('cart-delete', $cart->id) }}">
                                                    <i class="ti-trash remove-icon"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="submit" class="btn btn-outline-secondary">Cập nhật</button>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-center">
                                            Giỏ hàng hiện đang trống.
                                            <a href="{{ route('product-grids') }}" style="color:blue;">
                                                Tiếp tục mua sắm.
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="{{ route('coupon-store') }}" method="post">
                                            @csrf
                                            <input name="code" placeholder="Nhập mã giảm giá ...">
                                            <button class="btn btn-outline-primary">Áp dụng</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6s col-12">
                                <div class="right">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{ Helper::totalCartPrice() }}">
                                            Tổng
                                            <span>
                                                <b>{{ number_format(Helper::totalCartPrice(), 0) }}</b> VND
                                            </span>
                                        </li>

                                        @if (session()->has('coupon'))
                                            <li class="coupon_price" data-price="{{ Session::get('coupon')['value'] }}">
                                                Tiết kiệm
                                                <span>
                                                    <b>{{ number_format(Session::get('coupon')['value'], 0) }}</b> VND
                                                </span>
                                            </li>
                                        @endif
                                        @php
                                            $total_amount = Helper::totalCartPrice();
                                            if (session()->has('coupon')) {
                                                $total_amount = $total_amount - Session::get('coupon')['value'];
                                            }
                                        @endphp
                                        @if (session()->has('coupon'))
                                            <li id="order_total_price" class="last">
                                                Tổng tiền phải trả
                                                <span>
                                                    <b>{{ number_format($total_amount, 0) }}</b> VND
                                                </span>
                                            </li>
                                        @else
                                            <li id="order_total_price" class="last">
                                                Tổng tiền phải trả
                                                <span>
                                                    <b>{{ number_format($total_amount, 0) }}</b> VND
                                                </span>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('checkout') }}" class="btn btn-success float-right text-white">
                                                Thanh toán
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.layouts.newsletter')
@endsection

@push('styles')
    <style>
        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }

        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }

        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }

        .form-select {
            height: 30px;
            width: 100%;
        }

        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }

        .list li {
            margin-bottom: 0 !important;
        }

        .list li:hover {
            background: #F7941D !important;
            color: white !important;
        }

        .form-select .nice-select::after {
            top: 14px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select.select2").select2();
        });
        $('select.nice-select').niceSelect();
    </script>
    <script>
        $(document).ready(function() {
            $('.shipping select[name=shipping]').change(function() {
                let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
                let subtotal = parseFloat($('.order_subtotal').data('price'));
                let coupon = parseFloat($('.coupon_price').data('price')) || 0;
                $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));
            });

        });
    </script>
@endpush
