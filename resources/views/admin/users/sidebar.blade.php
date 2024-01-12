<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <img src="/template/admin/image/logo.png" alt="AdminLTE Logo" class="brand-image img-square elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">UEF Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/image/logo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('changepass') }}" class="d-block">{{ Session::get('user')->name }}</a>
            </div>
        </div>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Tài khoản
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('user.add') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm tài khoản</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.list') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách tài khoản</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-barcode"></i>
                    <p>
                        Khoa
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('derpartment.list') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách khoa</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        Lớp
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('lop.list') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách lớp</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-inbox"></i>
                    <p>
                        Môn học
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('subject.add') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm môn học</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('subject.list') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách môn học</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-user-graduate"></i>
                    <p>
                        Sinh viên
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('student.add') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm sinh viên</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('student.list') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách sinh viên</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Đối tượng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('discount.list') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách đối tượng</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Phiếu thu
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('receipt.add') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Thêm phiếu thu</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('receipt.list') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách phiếu thu</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-sack-dollar"></i>
                    <p>
                        Học phí
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/tuitions/list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Danh sách học phí</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
