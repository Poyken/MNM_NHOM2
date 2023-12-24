@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Sửa danh mục bài viết</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('post-category.update', $postCategory->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="title" class="col-form-label">Tên danh mục bài viết</label>
                    <input id="title" type="text" name="title" class="form-control"
                        value="{{ $postCategory->title }}" placeholder="Nhập tên danh mục bài viết ...">

                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Tình trạng</label>
                    <select id="status" name="status" class="form-control">
                        <option value="active" {{ $postCategory->status == 'active' ? 'selected' : '' }}>Có hiệu lực
                        </option>
                        <option value="inactive" {{ $postCategory->status == 'inactive' ? 'selected' : '' }}>Vô hiệu
                        </option>
                    </select>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-secondary">Huỷ</button>
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
