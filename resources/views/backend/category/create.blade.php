@extends('backend.layouts.master')

@section('admin-title', 'Thêm danh mục sản phẩm')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Thêm danh mục sản phẩm</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-form-label">Tên danh mục<span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" class="form-control"
                        placeholder="Nhập tên danh mục sản phẩm ...">

                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">Mô tả</label>
                    <textarea id="description" name="description" class="form-control"></textarea>

                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="thumbnail" class="col-form-label">Hình ảnh</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" class="btn btn-primary" data-input="thumbnail" data-preview="holder">
                                Chọn
                            </a>
                        </span>
                        <input id="thumbnail" type="text" name="photo" class="form-control">
                    </div>
                    <div id="holder" style="margin-top: 15px; max-height: 100px;"></div>

                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
                    <select id="status" name="status" class="form-control">
                        <option value="active">Có hiệu lực</option>
                        <option value="inactive">Vô hiệu</option>
                    </select>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-secondary">Huỷ</button>
                    <button type="submit" class="btn btn-success">Xác nhận thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
@endpush

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Viết mô tả ...",
                tabsize: 2,
                height: 120
            });
        });
    </script>
@endpush
