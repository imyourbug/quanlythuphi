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
            <h3>{{ $title }}</h3>
            <table>
                <tr>
                    <td><label><b>Tên tài khoản</b></label></td>
                    <td><input type="text" class="form-control" name="name" required placeholder="Nhập tài khoản">
                    </td>
                </tr>
                <tr>
                    <td><label><b>Email</b></label></td>
                    <td><input type="email" class="form-control" placeholder="Nhập email" name="email" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2"><button type="submit" class="btn">&ensp;Xác nhận</button></td>
                </tr>
            </table>
            @csrf
        </form>
        @csrf
    </div>
@endsection
