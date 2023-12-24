@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-primary text-uppercase font-weight-bold">Sửa thương hiệu</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('brand.update', $brand->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="title" class="col-form-label">Tên thương hiệu<span class="text-danger">*</span></label>
                    <input id="title" type="text" name="title" class="form-control" value="{{ $brand->title }}"
                        placeholder="Nhập tên thương hiệu ...">

                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
                    <select id="status" name="status" class="form-control">
                        <option value="active" {{ $brand->status == 'active' ? 'selected' : '' }}>Có hiệu lực</option>
                        <option value="inactive" {{ $brand->status == 'inactive' ? 'selected' : '' }}>Vô hiệu lực</option>
                    </select>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-secondary" type="reset">Huỷ</button>
                    <button class="btn btn-success" type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
