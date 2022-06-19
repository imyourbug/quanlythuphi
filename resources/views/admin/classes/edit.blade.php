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
        <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Mã lớp</label>
                            <input type="text" class="form-control" name="MaLop" value="{{ $class->MaLop }}"
                                placeholder="Nhập tên môn học" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Tên lớp</label>
                            <input type="text" class="form-control" name="TenLop" value="{{ $class->TenLop }}"
                                placeholder="Nhập tên khoa" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Sĩ số</label>
                            <input type="number" class="form-control" name="SiSo" value="{{ $class->SiSo }}"
                                placeholder="Nhập số sinh viên" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Khoa</label><br>
                            <select class="select2" style="width:100%;" name="Khoa">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->MaKhoa }}"
                                        {{ $department->MaKhoa == $class->Khoa ? 'selected' : '' }}>
                                        {{ $department->TenKhoa }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>
    </div><!-- /.container-fluid -->
@endsection
