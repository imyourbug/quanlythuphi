<div class="block-header">
    <div class="block-1">
        <div class="block-1-image">
            <a href="{{ route('home') }}"><img src="/template/admin/image/logo.png" height="60px"
                    alt="Smiley face"></a>&ensp;
            <div>Đại học<br>Kinh tế - Tài chính</div>
        </div>

        <div class="block-1-right">
            <form method="GET" action="/search/">
                <div class="search-bar">
                    <input class="text-search" value="{{ request()->input('content-search') }}"
                        placeholder="Nhập tìm kiếm" name="content-search">
                    <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <div class="in_right">
                @if (Session::get('user') !== null)
                    @if (Session::get('user')->roles == 1)
                        <a href="{{ route('admin.home') }}"><i class="fas fa-user-circle"></i>
                            {{ Session::get('user')->name }}
                        </a>&ensp;
                    @else
                        <a href="{{ route('changepass') }}"><i class="fas fa-user-circle"></i>
                            {{ Session::get('user')->name }}
                        </a>&ensp;
                    @endif
                @else
                    <a href="{{ route('login') }}"><i class="fas fa-user-circle"></i> Tài khoản
                    </a>&ensp;
                @endif&ensp;
                <a href="{{ route('logout') }}" onclick="return confirm('Bạn có muốn đăng xuất?')"><i
                        class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            </div>
        </div>
    </div>
    <div class="menu">
        <ul>
            <li class="in-menu" style="width: 140px"><a href="{{ route('home') }}"><i
                        class="nav-icon fas fa-bars"></i>
                    Trang chủ</a></li>
            <li class="in-menu" style="width: 140px"><a href="{{ route('regis-subject') }}">
                    Đăng ký tín chỉ</a></li>
            <li class="in-menu" style="width: 140px"><a href="#">
                    Học phí</a>
                <ul class="sub-menu">
                    <li class="in-menu"><a href="{{ route('tuition') }}">
                            Tra cứu học phí</a></li>
                    <li class="in-menu"><a href="{{ route('tuition.payment') }}">
                            Nộp học phí</a></li>
                </ul>
            </li>
            <li class="in-menu" style="width: 170px"><a href="{{ route('information') }}">
                    Thông tin cá nhân</a></li>
        </ul>
    </div>
</div>
