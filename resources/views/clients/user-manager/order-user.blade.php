@extends('clients.include.main')
<div class="content">
    @section('content')
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
                @if (count($listOrder)>0)
                <table>
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Địa chỉ nhận</th>
                            <th>Người nhận</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tình trạng</th>
                            <th>Thành tiền</th>
                            <th>Chi tiết đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listOrder as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->status }}</td>
                                <td>{{ number_format($item->total) }}</td>
                                <td><a href="chi-tiet-don-hang/{{ $item->id }}"> <i class="fa-regular fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                   <b style="font-size: 20px">Lịch sử mua hàng trống </b> 
                @endif
                
            </div>
        </div>
    @endsection
</div>
</div>
