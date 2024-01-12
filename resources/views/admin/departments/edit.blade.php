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
                            <label for="menu">Mã khoa</label>
                            <input type="text" class="form-control" name="MaKhoa" value="{{ $department->MaKhoa }}"
                                placeholder="Nhập tên môn học" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Tên khoa</label>
                            <input type="text" class="form-control" name="TenKhoa" value="{{ $department->TenKhoa }}"
                                placeholder="Nhập tên khoa" required>
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
