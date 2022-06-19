@extends('admin.users.main')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-danger elevation-1"><a href="{{ route('student.list') }}"><i
                            class="fa-solid fa-user-graduate"></i></a></span>

                <div class="info-box-content">
                    <span class="info-box-text">Sinh viên</span>
                    <span class="info-box-number">
                        {{ count($students) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><a href="{{ route('receipt.list') }}"><i
                            class="fas fa-copy"></i></a></span>

                <div class="info-box-content">
                    <span class="info-box-text">Phiếu thu</span>
                    <span class="info-box-number">{{ count($receipts) }}</span>
                </div>
            </div>
        </div>

        <div class="clearfix hidden-md-up"></div>

        @php
            $total = 0;
            foreach ($receipts as $receipt) {
                $total += $receipt->SoTienNop;
            }
        @endphp
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><a href="{{ route('tuition.list') }}">
                        <i class="fa-solid fa-sack-dollar"></i></a></span>

                <div class="info-box-content">
                    <span class="info-box-text">Quỹ</span>
                    <span class="info-box-number">{{ number_format($total, '0', ',', '.') }} <sup>đ</sup></span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1">
                    <a href="{{ route('user.list') }}"><i class="fas fa-users"></i></a></span>

                <div class="info-box-content">
                    <span class="info-box-text">Người dùng</span>
                    <span class="info-box-number">{{ count($users) }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="banner">
        <img src="/template/admin/image/bannerUTT.png" width="100%" height="50%">
    </div>
    <hr>
    <div class="banner">
        <div class="row">
            <div class="col-4">
                <img src="/template/admin/image/Anh1.jpg" width="100%">
            </div>
            <div class="col-4">
                <img src="/template/admin/image/Anh2.jpg" width="100%">
            </div>
            <div class="col-4">
                <img src="/template/admin/image/Anh3.jpg" width="100%">
            </div>
        </div>
    </div>
@endsection
