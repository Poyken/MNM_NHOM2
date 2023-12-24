@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold">Đơn hàng
                <a href="{{ route('order.pdf', $order->id) }}" class=" btn btn-primary btn-sm float-right">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Xuất PDF
                </a>
            </h5>
        </div>

        <div class="card-body shadow">
            <div class="table-responsive">
                @if ($order)
                    <table id="orderDetail-dataTable" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Đơn số</th>
                                <th>Mã vận đơn</th>
                                <th>Người mua</th>
                                <th>Email</th>
                                <th>Số lượng</th>
                                <th>Phí (VND)</th>
                                <th>Tổng tiền (VND)</th>
                                <th>Tình trạng</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Đơn số</th>
                                <th>Mã vận đơn</th>
                                <th>Người mua</th>
                                <th>Email</th>
                                <th>Số lượng</th>
                                <th>Phí (VND)</th>
                                <th>Tổng tiền (VND)</th>
                                <th>Tình trạng</th>
                                <th>Quản lý</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->shipping->price }}</td>
                                <td>{{ number_format($order->total_amount, 2) }}</td>
                                <td>
                                    @if ($order->status == 'new')
                                        <span class="badge badge-primary">{{ $order->status }}</span>
                                    @elseif($order->status == 'process')
                                        <span class="badge badge-warning">{{ $order->status }}</span>
                                    @elseif($order->status == 'delivered')
                                        <span class="badge badge-success">{{ $order->status }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('order.edit', $order->id) }}"
                                        class="btn btn-primary btn-sm float-left"
                                        style="height: 30px; width: 30px; border-radius: 50%;" data-toggle="tooltip"
                                        data-placement="bottom" title="Sửa">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('order.destroy', [$order->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button id="delete-button" class="btn btn-danger btn-sm"
                                            style="height: 30px; width: 30px; border-radius: 50%;"
                                            data-id={{ $order->id }} data-toggle="tooltip" data-placement="bottom"
                                            title="Xoá">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <section class="confirmation_part section_padding">
                        <div class="order_boxes">
                            <div class="row">
                                <div class="col-lg-6 col-lx-4">
                                    <div class="order-info">
                                        <h4 class="text-center text-uppercase font-weight-bold">Thông tin đơn hàng</h4>
                                        <table class="table">
                                            <tr class="">
                                                <td>Mã đơn hàng</td>
                                                <td> : {{ $order->order_number }}</td>
                                            </tr>
                                            <tr>
                                                <td>Ngày mua</td>
                                                <td> : {{ $order->created_at->format('D d M, Y') }} lúc
                                                    {{ $order->created_at->format('g : i a') }} </td>
                                            </tr>
                                            <tr>
                                                <td>Số lượng</td>
                                                <td> : {{ $order->quantity }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tình trạng đơn hàng</td>
                                                <td> : {{ $order->status }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phí giao hàng</td>
                                                <td> : $ {{ $order->shipping->price }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phiếu giảm giá</td>
                                                <td> : $ {{ number_format($order->coupon, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tổng tiền</td>
                                                <td> : $ {{ number_format($order->total_amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phương thức thanh toán</td>
                                                <td>
                                                    :
                                                    @if ($order->payment_method == 'cod')
                                                        Nhận hàng thanh toán
                                                    @else
                                                        Paypal
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tình trạng thanh toán</td>
                                                <td> : {{ $order->payment_status }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-lx-4">
                                    <div class="shipping-info">
                                        <h4 class="text-center text-uppercase font-weight-bold">Thông tin giao hàng</h4>
                                        <table class="table">
                                            <tr class="">
                                                <td>Họ tên người mua</td>
                                                <td> : {{ $order->first_name }} {{ $order->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td> : {{ $order->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Số điện thoại</td>
                                                <td> : {{ $order->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ</td>
                                                <td> : {{ $order->address1 }}, {{ $order->address2 }}</td>
                                            </tr>
                                            <tr>
                                                <td>Ghi chú</td>
                                                <td> : {{ $order->address1 }}, {{ $order->address2 }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }

        .order-info,
        .shipping-info {
            background: #EDEDED;
            padding: 20px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#orderDetail-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [4, 5]
            }]
        });
        // Sweet alert
        function deleteData(id) {}
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#delete-button').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                e.preventDefault();
                swal({
                        title: "Bạn có chắc muốn xoá mục này?",
                        text: "Sau khi xóa, dữ liệu này sẽ không thể khôi phục!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Dữ liệu của bạn vẫn an toàn!");
                        }
                    });
            })
        })
    </script>
@endpush
