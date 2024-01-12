@extends('admin.users.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Thêm hình thức miễn giảm</h3>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="menu">Tên hình thức</label>
                            <input type="text" class="form-control" name="TenDT" value="{{ old('TenDT') }}"
                                placeholder="Nhập tên hình thức" required>
                        </div>
                        <div class="form-group">
                            <label for="menu">Miễn giảm học phí (%)</label>
                            <input type="number" class="form-control" name="MienGiam" value="{{ old('percent') }}"
                                placeholder="Nhập phần trăm miễn giảm học phí (%)" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tạo mới</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="col-md-8">
                <div class="card card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách</h3>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã hình thức</th>
                            <th>Tên hình thức</th>
                            <th>Miễn giảm (%)</th>
                            <th>Action</th>
                        </tr>
                    <tbody>
                        </thead>
                        @foreach ($discounts as $discount)
                            <tr>
                                <td>{{ $discount->id }}</td>
                                <td>{{ $discount->TenDT }}</td>
                                <td>{{ $discount->MienGiam }}</td>
                                <td><a class="btn btn-primary btn-sm" href='/admin/discounts/edit/{{ $discount->id }}'>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm"
                                        onclick="removeRow('{{ $discount->id }}', '/admin/discounts/destroy')">
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
