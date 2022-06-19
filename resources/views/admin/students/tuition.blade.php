@extends('admin.students.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="/template/admin/css/tuition.css" />
@endsection
@section('content')
    <div class="block-head-2">
        <div class="head-text">
            <a href="/" style="color:black">Trang chủ</a>&ensp;>>&ensp;{{ $title }}
        </div>
    </div>
    <br>
    <div class="infor">{{ $student->MaSV }} - {{ $student->TenSV }} - Lớp
        {{ $student->class->TenLop }} - Khoa {{ $student->class->department->TenKhoa }}
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            @php
                $stt = 1;
                $total1 = 0;
            @endphp
            @foreach ($paid_tuitions as $paid_tuition)
                @php
                    $total1 += $paid_tuition->SoTienNop;
                @endphp
            @endforeach
            <div class="caption-table">Đã đóng:&ensp;{{ number_format($total1, '0', ',', '.') }}<sup>đ</sup></div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Loại</th>
                        <th>Ngày nộp</th>
                        <th>Số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paid_tuitions as $paid_tuition)
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>Học phí</td>
                            <td>{{ $paid_tuition->created_at->format('d/m/Y') }}</td>
                            <td>{{ number_format($paid_tuition->SoTienNop, '0', ',', '.') }}<sup>đ</sup></td>
                        </tr>
                        @php
                            $stt++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            @php
                $stt = 1;
                $total2 = 0;
            @endphp
            @foreach ($tuitions as $tuition)
                @php
                    $total2 += $tuition->SoTien;
                @endphp
            @endforeach
            <div class="caption-table">Phải đóng:&ensp;{{ number_format($total2, '0', ',', '.') }}<sup>đ</sup></div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Loại</th>
                        <th>Học kỳ</th>
                        <th>Số tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tuitions as $tuition)
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>Học phí</td>
                            <td>{{ $tuition->HocKy }}</td>
                            <td>{{ number_format($tuition->SoTien, '0', ',', '.') }}<sup>đ</sup></td>
                        </tr>
                        @php
                            $stt++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-4">
            @php
                $dis = $total2 * ($student->discount->MienGiam / 100);
            @endphp
            <table class="table">
                <tbody>
                    <tr>
                        <td class="text">Đã đóng:</td>
                        <td class="money">{{ number_format($total1, '0', ',', '.') }}<sup>đ</sup></td>
                    </tr>
                    <tr>
                        <td class="text">Miễn giảm
                            ({{ $student->discount->TenDT . ' - ' . $student->discount->MienGiam }}%):
                        </td>
                        <td class="money">
                            {{ number_format($dis, '0', ',', '.') }}<sup>đ</sup>
                        </td>
                    </tr>
                    @if ($total1 > $total2 * (1 - $student->discount->MienGiam / 100))
                        <tr>
                            <td class="text">Còn dư:</td>
                            <td class="money">
                                {{ number_format($total1 - $total2 + $dis, '0', ',', '.') }}<sup>đ</sup>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td class="text">Còn nợ:</td>
                            <td class="money">
                                {{ number_format($total2 - $dis - $total1, '0', ',', '.') }}<sup>đ</sup>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="2" class="">* Học phí dư sẽ được tính vào tiền học của kỳ tiếp theo
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
