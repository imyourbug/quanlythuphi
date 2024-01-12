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
                            <label for="menu">Tên sinh viên</label>
                            <input type="text" class="form-control" name="TenSV" value="{{ $student->TenSV }}"
                                placeholder="Nhập tên sinh viên" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Lớp</label><br>
                            <select class="select2" style="width:100%;" name="Lop">
                                @foreach ($classes as $class)
                                    <option value="{{ $class->MaLop }}"
                                        {{ $student->Lop == $class->MaLop ? 'selected' : '' }}>
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
                            <input type="date" class="form-control" name="NgaySinh"
                                value="{{ strftime('%Y-%m-%d', strtotime($student->NgaySinh)) }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Đối tượng</label><br>
                            <select class="select2" style="width:100%;" name="MaDT">
                                @foreach ($discounts as $discount)
                                    <option value="{{ $discount->id }}"
                                        {{ $student->MaDT == $discount->id ? 'selected' : '' }}>
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
                                <input class="custom-control-input" type="radio" id="active" value="1"
                                    {{ $student->GioiTinh == 1 ? 'checked' : '' }} name="GioiTinh">
                                <label for="active" class="custom-control-label">Nam</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="unactive" value="0"
                                    {{ $student->GioiTinh == 0 ? 'checked' : '' }} name="GioiTinh">
                                <label for="unactive" class="custom-control-label">Nữ</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
