@extends('admin.students.main')
@section('content')
    <div class="banner">
        <img src="/template/admin/image/bannerUTT.png" width="100%" height="300px">
    </div>
    <br>
    <div class="title">
        <div class="coltitle">
            <span id="nocation">THÔNG BÁO CHUNG</span>
            <hr>
        </div>
    </div>
    <div class="content">
        <div class="block">
            <div>
                <img src="/template/admin/image/Anh1.jpg" width="100%" height="140px" id="block">
                <div class="contentblock">
                    <div class="link">
                        <a
                            href="https://utt.edu.vn/tuyensinh/tuyen-sinh/dai-hoc-chinh-quy/diem-chuan-trung-tuyen-dai-hoc-he-chinh-quy-theo-phuong-thuc-xet-diem-thi-thpt-2021-co-so-ha-noi-a13659.html">Điểm
                            chuẩn trúng tuyển Đại học Hệ chính quy theo phương thức xét điểm thi THPT 2021 - Cơ sở
                            Hà Nội</a>
                    </div>
                    <hr>
                    <div id="Tin">
                        <span>Hôm nay 15/9, Hội đồng tuyển sinh đã công
                            bố điểm chuẩn trúng tuyển Đại học hệ Chính quy năm 2021 đối với phương thức xét điểm thi
                            tốt nghiệp THPT. Theo đó, trong các ngành xét tuyển thì điểm cao nhất là 25.7 đối với
                            ngành Logistics và quản lý chuỗi cung ứng</span>
                    </div>
                    <hr align="left" style="width: 120px;">
                    <div id="timeupdate">
                        <span>{{ now()->format('d/m/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="block">
            <img src="/template/admin/image/Anh2.jpg" width="100%" height="140px" id="block">
            <div class="contentblock">
                <div class="link">
                    <a
                        href="https://utt.edu.vn/tuyensinh/tuyen-sinh/dai-hoc-chinh-quy/huong-dan-quy-trinh-nhap-hoc-danh-cho-sinh-vien-k72-phuong-thuc-xet-diem-thi-thpt-a13658.html">Hướng
                        dẫn quy trình nhập học dành cho sinh viên K72 - Phương thức xét điểm thi THPT</a>
                </div>
                <hr>
                <div id="Tin"><span>Trường Đại học Công nghệ GTVT hướng dẫn quy trình nhập học trực tuyến cho
                        sinh viên Khóa 72 xét theo phương thức xét điểm thi THPT năm 2021. Thời gian xác nhận
                        nhập học từ ngày 16/9/2021 đến 17h00 ngày 26/9/2021. Thời gian nhập học từ 16/9 đến hết
                        17h00 ngày 30/9/2021</span>
                </div>
                <hr align="left" style="width: 120px;">
                <div id="timeupdate">
                    <span>{{ now()->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
        <div class="block">
            <img src="/template/admin/image/Anh3.jpg" width="100%" height="140px" id="block">
            <div class="contentblock">
                <div class="link">
                    <a
                        href="https://utt.edu.vn/utt/tin-tuc/truong-dh-cong-nghe-gtvt-san-sang-chao-don-tan-sinh-vien-k72-a13663.html">Trường
                        ĐH Công nghệ GTVT sẵn sàng chào đón tân sinh viên K72</a>
                </div>
                <hr>
                <div id="Tin">
                    <span id="Tin">Nhằm đảm bảo chất lượng đào tạo, Nhà trường đã và đang tích cực đầu tư, cải
                        tạo và hoàn thiện hệ thống cơ sở vật chất, trang thiết bị hiện đại phục vụ giảng dạy,
                        học tập và nghiên cứu cho hơn 10.000 sinh viên.</span>
                </div>
                <hr align="left" style="width: 120px;">
                <div id="timeupdate">
                    <span>{{ now()->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
        <div class="block">
            <img src="/template/admin/image/Anh4.jpg" width="100%" height="140px" id="block">
            <div class="contentblock">
                <div class="link">
                    <a
                        href="https://utt.edu.vn/tuyensinh/tuyen-sinh/dai-hoc-chinh-quy/thong-bao-xac-nhan-nhap-hoc-va-nhap-hoc-dai-hoc-he-chinh-quy-dot-xet-diem-thi-tot-nghiep-thpt-2021-a13662.html">Thông
                        báo xác nhận nhập học và nhập học Đại học hệ chính quy đợt xét điểm thi tốt nghiệp THPT
                        2021</a>
                </div>
                <hr>
                <div id="Tin">
                    <span id="Tin">Hội đồng tuyển sinh Trường Đại học Công nghệ Giao thông vận tải thông báo
                        thời gian xác nhận nhập học và nhập học Đại học hệ chính quy năm 2021 đợt xét điểm thi
                        THPT năm 2021 như sau:</span>
                </div>
                <hr align="left" style="width: 120px;">
                <div id="timeupdate">
                    <span>{{ now()->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="title">
        <div class="coltitle">
            <span>GIỚI THIỆU</span>
            <hr>
        </div>
        <div class="welcome">
            <span>
                Trường Đại học Công nghệ Giao thông Vận tải trực thuộc Bộ Giao thông vận tải là một trường đào tạo
                kỹ sư công nghệ, đa ngành, tiên tiến, hiện đại; một trung tâm văn hóa, khoa học kỹ thuật và chuyển
                giao công nghệ trong lĩnh vực giao thông vận tải lớn nhất phía Bắc Việt Nam. Trường có sứ mệnh đào
                tạo cho ngành giao thông vận tải và đất nước những kỹ sư khoa học kỹ thuật có năng lực và lòng yêu
                nghề, khả năng sáng tạo và tính nhân văn cao.
            </span>
            <img src="/template/admin/image/gioithieu.jpg" width="50%">
            <div class="mota">
                <span>Nhà Hiệu Bộ H1 - Cơ sở Đào tạo Hà Nội</span>
            </div>
            <br>
            <span>
                Hoạt động đào tạo, nghiên cứu khoa học, chuyển giao công nghệ của Nhà trường luôn hướng tới mục tiêu
                mang lại những lợi ích và chất lượng tốt nhất cho xã hội và đất nước, phục vụ chiến lược phát triển
                ngành giao thông vận tải và các ngành kinh tế quốc dân. Nhà trường hàng năm đã đào tạo cho đất nước
                hàng vạn Kỹ sư với chất lượng chuyên môn tốt, kỹ năng làm việc tốt, lòng yêu nghề cao.
            </span>
            <br>
            <br>

            Đội ngũ Nhà giáo và cán bộ quản lý của Nhà trường hiện có 671 cán bộ; trong đó có 486 Giảng viên với 02
            Phó Giáo sư, 60 Tiến sỹ, 360 Thạc sỹ. Nhà trường hiện đang đào tạo 12 ngành với 24 chuyên ngành bậc đại
            học, 17 chuyên ngành bậc cao đẳng, 05 chuyên ngành hệ cao đẳng nghề. Quy mô đào tạo của Trường có trên
            20 ngàn sinh viên các hệ, hàng năm Trường tuyển sinh các hệ từ 4.500 - 5.000 sinh viên các hệ. Nhà
            trường luôn là một trong những đơn vị đi đầu trong các hoạt động xã hội, tích cực hưởng ứng các cuộc vận
            động của Đảng, Nhà nước, Bộ Giao thông vận tải và ngành Giáo dục Đào tạo; đóng góp vài trò quan trọng
            trong sự nghiệp xây dựng và bảo vệ Tổ quốc.
            </span>
            <br>
            <br>
            <span>
                Trường Đại học Công nghệ Giao thông Vận tải hướng tới mô hình đại học đa ngành về kỹ thuật, công
                nghệ và kinh tế; trở thành đại học trọng điểm, đào tạo nguồn nhân lực có trình độ cao đáp ứng nhu
                cầu phát triển bền vững ngành giao thông vận tải đất nước; là trung tâm nghiên cứu khoa học có uy
                tín về Giao thông vận tải và một số lĩnh vực khác; có năng lực hội nhập khu vực và Quốc tế; là địa
                chỉ tin cậy của người học, nhà đầu tư và toàn xã hội.
            </span>
            <br>
            <img src="/template/admin/image/gioithieu1.jpg" width="50%">
            <div class="mota">
                <span>
                    Lịch sử trường Đại học Công nghệ Giao thông vận tải
                </span>
            </div>
            <br>
        </div>
    </div>
@endsection
