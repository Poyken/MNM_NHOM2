@extends('backend.layouts.master')

@section('admin-title', 'Thông tin cá nhân')

@section('main-content')
    <div class="card shadow">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Thông tin cá nhân</h5>
        </div>

        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            @if ($profile->photo)
                                <img src="{{ $profile->photo }}" alt="Ảnh đại diện"
                                    class="card-img-top img-fluid roundend-circle mt-4"
                                    style="border-radius: 50%; height: 80px; width: 80px; margin: auto;">
                            @else
                                <img src="{{ asset('backend/img/avatar.png') }}" alt="Ảnh đại diện"
                                    class="card-img-top img-fluid roundend-circle mt-4"
                                    style="border-radius: 50%; height: 80px; width: 80px; margin: auto;">
                            @endif
                        </div>

                        <div class="card-body mt-4 ml-2">
                            <h5 class="card-title text-left"><small><i class="fas fa-user"></i> {{ $profile->name }}</small>
                            </h5>
                            <p class="card-text text-left"><small><i class="fas fa-envelope"></i>
                                    {{ $profile->email }}</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="{{ route('profile-update', $profile->id) }}" method="pót" class="border px-4 pt-2 pb-3">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-form-label">Họ và tên</label>
                            <input type="text" id="title" name="name" class="form-control"
                                value="{{ $profile->name }}">

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-form-label">Email</label>
                            <input id="inputEmail" disabled type="email" name="email" placeholder="Enter email"
                                value="{{ $profile->email }}" class="form-control">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputPhoto" class="col-form-label">Ảnh đại diện</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        Chọn
                                    </a>
                                </span>
                                <input type="text" id="thumbnail" name="photo" class="form-control"
                                    value="{{ $profile->photo }}">
                            </div>

                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-form-label">Vai trò</label>
                            <select name="role" class="form-control" disabled>
                                <option value="">--Select Role--</option>
                                <option value="admin" {{ $profile->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $profile->role == 'user' ? 'selected' : '' }}>User</option>
                            </select>

                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="reset" class="btn btn-secondary">Huỷ</button>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .image {
        background: url('{{ asset('backend/img/background.jpg') }}');
        height: 150px;
        background-position: center;
        background-attachment: cover;
        position: relative;
    }

    .image img {
        position: absolute;
        top: 55%;
        left: 35%;
        margin-top: 30%;
    }

    i {
        font-size: 14px;
        padding-right: 8px;
    }
</style>

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endpush
