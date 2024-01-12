@extends('admin.students.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="/template/admin/css/regis-subject.css" />
@endsection
@section('content')
    <div class="block-head-2">
        <div class="head-text">
            <a href="/" style="color:black">Trang chủ</a>&ensp;>>&ensp;{{ $title }}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-7">
            <strong>Đã đăng ký</strong>
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th>Mã môn</th> --}}
                        <th>Tên môn</th>
                        <th>Số tín chỉ</th>
                        <th>Học kỳ</th>
                        <th>Số tiền</th>
                        <th>Lựa chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registered_sub as $sub)
                        <tr>
                            {{-- <td>{{ $sub->MaMH }}</td> --}}
                            <td>{{ $sub->TenMH }}</td>
                            <td>{{ $sub->SoTC }}</td>
                            <td>{{ $sub->HocKy }}</td>
                            <td>{{ number_format($sub->SoTC * $sub->SoTienMotTin, '0', ',', '.') }}<sup>đ</sup>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm"
                                    onclick="remove_subject('{{ Session::get('user')->name }}','{{ $sub->MaMH }}', '/regis-subjects/destroy')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-5">
            <strong> Chưa đăng ký</strong>
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th>Mã môn</th> --}}
                        <th>Tên môn</th>
                        <th>Số tín chỉ</th>
                        <th>Số tiền</th>
                        <th>Học kỳ</th>
                        <th>Lựa chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            {{-- <td>{{ $subject->id }}</td> --}}
                            <td>{{ $subject->TenMH }}</td>
                            <td>{{ $subject->SoTC }}</td>
                            <td>{{ number_format($subject->SoTC * $subject->SoTienMotTin, '0', ',', '.') }}<sup>đ</sup>
                            </td>
                            <td>{{ $subject->HocKy }}</td>
                            <td><a class="btn btn-primary btn-sm"
                                    onclick="regis_subject('{{ Session::get('user')->name }}','{{ $subject->id }}', '/regis-subjects/add')">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
