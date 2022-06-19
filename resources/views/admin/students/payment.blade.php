@extends('admin.students.main')
@section('head')
    <!-- Select2 -->
    <link rel="stylesheet" href="/template/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/template/admin/css/payment.css">
@endsection
@section('content')
    <div class="block-head-2">
        <div class="head-text">
            <a href="/" style="color:black">Trang chủ</a>&ensp;>>&ensp;{{ $title }}
        </div>
    </div>
    <br>
    <div class="text-top"><i class="nav-icon fas fa-users"></i>&ensp;Thông tin cá nhân</div>
    <br>
    <table class="table col-8">
        <tbody>
            <tr>
                <td>Họ tên:</td>
                <td class="infor-student">{{ $student->TenSV }}</td>
                <td>Mã sinh viên:</td>
                <td class="infor-student">{{ $student->MaSV }}</td>
                <td>Ngày sinh:</td>
                <td class="infor-student">{{ strftime('%d-%m-%Y', strtotime($student->NgaySinh)) }}</td>
            </tr>
            <tr>
                <td>Lớp:</td>
                <td class="infor-student">{{ $student->Lop }}</td>
                <td>Ngành:</td>
                <td class="infor-student">{{ $student->class->department->TenKhoa }}</td>
                <td>Khóa:</td>
                <td class="infor-student">{{ 'K' . substr($student->MaSV, 0, 2) . 'DHCQ' }}</td>
            </tr>
        </tbody>
    </table>
    <div class="text-top"><i class="fas fa-dollar-sign"></i>&ensp;Thanh toán</div>
    <br>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="menu">Chủ thẻ</label>
                <input type="text" class="form-control" name="TenCT" id="TenCT" value="{{ old('TenCT') }}"
                    placeholder="Nhập tên chủ thẻ">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="menu">Số thẻ</label>
                <input type="number" class="form-control" name="SoThe" id="SoThe" value="{{ old('SoThe') }}"
                    placeholder="Nhập số thẻ">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="menu">Ngân hàng</label>
                <select class="select2" style="width:100%;" name="NganHang" id="NganHang">
                    <option value="">
                        Vietcombank
                    </option>
                    <option value="">
                        Techcombank
                    </option>
                    <option value="">
                        Viettinbank
                    </option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="menu">Số tiền nộp</label>
                <input type="number" class="form-control" name="SoTien" id="SoTien" value="{{ old('TenSV') }}"
                    placeholder="Nhập số tiền">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="menu">Email</label>
                <input type="email" class="form-control" name="Email" id="Email" value="{{ old('Email') }}"
                    placeholder="Nhập email">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="menu">Nội dung nộp</label>
                <textarea type="text" class="form-control" name="NoiDung" id="NoiDung" placeholder="Nhập nội dung"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group"><button class="btn-checkout" type="submit" onclick="openForm()"><i
                        class="fas fa-dollar-sign"></i> Thanh
                    toán</button>
            </div>
        </div>
    </div>
    <div class="form-popup" id="myForm">
        <form action="" method="POST" class="form-container">
            <h3>Xác nhận</h3>
            <table>
                <tr>
                    <td><label><b>Chủ thẻ</b></label></td>
                    <td><input type="text" class="form-control" id="TenCT2" readonly></td>
                </tr>
                <tr>
                    <td><label><b>Số thẻ</b></label></td>
                    <td><input type="text" class="form-control" id="SoThe2" readonly></td>
                </tr>
                <tr>
                    <td><label><b>Ngân hàng</b></label></td>
                    <td><input type="text" class="form-control" id="NganHang2" name="TenNT" readonly></td>
                </tr>
                <tr>
                    <td><label><b>Số tiền</b></label></td>
                    <td><input type="text" class="form-control" id="SoTien2" name="SoTienNop" readonly></td>
                </tr>
                <tr>
                    <td><label><b>Email</b></label></td>
                    <td><input type="text" class="form-control" id="Email2" name="Email" readonly></td>
                </tr>
                <tr>
                    <td><label><b>Nội dung</b></label></td>
                    <td><input type="text" class="form-control" id="NoiDung2" readonly></td>
                </tr>
            </table>
            <button type="submit" class="btn"><i class="fas fa-save"></i>&ensp;Xác
                nhận</button>
            <a class="btn" onclick="closeForm()"><i class="fas fa-window-close"></i>&ensp;Đóng</a>
            @csrf
        </form>
    </div>

    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
    <script>
        function openForm() {
            if (document.getElementById("TenCT").value == "") {
                alert("Chưa nhập tên chủ thẻ!");
            } else if (document.getElementById("SoThe").value == "") {
                alert("Chưa nhập số thẻ!");
            } else if (document.getElementById("SoTien").value == "") {
                alert("Chưa nhập số tiền!");
            } else if (document.getElementById("Email").value == "") {
                alert("Chưa nhập email!");
            } else if (document.getElementById("NoiDung").value == "") {
                alert("Chưa nhập nội dung!");
            } else {
                var select = document.getElementById("NganHang");
                document.getElementById("TenCT2").value = document.getElementById("TenCT").value;
                document.getElementById("SoTien2").value = document.getElementById("SoTien").value;
                document.getElementById("SoThe2").value = document.getElementById("SoThe").value;
                document.getElementById("NganHang2").value = select.options[select.selectedIndex].text;
                document.getElementById("Email2").value = document.getElementById("Email").value;
                document.getElementById("NoiDung2").value = document.getElementById("NoiDung").value;
                document.getElementById("myForm").style.display = "block";
            }
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
@endsection
