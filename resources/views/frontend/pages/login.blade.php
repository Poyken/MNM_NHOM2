@extends('frontend.layouts.master')

@section('title', 'Đăng nhập')

@section('main-content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
        </ol>
    </nav>

    <section class="shop login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>Đăng nhập</h2>
                        <form action="{{ route('login.submit') }}" method="post" class="form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email<span class="text-danger">*</span></label>
                                        <input type="email" id="email" name="email" required>

                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Mật khẩu<span class="text-danger">*</span></label>
                                        <input type="password" id="password" name="password" required>

                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <div class="form-group login-btn">
                                                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <input type="checkbox" id="remember" name="remember">
                                                <label for="remember">Ghi nhớ đăng nhập</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-12">
                                            <div class="text-center">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.reset') }}" class="text-danger lost-pass"
                                                        style="color: white; font-size: 100%;">
                                                        Quên mật khẩu?
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-12">
                                            <div class="float-right">
                                                Chưa có tài khoản?
                                                <a href="{{ route('register.form') }}" class="btn btn-outline-secondary">
                                                    Đăng ký
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>r
    </section>
    @include('frontend.layouts.newsletter')
@endsection
