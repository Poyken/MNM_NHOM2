@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Sửa bài viết</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('post.update', $post->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="title" class="col-form-label">Tên bài viết<span class="text-danger">*</span></label>
                    <input id="title" type="text" name="title" class="form-control" value="{{ $post->title }}"
                        placeholder="Nhập tiêu đề bài viết ...">

                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quote" class="col-form-label">Trích dẫn</label>
                    <textarea id="quote" name="quote" class="form-control">{{ $post->quote }}</textarea>

                    @error('quote')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="summary" class="col-form-label">Tóm tắt<span class="text-danger">*</span></label>
                    <textarea id="summary" class="form-control" name="summary">{{ $post->summary }}</textarea>

                    @error('summary')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">Mô tả</label>
                    <textarea id="description" name="description" class="form-control">{{ $post->description }}</textarea>

                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="post_cat_id">Danh mục bài viết<span class="text-danger">*</span></label>
                    <select id="post_cat_id" name="post_cat_id" class="form-control">
                        <option value="">--Chọn danh mục bài viết--</option>
                        @foreach ($categories as $key => $data)
                            <option value='{{ $data->id }}' {{ $data->id == $post->post_cat_id ? 'selected' : '' }}>
                                {{ $data->title }}</option>
                        @endforeach
                    </select>
                </div>

                @php
                    $post_tags = explode(',', $post->tags);
                @endphp

                <div class="form-group">
                    <label for="tags">Thẻ</label>
                    <select name="tags[]" multiple data-live-search="true" class="form-control selectpicker">
                        <option value="">--Chọn thẻ--</option>
                        @foreach ($tags as $key => $data)
                            <option value="{{ $data->title }}"
                                {{ in_array("$data->title", $post_tags) ? 'selected' : '' }}>{{ $data->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="added_by">Tác giả</label>
                    <select id="added_by" name="added_by" class="form-control">
                        <option value="">--Chọn tác giả--</option>
                        @foreach ($users as $key => $data)
                            <option value='{{ $data->id }}' {{ $post->added_by == $data->id ? 'selected' : '' }}>
                                {{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="thumbnail" class="col-form-label">Hình ảnh<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                Chọn
                            </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo"
                            value="{{ $post->photo }}">
                    </div>
                    <div id="holder" style="margin-top: 15px; max-height: 100px;"></div>

                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $post->status == 'active' ? 'selected' : '' }}>Có hiệu lực</option>
                        <option value="inactive" {{ $post->status == 'inactive' ? 'selected' : '' }}>Vô hiệu</option>
                    </select>

                    @error('status')
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

        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Viết mô tả ngắn ...",
                tabsize: 2,
                height: 150
            });
        });

        $(document).ready(function() {
            $('#quote').summernote({
                placeholder: "Viết trích dẫn ...",
                tabsize: 2,
                height: 100
            });
        });
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Viết mô tả chi tiết ...",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush
