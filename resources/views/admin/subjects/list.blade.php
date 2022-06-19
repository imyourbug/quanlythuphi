@extends('admin.users.main')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card card-primary mt-3">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã môn học</th>
                    <th>Tên môn học</th>
                    <th>Số tín chỉ</th>
                    <th>Học kỳ</th>
                    <th>Số tiền một tín</th>
                    <th>Action</th>
                </tr>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->TenMH }}</td>
                        <td>{{ $subject->SoTC }}</td>
                        <td>{{ $subject->HocKy }}</td>
                        <td>{{ number_format($subject->SoTienMotTin, '0', ',', '.') }}<sup>đ</sup></td>
                        <td><a class="btn btn-primary btn-sm" href='/admin/subjects/edit/{{ $subject->id }}'>
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow('{{ $subject->id }}', '/admin/subjects/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div><!-- /.container-fluid -->
@endsection
