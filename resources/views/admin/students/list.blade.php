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
        <div class="row">
            <div class="col-6">
                <form method="GET" action="">
                    <select class="select2" style="width:70%;" name="MaSV" id="listSV">
                        <option value="">
                            Tất cả
                        </option>
                        @foreach ($students as $student)
                            <option value="{{ $student->MaSV }}"
                                {{ $student->MaSV == request()->input('MaSV') ? 'selected' : '' }}>
                                {{ $student->MaSV . ' - ' . $student->TenSV }}
                            </option>
                        @endforeach
                    </select>&ensp;
                    <input type="submit" value="Tìm">
                    @csrf
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Lớp</th>
                    <th>Đối tượng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listStudents as $student)
                    <tr>
                        <td>{{ $student->MaSV }}</td>
                        <td>{{ $student->TenSV }}</td>
                        <td>{{ $student->GioiTinh == 1 ? 'Nam' : 'Nữ' }}</td>
                        <td>{{ strftime('%d-%m-%Y', strtotime($student->NgaySinh)) }}</td>
                        <td>{{ $student->Lop }}</td>
                        <td>{{ $student->discount->TenDT }}</td>
                        <td><a class="btn btn-primary btn-sm" href='/admin/students/edit/{{ $student->MaSV }}'>
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow('{{ $student->MaSV }}', '/admin/students/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
