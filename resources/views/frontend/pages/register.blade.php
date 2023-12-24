@extends('frontend.layouts.master')

@section('title', 'Đăng ký')

@section('main-content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
        </ol>
    </nav>

    <section class="shop login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>Đăng ký</h2>
                        <form action="{{ route('register.submit') }}" method="post" class="form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">
                                            Họ và tên
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" id="name" name="name" required>

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">
                                            Email
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" id="email" name="email" required>

                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">
                                            Mật khẩu
                                            <span class="text-danger">*</span></label>
                                        <input type="password" id="password" name="password" required>

                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password_confirmation">
                                            Xác nhận mật khẩu
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            required>

                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                                    </div>

                                    <div class="float-right">
                                        Đã có tài khoản?
                                        <a href="{{ route('login.form') }}" class="btn btn-outline-secondary">Đăng nhập</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
