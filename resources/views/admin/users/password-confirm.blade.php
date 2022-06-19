@extends('admin.students.main')
@section('head')
    <link rel="stylesheet" href="/template/admin/css/payment.css">
@endsection
@section('content')
    <div class="row form-confirm">
        <form action="" method="POST" class="form-container">
            <h6>Mật khẩu mới đã được gửi về <a href="https://mail.google.com">{{ $user->email }}</a></h6>
            <a href="{{ route('login') }}">Quay lại đăng nhập</a>
            @csrf
        </form>
        @csrf
    </div>
@endsection
