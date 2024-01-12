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
                            <label for="menu">Tên người thu</label>
                            <input type="text" class="form-control" name="TenNT" value="{{ $receipt->TenNT }}"
                                placeholder="Nhập tên người thu" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Mã sinh viên</label><br>
                            <select class="select2" style="width:100%;" name="MaSV">
                                @foreach ($students as $student)
                                    <option value="{{ $student->MaSV }}"
                                        {{ $receipt->MaSV == $student->MaSV ? 'selected' : '' }}>
                                        {{ $student->MaSV }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Số tiền nộp</label>
                            <input type="number" class="form-control" name="SoTienNop" required
                                value="{{ $receipt->SoTienNop }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu">Ngày nộp</label>
                            <input type="text" class="form-control"
                                value="{{ strftime('%d-%m-%Y', strtotime($receipt->created_at)) }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật phiếu thu</button>
            </div>
            @csrf
        </form>
    </div>
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
@endsection
