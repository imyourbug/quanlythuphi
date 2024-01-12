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
                            <label for="menu">Mã hình thức</label>
                            <input type="text" class="form-control" name="id" value="{{ $discount->id }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Tên hình thức</label>
                            <input type="text" class="form-control" name="TenDT" value="{{ $discount->TenDT }}"
                                placeholder="Nhập tên hình thức" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="menu">Miễn giảm học phí</label>
                        <input type="number" class="form-control" name="MienGiam" value="{{ $discount->MienGiam }}"
                            placeholder="Nhập phần trăm miễn giảm học phí (%)" required>
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
