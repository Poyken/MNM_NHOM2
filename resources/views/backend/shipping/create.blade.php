@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Thêm vận đơn</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('shipping.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="type" class="col-form-label">Kiểu<span class="text-danger">*</span></label>
                    <input id="type" type="text" name="type" class="form-control"
                        placeholder="Nhập kiểu đơn vận chuyển ...">

                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price" class="col-form-label">Price <span class="text-danger">*</span></label>
                    <input id="price" type="number" name="price" class="form-control"
                        placeholder="Nhập giá tiền ...">

                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
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
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush
