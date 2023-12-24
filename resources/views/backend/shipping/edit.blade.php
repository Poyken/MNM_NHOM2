@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Sửa vận đơn</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('shipping.update', $shipping->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="type" class="col-form-label">Kiểu<span class="text-danger">*</span></label>
                    <input id="type" type="text" name="type" class="form-control" value="{{ $shipping->type }}"
                        placeholder="Nhập kiểu đơn vận chuyển ...">

                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price" class="col-form-label">Giá tiền<span class="text-danger">*</span></label>
                    <input id="price" type="number" name="price" class="form-control"
                        value="{{ $shipping->price }}" placeholder="Nhập giá tiền ...">

                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
                    <select id="status" name="status" class="form-control">
                        <option value="active" {{ $shipping->status == 'active' ? 'selected' : '' }}>Có hiệu lực</option>
                        <option value="inactive" {{ $shipping->status == 'inactive' ? 'selected' : '' }}>Vô hiệu</option>
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
