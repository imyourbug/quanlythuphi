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
            <h3>Chỉnh sửa thông tin cá nhân </h3>
            <table>
                <tr>
                    <td><label><b>Mã sinh viên</b></label></td>
                    <td><input type="text" class="form-control" value="{{ $student->MaSV }}" readonly>
                    </td>
                </tr>
                <tr>
                    <td><label><b>Họ tên</b></label></td>
                    <td><input type="text" class="form-control" placeholder="Nhập họ tên" name="TenSV"
                            value="{{ $student->TenSV }}" required>
                    </td>
                </tr>
                <tr>
                    <td><label><b>Giới tính</b></label></td>
                    <td>
                        <div class=" form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="active" value="1"
                                    {{ $student->GioiTinh == 1 ? 'checked' : '' }} name="GioiTinh">
                                <label for="active" class="custom-control-label">Nam</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="unactive" value="0"
                                    {{ $student->GioiTinh == 0 ? 'checked' : '' }} name="GioiTinh">
                                <label for="unactive" class="custom-control-label">Nữ</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label><b>Ngày sinh</b></label></td>
                    <td>
                        <div class="form-group">
                            <input type="date" class="form-control" name="NgaySinh"
                                value="{{ strftime('%Y-%m-%d', strtotime($student->NgaySinh)) }}" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label><b>Đối tượng</b></label></td>
                    <td><input type="text" class="form-control" value="{{ $student->discount->TenDT }}" readonly>
                    </td>
                </tr>
                <tr>
                    <td><label><b>Lớp</b></label></td>
                    <td><input type="text" class="form-control" value="{{ $student->class->MaLop }}" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn">&ensp;Cập nhật</button></td>
                </tr>
            </table>
            @csrf
        </form>
        @csrf
    </div>
@endsection
