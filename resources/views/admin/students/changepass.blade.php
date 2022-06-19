@extends('admin.students.main')
@section('head')
    <link rel="stylesheet" href="/template/admin/css/information.css">
@endsection
@section('content')
    <div class="block-head-2">
        <div class="head-text">
            <a href="/" style="color:black">Trang chủ</a>&ensp;>>&ensp;{{ $title }}
        </div>
    </div>
    <div class="information">
        <form action="" method="POST" class="form-container">
            <h3>Đổi mật khẩu </h3>
            <table>
                <tr>
                    <td><label><b>Tên tài khoản</b></label></td>
                    <td><input type="text" class="form-control" value="{{ $user->name }}" name="name" readonly>
                    </td>
                </tr>
                <tr>
                    <td><label><b>Email</b></label></td>
                    <td><input type="email" class="form-control" placeholder="Nhập email" name="email"
                            value="{{ $user->email }}" required>
                    </td>
                </tr>
                <tr>
                    <td><label><b>Mật khẩu cũ</b></label></td>
                    <td><input type="text" class="form-control" placeholder="Nhập mật khẩu cũ" name="oldpassword"
                            value="{{ old('oldpassword') }}" required>
                    </td>
                </tr>
                <tr>
                    <td><label><b>Mật khẩu mới</b></label></td>
                    <td>
                        <input type="text" class="form-control" placeholder="Nhập mật khẩu mới" name="password"
                            value="{{ old('password') }}" required>
                    </td>
                </tr>
                <tr>
                    <td><label><b>Nhập lại mật khẩu mới</b></label></td>
                    <td>
                        <input type="text" class="form-control" placeholder="Nhập lại mật khẩu mới" name="repassword"
                            value="{{ old('repassword') }}" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn">&ensp;Đổi mật khẩu</button></td>
                </tr>
            </table>
            @csrf
        </form>
        @csrf
    </div>
@endsection
