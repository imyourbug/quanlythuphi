<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xuất PDF</title>
    <style type="text/css">
        .block-top {
            display: flex;
            justify-content: center;
        }

        * {
            font-family: "DejaVu Sans" !important;
        }

        table {
            width: 100%;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <div style="height:500px; line-height:20px">
            <div class="block-top">
                <table>
                    <tr>
                        <td>

                            <h5>
                                <div>Đơn vị: ĐH Kinh tế - Tài chính</div>
                                <div>Địa chỉ: 54 Triều Khúc</div>

                            </h5>
                        </td>
                        <td>
                            <h5>
                                <div style="text-align:center"> BỘ GIAO
                                    THÔNG VẬN TẢI
                                </div>
                                <div style="text-align:center">TRƯỜNG ĐH CÔNG NGHỆ
                                    GIAO
                                    THÔNG VẬN TẢI
                                </div>
                            </h5>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <div style="text-align:center">
                <h4>---------------</h4>
                <h4>BIÊN LAI THU TIỀN</h4>
                <h6>Ngày {{ $receipt->created_at->format('d-m-Y') }}</h6>
            </div>
            <div class="content">
                <div><b>Tên người nộp: </b>{{ $receipt->student->TenSV }}</div>
                <div><b>Nội dung thu: </b>Nộp học phí</div>
                <div><b>Số tiền thu: </b>{{ number_format($receipt->SoTienNop, '0', ',', '.') }} đ</div>
                <div><b>Ngày: </b>{{ $receipt->created_at->format('d-m-Y') }}</div>
            </div>
            <br>
            <div class="block-top" style="">
                <table>
                    <tr>
                        <td style="text-align:left">
                            <b>Người nộp tiền</b>
                            <p style="font-style:italic">(Ký, ghi rõ họ tên)</p>
                        </td>
                        <td style="text-align:right">
                            <b>Người thu tiền</b>
                            <p style="font-style:italic">(Ký, ghi rõ họ tên)</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
