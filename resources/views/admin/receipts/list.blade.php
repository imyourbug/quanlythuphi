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
        <table class="table">
            <thead>
                <tr>
                    <th>Mã phiếu thu</th>
                    <th>Tên người thu</th>
                    <th>Mã sinh viên</th>
                    <th>Số tiền nộp</th>
                    <th>Ngày nộp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($receipts as $receipt)
                    <tr>
                        <td>{{ $receipt->id }}</td>
                        <td>{{ $receipt->TenNT }}</td>
                        <td>{{ $receipt->MaSV }}</td>
                        <td>{{ number_format($receipt->SoTienNop, 0, ',', '.') }}<sup>đ</sup></td>
                        <td>{{ $receipt->created_at->format('H:m:i d-m-Y') }}</td>
                        <td><a class="btn btn-primary btn-sm" href='/admin/receipts/edit/{{ $receipt->id }}'>
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow('{{ $receipt->id }}', '/admin/receipts/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" href='/admin/receipts/detail/{{ $receipt->id }}'>
                                <i class="nav-icon far fa-plus-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $receipts->links() }}
    </div><!-- /.container-fluid -->
@endsection
