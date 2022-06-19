@extends('admin.users.main')
@section('head')
    <link rel="stylesheet" href="/template/admin/plugins/select2/css/select2.min.css">
@endsection
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
                            <label for="menu">Tên sinh viên</label>
                            <input type="text" class="form-control" name="TenSV" value="{{ old('TenSV') }}"
                                placeholder="Nhập tên sinh viên" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Lớp</label><br>
                            <select class="select2" style="width:100%;" name="Lop" required>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->MaLop }}">
                                        {{ $class->TenLop }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Ngày sinh</label>
                            <input type="date" class="form-control" name="NgaySinh" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Đối tượng</label><br>
                            <select class="select2" style="width:100%;" name="MaDT" required>
                                @foreach ($discounts as $discount)
                                    <option value="{{ $discount->id }}">
                                        {{ $discount->TenDT }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Giới tính</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="active" value="1" checked
                                    name="GioiTinh">
                                <label for="active" class="custom-control-label">Nam</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="unactive" value="0" name="GioiTinh">
                                <label for="unactive" class="custom-control-label">Nữ</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo sinh viên</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
