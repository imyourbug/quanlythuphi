@extends('admin.students.main')
@section('head')
    <link rel="stylesheet" href="/template/admin/css/payment.css">
@endsection
@section('content')
    <div class="row form-confirm">
        <form action="" method="POST" class="form-container">
            <h6>Nhập mã số gồm 4 chữ số đã gửi về <a href="https://mail.google.com">{{ $infor['Email'] }}</a></h6>
            <table>
                <tr>
                    <td><label><b>Mã số</b></label></td>
                    <td><input type="text" class="form-control" placeholder="Nhập mã số" name="MaSo" required></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn">&ensp;Gửi</button></td>
                </tr>
            </table>
            @csrf
        </form>
        @csrf
    </div>
@endsection
