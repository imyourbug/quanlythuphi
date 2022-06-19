@extends('admin.users.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Thêm khoa</h3>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="menu">Mã khoa</label>
                            <input type="text" class="form-control" name="MaKhoa" value="{{ old('MaKhoa') }}"
                                placeholder="Nhập mã khoa" required>
                        </div>
                        <div class="form-group">
                            <label for="menu">Tên khoa</label>
                            <input type="text" class="form-control" name="TenKhoa" value="{{ old('TenKhoa') }}"
                                placeholder="Nhập tên khoa" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tạo khoa</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="col-md-8">
                <div class="card card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách khoa</h3>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã khoa</th>
                            <th>Tên khoa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->MaKhoa }}</td>
                                <td>{{ $department->TenKhoa }}</td>
                                <td><a class="btn btn-primary btn-sm"
                                        href='/admin/departments/edit/{{ $department->MaKhoa }}'>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm"
                                        onclick="removeRow('{{ $department->MaKhoa }}', '/admin/departments/destroy')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection
