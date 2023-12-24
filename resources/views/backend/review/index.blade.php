@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="row">
            <div class="col">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="card-header shadow">
            <h5 class="text-primary font-weight-bold text-uppercase">Danh sách đánh giá</h5>
        </div>

        <div class="card-body shadow">
            <div class="table-responsive">
                @if (count($reviews) > 0)
                    <table id="review-dataTable" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Đăng bởi</th>
                                <th>Tên sản phẩm</th>
                                <th>Nội dung</th>
                                <th>Đánh giá</th>
                                <th>Ngày nhận xét</th>
                                <th>Tình trạng</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Đăng bởi</th>
                                <th>Tên sản phẩm</th>
                                <th>Nội dung</th>
                                <th>Đánh giá</th>
                                <th>Ngày nhận xét</th>
                                <th>Tình trạng</th>
                                <th>Quản lý</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($reviews as $review)
                                <tr>
                                    <td>{{ $review->id }}</td>
                                    <td>{{ $review->user_info['name'] }}</td>
                                    <td>{{ $review->product->title }}</td>
                                    <td>{{ $review->review }}</td>
                                    <td>
                                        <ul style="list-style: none;">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($review->rate >= $i)
                                                    <li style="float: left; color: #F7941D;">
                                                        <i class="fa fa-star"></i>
                                                    </li>
                                                @else
                                                    <li style="float: left; color: #F7941D;">
                                                        <i class="far fa-star"></i>
                                                    </li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </td>
                                    <td>{{ $review->created_at->format('M d D, Y g: i a') }}</td>
                                    <td>
                                        @if ($review->status == 'active')
                                            <span class="badge badge-success">{{ $review->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $review->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('review.edit', $review->id) }}"
                                            class="btn btn-primary btn-sm float-left mr-1"
                                            style="height: 30px; width: 30px; border-radius: 50%;" data-toggle="tooltip"
                                            data-placement="bottom" title="Sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('review.destroy', [$review->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button id="delete-button" class="btn btn-danger btn-sm"
                                                style="height: 30px; width: 30px; border-radius: 50%;"
                                                data-id={{ $review->id }} data-toggle="tooltip" data-placement="bottom"
                                                title="Xoá">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float: right;">{{ $reviews->links() }}</span>
                @else
                    <h6 class="text-center">Không có đánh giá sản phẩm nào.</h6>
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
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#review-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [5, 6]
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
