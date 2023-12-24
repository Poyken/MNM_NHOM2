@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Sửa bình luận</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('comment.update', $comment->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">Đăng bởi:</label>
                    <input id="name" type="text" class="form-control" value="{{ $comment->user_info->name }}"
                        disabled>
                </div>

                <div class="form-group">
                    <label for="comment">Nội dung bình luận</label>
                    <textarea id="comment" name="comment" rows="10" class="form-control" disabled>{{ $comment->comment }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Tình trạng</label>
                    <select name="status" id="" class="form-control">
                        <option disabled>--Chọn tình trạng--</option>
                        <option value="active" {{ $comment->status == 'active' ? 'selected' : '' }}>Có hiệu lực</option>
                        <option value="inactive" {{ $comment->status == 'inactive' ? 'selected' : '' }}>Vô hiệu</option>
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
