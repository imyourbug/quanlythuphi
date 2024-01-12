@extends('admin.students.main')
@section('head')
    <link rel="stylesheet" href="/template/admin/css/login.css">
@endsection
@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="form-login">
            <div class="card-header text-center">
                <b>{{ $title }}</b>
            </div>
            <div class="card-body">
                <form action="/admin/users/login/store" method="POST">
                    <div class="input-group mb-3">
                        <input name="name" type="text" class="form-control" placeholder="Tài khoản" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Mật khẩu" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn">Đăng nhập</button>
                        </div>
                    </div>
                    @csrf
                </form>

                <p class="">
                    <a href="{{ route('forgot-pass') }}">Quên mật khẩu</a>
                </p>
            </div>
        </div>
    </div>
    <br>
@endsection
