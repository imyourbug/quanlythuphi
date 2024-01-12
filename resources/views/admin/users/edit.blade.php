@extends('admin.users.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card card-primary mt-3">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
        </div>
        <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Tên tài khoản</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                placeholder="Nhập email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                placeholder="Nhập mật khẩu" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="repassword"
                                value="{{ old('repassword') }}" placeholder="Nhập lại mật khẩu" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Phân quyền</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="active" value="1"
                            {{ $user->roles == 1 ? 'checked' : '' }} name="roles">
                        <label for="active" class="custom-control-label">Quản trị</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="unactive" value="0"
                            {{ $user->roles == 0 ? 'checked' : '' }} name="roles">
                        <label for="unactive" class="custom-control-label">Sinh viên</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Sửa</button>
            </div>
            <input type="hidden" value="{{ $user->id }}">
            @csrf
        </form>
    </div>
@endsection
