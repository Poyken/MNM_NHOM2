@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Thêm phiếu mua hàng</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('coupon.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="code" class="col-form-label">Loại mã<span class="text-danger">*</span></label>
                    <input id="code" type="text" name="code" class="form-control" placeholder="Nhập loại mã ...">

                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type" class="col-form-label">Kiểu mã<span class="text-danger">*</span></label>
                    <select id="type" name="type" class="form-control">
                        <option value="fixed">Cố định</option>
                        <option value="percent">Phần trăm (%)</option>
                    </select>

                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="value" class="col-form-label">Giá trị<span class="text-danger">*</span></label>
                    <input id="value" type="number" name="value" class="form-control"
                        placeholder="Nhập giá trị phiếu ...">

                    @error('value')
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

                <div class="form-group">
                    <button type="reset" class="btn btn-secondary">Huỷ</button>
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
@endsection
