<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.layouts.head')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="error mx-auto" data-text="404">404</div>
                    <p class="lead text-gray-800 mb-5">Không tìm thấy trang yêu cầu!</p>
                    <p class="text-gray-500 mb-0">Có vẻ như bạn đang yêu cầu tài nguyên không tồn tại.</p>
                    <a href="{{ route('home') }}">&larr; Quay lại trang chủ</a>
                </div>
            </div>
        </div>
    </div>
    @include('backend.layouts.footer')
</body>

</html>
