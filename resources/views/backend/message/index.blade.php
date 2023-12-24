@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="row">
            <div class="col">
                @include('backend.layouts.notification')
            </div>
        </div>

        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold float-left">Tin nhắn</h5>
        </div>

        <div class="card-body shadow">
            @if (count($messages) > 0)
                <table id="message-dataTable" class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Người gửi</th>
                            <th>Chủ đề</th>
                            <th>Ngày gửi</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Người gửi</th>
                            <th>Chủ đề</th>
                            <th>Ngày gửi</th>
                            <th>Quản lý</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr
                                class="@if ($message->read_at) border-left-success @else bg-light border-left-warning @endif">
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $message->name }} {{ $message->read_at }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->created_at->format('F d, Y h:i A') }}</td>
                                <td>
                                    <a href="{{ route('message.show', $message->id) }}"
                                        class="btn btn-primary btn-sm float-left"
                                        style="height: 30px; width: 30px; border-radius: 50%;" data-toggle="tooltip"
                                        data-placement="bottom" title="Xem">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('message.destroy', [$message->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button id="delete-button" class="btn btn-danger btn-sm"
                                            style="height: 30px; width: 30px; border-radius: 50%;"
                                            data-id={{ $message->id }} data-toggle="tooltip" data-placement="bottom"
                                            title="Xoá">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span style="float: right;">{{ $messages->links() }}</span>
            @else
                <h6 class="text-center">Tin nhắn trống.</h6>
            @endif
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
        $('#message-dataTable').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [4]
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
                // alert(dataID);
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
