@extends('admin.users.main')
@section('head')
    <link rel="stylesheet" href="/template/admin/css/tuition.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/template/admin/plugins/select2/css/select2.min.css"><!-- Select2 -->
    <script src="/template/admin/plugins/select2/js/select2.full.min.js"></script>
    <!-- jQuery -->
    <script src="/template/admin/plugins/jquery/jquery.min.js"></script>
@endsection
@section('content')
    <div class="card card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form method="GET" action="">
                <select class="select2" style="width:70%;" name="MaSV" id="listSV">
                    <option value="">
                        Tất cả
                    </option>
                    @foreach ($students as $student)
                        <option value="{{ $student->MaSV }}"
                            {{ $student->MaSV == request()->input('MaSV') ? 'selected' : '' }}>
                            {{ $student->MaSV . ' - ' . $student->TenSV }}
                        </option>
                    @endforeach
                </select>&ensp;
                <input type="submit" value="Tìm">
                @csrf
            </form>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Học phí phải nộp</th>
                    <th>Học phí đã nộp</th>
                    <th>Còn</th>
                    <th>Trạng thái</th>
                </tr>
            <tbody>
                @foreach ($tuitions as $tuition)
                    <tr>
                        <td>{{ $tuition->MaSV }}</td>
                        <td>{{ $tuition->TenSV }}</td>
                        <td>
                            {{ number_format($tuition->SoTien - ($tuition->SoTien * $tuition->MienGiam) / 100, '0', ',', '.') }}
                            <sup>đ</sup>
                        </td>
                        <td>
                            {{ is_null($tuition->DaNop) == true ? '0' : number_format($tuition->DaNop, '0', ',', '.') }}
                            <sup>đ</sup>
                        </td>
                        <td>
                            @php
                                $con = $tuition->SoTien - ($tuition->SoTien * $tuition->MienGiam) / 100 - $tuition->DaNop;
                            @endphp
                            {{ number_format($con, '0', ',', '.') }}
                            <sup>đ</sup>
                        </td>
                        <td>
                            {!! App\Helpers\Helper::status($con) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div>
    <script type="text/javascript"></script>
    <script>
        $(function() {
            $('.select2').select2();
        });
    </script>
@endsection
