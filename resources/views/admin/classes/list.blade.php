@extends('admin.users.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Thêm lớp</h3>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="menu">Khóa</label>
                            <input type="number" class="form-control" name="thutu" value="{{ old('thutu') }}"
                                placeholder="Nhập thứ tự khóa" required>
                        </div>
                        <div class="form-group">
                            <label for="menu">Số lớp muốn tạo</label>
                            <input type="number" class="form-control" name="solop" value="{{ old('solop') }}"
                                placeholder="Nhập số lớp" required>
                        </div>
                        <div class="form-group">
                            <label for="menu">Sĩ số</label>
                            <input type="number" class="form-control" name="siso" value="{{ old('siso') }}"
                                placeholder="Nhập sĩ số" required>
                        </div>
                        <div class="form-group">
                            <label for="menu">Khoa</label><br>
                            <select class="select2" style="width:100%;" name="khoa">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->MaKhoa }}">
                                        {{ $department->TenKhoa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tạo lớp</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="col-md-8">
                <div class="card card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách lớp</h3>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã lớp</th>
                            <th>Tên lớp</th>
                            <th>Sĩ số</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>{{ $class->MaLop }}</td>
                                <td>{{ $class->TenLop }}</td>
                                <td>{{ $class->SiSo }}</td>
                                <td><a class="btn btn-primary btn-sm" href='/admin/classes/edit/{{ $class->MaLop }}'>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm"
                                        onclick="removeRow('{{ $class->MaLop }}', '/admin/classes/destroy')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $classes->links() }}
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection
