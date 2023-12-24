@extends('backend.layouts.master')

@section('admin-title', 'Thêm sản phẩm')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Thêm sản phẩm</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('product.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-form-label">Tên sản phẩm<span class="text-danger">*</span></label>
                    <input id="title" type="text" name="title" class="form-control"
                        placeholder="Nhập tên sản phẩm ...">

                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="thumbnail" class="col-form-label">Hình ảnh<span class="text-danger">*</span></label>
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
                    <label for="summary" class="col-form-label">Tóm tắt<span class="text-danger">*</span></label>
                    <textarea id="summary" name="summary" class="form-control"></textarea>

                    @error('summary')
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
                    <label for="cat_id">Danh mục<span class="text-danger">*</span></label>
                    <select id="cat_id" name="cat_id" class="form-control">
                        <option disabled>--Chọn danh mục--</option>
                        @foreach ($categories as $key => $cat_data)
                            <option value='{{ $cat_data->id }}'>{{ $cat_data->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="stock">Kho<span class="text-danger">*</span></label>
                    <input id="stock" type="number" name="stock" class="form-control" min="1"
                        placeholder="Nhập số lượng trong kho ...">

                    @error('stock')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price" class="col-form-label">Đơn giá<span class="text-danger">*</span></label>
                    <input id="price" type="number" name="price" class="form-control" placeholder="Nhập đơn giá ...">

                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="discount" class="col-form-label">Giảm giá (%)</label>
                    <input id="discount" type="number" name="discount" class="form-control" min="0" max="100"
                        placeholder="Nhập giảm giá ...">

                    @error('discount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand">Thương hiệu</label>
                    <select id="brand" name="brand_id" class="form-control">
                        <option disabled>--Chọn danh mục--</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active" selected>Có hiệu lực</option>
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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
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
                height: 300
            });
        });
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Viết mô tả chi tiết ...",
                tabsize: 2,
                height: 300
            });
        });
    </script>
    <script>
        $('#cat_id').change(function() {
            var cat_id = $(this).val();
            if (cat_id != null) {
                $.ajax({
                    url: "/admin/category/" + cat_id + "/child",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: cat_id
                    },
                    type: "POST",
                    success: function(response) {
                        if (typeof(response) != 'object') {
                            response = $.parseJSON(response)
                        }
                        var html_option = "<option value=''>--Chọn danh mục nhỏ--</option>"
                        if (response.status) {
                            var data = response.data;
                            if (response.data) {
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data, function(id, title) {
                                    html_option += "<option value='" + id + "'>" + title +
                                        "</option>"
                                });
                            } else {}
                        } else {
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            } else {}
        })
    </script>
@endpush
