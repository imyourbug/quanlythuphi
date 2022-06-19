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
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Nhớ mật khẩu
                                </label>
                            </div>
                        </div>
                        <div class="col-5">
                            <button class="btn">Đăng nhập</button>
                        </div>
                    </div>
                    @csrf
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Đăng nhập bằng Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Đăng nhập bằng Google+
                    </a>
                </div>

                <p class="">
                    <a href="{{ route('forgot-pass') }}">Quên mật khẩu</a>
                </p>
            </div>
        </div>
    </div>
    <br>
@endsection
