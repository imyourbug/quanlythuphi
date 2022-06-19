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
                            <label for="menu">Tên môn học</label>
                            <input type="text" class="form-control" name="TenMH" value="{{ old('TenMH') }}"
                                placeholder="Nhập tên môn học" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Số tín chỉ</label>
                            <input type="number" class="form-control" name="SoTC" value="{{ old('SoTC') }}"
                                placeholder="Nhập số tín chỉ" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Học kỳ</label>
                            <input type="number" class="form-control" name="HocKy" value="{{ old('HocKy') }}"
                                placeholder="Nhập học kỳ" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Số tiền một tín</label>
                            <input type="number" class="form-control" name="SoTienMotTin"
                                value="{{ old('SoTienMotTin') }}" placeholder="Nhập số tiền một tín" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo môn học</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
