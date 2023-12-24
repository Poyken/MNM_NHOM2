@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Sửa đánh giá</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('review.update', $review->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">Đăng bởi</label>
                    <input type="text" class="form-control" value="{{ $review->user_info->name }}" disabled>
                </div>

                <div class="form-group">
                    <label for="review">Nội dung</label>
                    <textarea id="review" name="review" rows="10" class="form-control" disabled>{{ $review->review }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Tình trạng</label>
                    <select id="status" name="status" class="form-control">
                        <option value="">--Chọn tình trạng--</option>
                        <option value="active" {{ $review->status == 'active' ? 'selected' : '' }}>Có hiệu lực</option>
                        <option value="inactive" {{ $review->status == 'inactive' ? 'selected' : '' }}>Vô hiệu</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-secondary">Huỷ</button>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection
