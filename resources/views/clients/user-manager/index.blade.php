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
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Tổng số đơn hàng</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $amountOrder }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tổng số tiền mua hàng</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ number_format($sumTotal) }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Tổng số sản phẩm</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $amountProduct }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @else
            <div>Vui lòng đăng nhập để xem thông tin tài khoản</div>
        @endif
    @endsection
</div>
</div>
