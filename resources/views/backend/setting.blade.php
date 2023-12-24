@extends('backend.layouts.master')

@section('admin-title', 'Thông tin cửa hàng')

@section('main-content')
    @include('backend.layouts.notification')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Sửa thông tin cửa hàng</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('settings.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="lfm1" class="col-form-label">Logo<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm1" class="btn btn-primary" data-input="thumbnail1" data-preview="holder1">
                                Chọn
                            </a>
                        </span>
                        <input type="text" id="thumbnail1" name="logo" class="form-control"
                            value="{{ $data->logo }}">
                    </div>
                    <div id="holder1" style="margin-top: 15px; max-height: 100px;"></div>

                    @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputPhoto" class="col-form-label">Hình ảnh<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                Chọn
                            </a>
                        </span>
                        <input type="text" id="thumbnail" name="photo" class="form-control"
                            value="{{ $data->photo }}">
                    </div>
                    <div id="holder" style="margin-top: 15px; max-height: 100px;"></div>

                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">Mô tả<span class="text-danger">*</span></label>
                    <textarea id="description" name="description" class="form-control">{{ $data->description }}</textarea>

                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address" class="col-form-label">Địa chỉ<span class="text-danger">*</span></label>
                    <input type="text" id="address" name="address" class="form-control" required
                        value="{{ $data->address }}">

                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone" class="col-form-label">Điện thoại<span class="text-danger">*</span></label>
                    <input type="text" id="phone" name="phone" class="form-control" required
                        value="{{ $data->phone }}">

                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="col-form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control" required value="{{ $data->email }}">

                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-secondary">Huỷ</button>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        $('#lfm').filemanager('image');
        $('#lfm1').filemanager('image');
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Viết mô tả ...",
                tabsize: 2,
                height: 300
            });
        });
    </script>
@endpush
