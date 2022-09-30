@extends('clients.include.main')
<div class="content">
    @section('content')
    @if (Auth::check())
        <div class="setting-user">
            <div class="nav__setting-user">
                <div class="img-avt">
                    <img src="/assets/img/imager_2_78183_700.jpg" alt="">
                    <span style="font-weight: 600">{{ Auth::user()->name }}</span>

                </div>
                <ul class="item-setting-user">
                    <li>Thông tin tài khoản</li>
                    <li><a href="{{ route('orderManager') }}"> Lịch sử mua hàng</a></li>
                    <li>Sản phẩm yêu thích</li>
                    <li><a href="{{ route('logoutUser') }}">Đăng xuất</a></li>
                </ul>
            </div>
            <div class="setting-user-form">

            </div>
        </div>         
        @else
            <div>Vui lòng đăng nhập để xem thông tin tài khoản</div>
        @endif
    @endsection
</div>
</div>
