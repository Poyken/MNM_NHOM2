@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="card-header shadow">
            <h5 class="text-primary font-weight-bold text-uppercase">Danh sách bình luận</h5>
        </div>

        <div class="card-body shadow">
            <div class="table-responsive">
                @if (count($comments) > 0)
                    <table id="comment-dataTable" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Mã BL</th>
                                <th>Tác giả</th>
                                <th>Tên bài viết</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Tình trạng</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã BL</th>
                                <th>Tác giả</th>
                                <th>Tên bài viết</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Tình trạng</th>
                                <th>Quản lý</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->user_info['name'] }}</td>
                                    <td>{{ $comment->post->title }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>{{ $comment->created_at->format('M d D, Y g: i a') }}</td>
                                    <td>
                                        @if ($comment->status == 'active')
                                            <span class="badge badge-success">{{ $comment->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $comment->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('comment.edit', $comment->id) }}"
                                            class="btn btn-primary btn-sm float-left"
                                            style="height:30px; width: 30px; border-radius: 50%;" data-toggle="tooltip"
                                            data-placement="bottom" title="Sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('comment.destroy', [$comment->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button id="delete-button" class="btn btn-danger btn-sm"
                                                style="height: 30px; width: 30px; border-radius: 50%;"
                                                data-id={{ $comment->id }} data-toggle="tooltip" data-placement="bottom"
                                                title="Xoá">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float:right">{{ $comments->links() }}</span>
                @else
                    <h6 class="text-center">Không tìm thấy bình luận nào.</h6>
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
        $('#comment-dataTable').DataTable({
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
