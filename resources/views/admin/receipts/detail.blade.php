@extends('admin.users.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3" style="height:550px; line-height:50px">
                    <div class="row">
                        <div class="col-6">
                            <h5>
                                <div>Đơn vị: Đại học Kinh tế - Tài chính</div>
                                <div>Địa chỉ: 54 Triều Khúc - Thanh Xuân - Hồ Chí Minh</div>

                            </h5>

                        </div>
                        <div class="col-6" style="text-align:center">
                            <h5>
                                <div> BỘ GIAO
                                    THÔNG VẬN TẢI
                                </div>
                                <div>TRƯỜNG ĐH CÔNG NGHỆ
                                    GIAO
                                    THÔNG VẬN TẢI
                                </div>
                            </h5>

                        </div>
                        <!-- /.col -->
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12" style="text-align:center">
                            <h4>* * *</h4>
                            <h4>BIÊN LAI THU TIỀN</h4>
                            <h6>Ngày {{ $receipt->created_at->format('d-m-Y') }}</h6>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <div><b>Tên người nộp: </b>{{ $receipt->student->TenSV }}</div>
                            <div><b>Nội dung thu: </b>Nộp học phí</div>
                            <div><b>Số tiền thu: </b>{{ number_format($receipt->SoTienNop, '0', ',', '.') }} đ</div>
                            <div><b>Ngày: </b>{{ $receipt->created_at->format('d-m-Y') }}</div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row" style="text-align:center">
                        <div class="col-6">
                            <b>Người nộp tiền</b>
                            <div style="font-style:italic">(Ký, ghi rõ họ tên)</div>
                        </div>
                        <div class="col-6">
                            <b>Người thu tiền</b>
                            <div style="font-style:italic">(Ký, ghi rõ họ tên)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a target="_blank" class="btn btn-success float-right"
        href="{{ url('admin/receipts/export/' . $receipt->id . '') }}">Xuất PDF</a>
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
@endsection
