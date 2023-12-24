@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-primary text-uppercase font-weight-bold">Thêm thương hiệu</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('brand.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-form-label">Tên thương hiệu<span class="text-danger">*</span></label>
                    <input id="title" type="text" name="title" class="form-control"
                        placeholder="Nhập tên thương hiệu ...">

                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
                    <select id="status" name="status" class="form-control">
                        <option value="active">Có hiệu lực</option>
                        <option value="inactive">Vô hiệu lực</option>
                    </select>

                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-secondary">Huỷ</button>
                    <button type="submit" class="btn btn-success">Xác nhận thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
