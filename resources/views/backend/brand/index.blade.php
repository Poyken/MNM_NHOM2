@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="card-header">
            <h5 class="text-primary text-uppercase font-weight-bold float-left">Danh sách thương hiệu</h5>
            <a href="{{ route('brand.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                data-placement="bottom" title="Thêm thương hiệu">
                <i class="fas fa-plus"></i>
                Thêm thương hiệu
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @if (count($brands) > 0)
                    <table id="brand-dataTable" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Thương hiệu</th>
                                <th>Định danh</th>
                                <th>Tình trạng</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Thương hiệu</th>
                                <th>Định danh</th>
                                <th>Tình trạng</th>
                                <th>Quản lý</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->title }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>
                                        @if ($brand->status == 'active')
                                            <span class="badge badge-success">{{ $brand->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $brand->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('brand.edit', $brand->id) }}"
                                            class="btn btn-primary btn-sm float-left"
                                            style="height: 30px; width: 30px; border-radius: 50%;" data-toggle="tooltip"
                                            data-placement="bottom" title="Sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('brand.destroy', [$brand->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button id="delete-button" class="btn btn-danger btn-sm"
                                                style="height: 30px; width: 30px; border-radius: 50%;"
                                                data-id={{ $brand->id }} data-toggle="tooltip" data-placement="bottom"
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
                    <span style="float: right;">{{ $brands->links() }}</span>
                @else
                    <h6 class="text-center">Không tìm thấy thương hiệu nào! Vui lòng thêm thương hiệu mới.</h6>
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

        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {
            transform: scale(3.2);
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#brand-dataTable').DataTable({
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
                            swal("Dữ liệu của bạn vẫn an toàn.");
                        }
                    });
            })
        })
    </script>
@endpush
