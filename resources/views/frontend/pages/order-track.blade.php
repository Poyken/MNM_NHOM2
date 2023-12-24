@extends('frontend.layouts.master')

@section('title', 'Theo dõi đơn hàng')

@section('main-content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Theo dõi đơn hàng</li>
        </ol>
    </nav>

    <section class="tracking_box_area section">
        <div class="container">
            <div class="tracking_box_inner">
                <p>
                    Để theo dõi đơn hàng của bạn, vui lòng nhập mã đơn hàng của bạn vào ô bên dưới và nhấn nút "Theo
                    dõi".<br>Mã đơn hàng được ghi trên hoá đơn của bạn và trong email xác nhận mà bạn đã nhận được.
                </p>
                <form action="{{ route('product.track.order') }}" method="post" class="row tracking_form my-4"
                    novalidate="novalidate">
                    @csrf
                    <div class="col-md-8 form-group">
                        <input type="text" class="form-control p-2" name="order_number"
                            placeholder="Nhập mã đơn hàng của bạn ở đây ...">
                    </div>

                    <div class="col-md-8 form-group">
                        <button type="submit" value="submit" class="btn btn-primary submit_btn">Theo dõi đơn hàng</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('frontend.layouts.newsletter')
@endsection
