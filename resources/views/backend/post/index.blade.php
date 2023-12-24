@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="row">
            <div class="col">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold float-left">Danh sách bài viết</h5>
            <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                data-placement="bottom" title="Thêm bài viết">
                <i class="fas fa-plus"></i>
                Thêm bài viết
            </a>
        </div>

        <div class="card-body shadow">
            <div class="table-responsive">
                @if (count($posts) > 0)
                    <table id="product-dataTable" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Thẻ</th>
                                <th>Tác giả</th>
                                <th>Hình ảnh</th>
                                <th>Tình trạng</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Thẻ</th>
                                <th>Tác giả</th>
                                <th>Hình ảnh</th>
                                <th>Tình trạng</th>
                                <th>Quản lý</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)
                                @php
                                    $author_info = DB::table('users')
                                        ->select('name')
                                        ->where('id', $post->added_by)
                                        ->get();
                                @endphp
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->cat_info->title }}</td>
                                    <td>{{ $post->tags }}</td>
                                    <td>
                                        @foreach ($author_info as $data)
                                            {{ $data->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($post->photo)
                                            <img src="{{ $post->photo }}" alt="{{ $post->photo }}" class="img-fluid zoom"
                                                style="max-width: 100px;">
                                        @else
                                            <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" alt="Ảnh bài viết"
                                                class="img-fluid" style="max-width: 100px;">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->status == 'active')
                                            <span class="badge badge-success">{{ $post->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $post->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-primary btn-sm float-left"
                                            style="height: 30px; width: 30px; border-radius: 50%;" data-toggle="tooltip"
                                            data-placement="bottom" title="Sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('post.destroy', [$post->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button id="delete-button" class="btn btn-danger btn-sm"
                                                style="height: 30px; width: 30px; border-radius: 50%;"
                                                data-id={{ $post->id }} data-toggle="tooltip" data-placement="bottom"
                                                title="Xoá">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float: right;">{{ $posts->links() }}</span>
                @else
                    <h6 class="text-center">Không tìm thấy bài viết nào. Vui lòng thêm bài viết mới.</h6>
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
            transform: scale(3.5);
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#product-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [8, 9, 10]
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
