{{-- @php $menusHtml = ; @endphp --}}
<header id="header">
    <div class="grid">
        <div class="header__top">
            <div class="header__logo cols-4">
                <a href="#" class="header--link">
                    <img src="/admin/assets/img/thiet-ke-web-vietads-11.png" alt="" class="header__logo-img">
                </a>
            </div>
            <div class="header__place cols-3">
                <div class="header__place-icon">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                </div>
                <div class="header__place-text">
                    <p>Địa chỉ Showrom</p>
                    <strong class="header__place-add">28/168 Trần Phú, Phước Vĩnh, Huế</strong>
                </div>
            </div>
            <div class="header__hotline cols-2">
                <div class="header__hotline-icon">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                </div>
                <div class="header__hotline-text">
                    <p>Hotline</p>
                    <strong class="header__hotline-phone">
                        +(84) 343 444 290
                    </strong>
                </div>
            </div>
            <div class="header__support cols-3">
                <div class="header__support-icon">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="header__support-text">
                    <p>Email</p>
                    <strong class="header__support-email">
                        ashley@gmail.com
                    </strong>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="nav__menu">
    <ul class="nav__menu-list">
        <li>
            <a href="/trang-chu" class="nav__menu-icon">
                <i class="fa fa-home" aria-hidden="true"></i>
                Trang chủ
            </a>
        </li>
        <li>
            <a href="/trang-chu/san-pham">
                Sản phẩm
            </a>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            <ul class="nav__menu-sub">
                @foreach ($cate as $item)
                    <li class="nav__menu-sub-item">
                        <a
                            href="/trang-chu/danh-muc/{{ $item->id }}-{{ Str::slug($item->name, '-') }}">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="/trang-chu/tin-tuc">Tin tức</a>
        </li>
        <li>
            <a href="/trang-chu/dich-vu">Dịch vụ</a>
        </li>
        <li>
            <a href="#sp">Tư vấn</a>
        </li>
        <li>
            <a href="/trang-chu/lien-he">Liên hệ</a>
        </li>
    </ul>
    <ul class="nav-form-search">
        <form action="{{ route('searchHome') }}" method="GET">
            <input type="text" placeholder="Tìm kiếm.." name="tu_khoa">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </ul>
    <ul class="nav-menu-icon">
        @if (Auth::check())
            <a href="{{ route('managerHome') }}">{{ Auth::user()->name }}</a>
        @else
            <li>
                <a href="/trang-chu/dang-nhap" title="Đăng nhập"><i class="fa-solid fa-circle-user"></i></a>
            </li>
        @endif

        <li>
            <a class="fa fa-shopping-cart" href="/trang-chu/gio-hang" aria-hidden="true"
                title="Có {{ count((array) session('cart')) }} sản phẩm">
                <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </a>
        </li>
    </ul>
    <div id="mobile-menu" class="mobile__menu-btn">
        <i class="menu__icon fa fa-bars" aria-hidden="true"></i>
    </div>
</div>

{{-- <div class="row">
    <div class="col-lg-12 col-sm-12 col-12 main-section">
        <div class="dropdown">
            <button type="button" class="btn btn-info" data-toggle="dropdown">
                <a class="fa fa-shopping-cart" aria-hidden="true"></a> Cart <span
                    class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </button>
            <div class="dropdown-menu">
                <div class="row total-header-section">
                    <div class="col-lg-6 col-sm-6 col-6">
                        <a class="fa fa-shopping-cart" href="/home/cart" aria-hidden="true"><span
                                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </a>
                    </div>

                    <?php $total = 0; ?>
                    @foreach ((array) session('cart') as $id => $details)
                        <?php $total += $details['sale'] * $details['quantity']; ?>
                    @endforeach

                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                        <p>Total: <span class="text-info"> {{ number_format($total) }}</span></p>
                    </div>
                </div>

                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        <div class="row cart-detail">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="{{ $details['image'] }}" />
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <p>{{ $details['name'] }}</>
                                    <span class="price text-info"> ${{ $details['sale'] }}</span> <span class="count">
                                        Số lượng:{{ $details['quantity'] }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                        <a href="{{ url('/home/cart') }}" class="btn btn-primary btn-block">Xem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
