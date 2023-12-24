@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Sửa đơn hàng</h5>
        </div>

        <div class="card-body shadow">
            <form action="{{ route('order.update', $order->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="status">Tình trạng đơn hàng:</label>
                    <select id="status" name="status" class="form-control">
                        <option value="new"
                            {{ $order->status == 'delivered' || $order->status == 'process' || $order->status == 'cancel' ? 'disabled' : '' }}
                            {{ $order->status == 'new' ? 'selected' : '' }}>Mới nhận</option>
                        <option value="process"
                            {{ $order->status == 'delivered' || $order->status == 'cancel' ? 'disabled' : '' }}
                            {{ $order->status == 'process' ? 'selected' : '' }}>Đang xử lý</option>
                        <option value="delivered" {{ $order->status == 'cancel' ? 'disabled' : '' }}
                            {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã giao thành công</option>
                        <option value="cancel" {{ $order->status == 'delivered' ? 'disabled' : '' }}
                            {{ $order->status == 'cancel' ? 'selected' : '' }}>Đã huỷ</option>
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
