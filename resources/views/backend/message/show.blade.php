@extends('backend.layouts.master')

@section('main-content')
    <div class="card shadow">
        <div class="card-header shadow">
            <h5 class="text-primary text-uppercase font-weight-bold float-left">Nội dung tin nhắn</h5>
        </div>

        <div class="card-body shadow">
            @if ($message)
                @if ($message->photo)
                    <img src="{{ $message->photo }}" class="rounded" style="margin-left: 44%;">
                @else
                    <img src="{{ asset('backend/img/avatar.png') }}" class="rounded" style="margin-left: 44%;">
                @endif
                <div class="py-4">
                    Người gửi: <b>{{ $message->name }}</b><br>
                    Email: <b>{{ $message->email }}</b><br>
                    Điện thoại: <b>{{ $message->phone }}</b>
                </div>
                <hr>
                <h5 class="text-center">
                    Chủ đề: <b>{{ $message->subject }}</b>
                </h5>
                <p class="py-5">{{ $message->message }}</p>
            @endif
        </div>
    </div>
@endsection
