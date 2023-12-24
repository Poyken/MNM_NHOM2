@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <h5 class="card-header">Edit User</h5>
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name" class="col-form-label">Họ và tên</label>
                    <input id="name" type="text" name="name" placeholder="Nhập họ và tên ..."
                        value="{{ $user->name }}" class="form-control" disabled>

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-form-label">Email</label>
                    <input id="inputEmail" type="email" name="email" class="form-control" placeholder="Nhập email ..."
                        value="{{ $user->email }}" disabled>

                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="thumbnail" class="col-form-label">Ảnh đại diện</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            {{-- <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                Chọn
                            </a> --}}
                            <img src="{{ $user->photo }}" alt="{{ $user->name }}" style="max-width: 100px;">
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $user->photo }}"
                            disabled>
                    </div>
                    <img id="holder" style="margin-top: 15px; max-height: 100px;">

                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @php
                    $roles = DB::table('users')
                        ->select('role')
                        ->where('id', $user->id)
                        ->get();
                @endphp
                <div class="form-group">
                    <label for="role" class="col-form-label">Vai trò</label>
                    <select name="role" class="form-control" disabled>
                        <option value="">--Chọn vai trò--</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->role }}" {{ $role->role == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                            <option value="{{ $role->role }}" {{ $role->role == 'user' ? 'selected' : '' }}>
                                Người dùng
                            </option>
                        @endforeach
                    </select>

                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Tình trạng</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Có hiệu lực</option>
                        <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Vô hiệu</option>
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

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endpush
