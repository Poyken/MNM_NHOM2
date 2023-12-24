@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold float-left">Danh sách danh mục bài viết</h5>
            <a href="{{ route('post-category.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                data-placement="bottom" title="Thêm danh mục bài viết">
                <i class="fas fa-plus"></i>
                Thêm danh mục bài viết
            </a>
        </div>

        <div class="card-body shadow">
            <div class="table-responsive">
                @if (count($postCategories) > 0)
                    <table id="postCategory-dataTable" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Mã DM</th>
                                <th>Tên DM</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S.N.</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($postCategories as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->slug }}</td>
                                    <td>
                                        @if ($data->status == 'active')
                                            <span class="badge badge-success">{{ $data->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $data->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('post-category.edit', $data->id) }}"
                                            class="btn btn-primary btn-sm float-left"
                                            style="height: 30px; width: 30px; border-radius: 50%;" data-toggle="tooltip"
                                            data-placement="bottom" title="Sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('post-category.destroy', [$data->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button id="delete-button" class="btn btn-danger btn-sm"
                                                style="height: 30px; width: 30px; border-radius: 50%;"
                                                data-id={{ $data->id }} data-toggle="tooltip" data-placement="bottom"
                                                title="Xoá">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>

                                    {{-- <div class="modal fade" id="delModal{{ $user->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="#delModal{{ $user->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="#delModal{{ $user->id }}Label">Delete
                                                        user</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('banners.destroy', $user->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"
                                                            style="margin:auto; text-align:center">Parmanent delete
                                                            user</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float: right;">{{ $postCategories->links() }}</span>
                @else
                    <h6 class="text-center">Không có danh mục bài viết nào. Vui lòng thêm danh mục bài viết mới.</h6>
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
        $('#postCategory-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [3, 4]
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
                        text: "Sau khi xoá, dữ liệu này sẽ không thể khôi phục!",
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
