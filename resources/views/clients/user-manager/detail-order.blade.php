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
                <div class="card shadow mb-4">
                    <div class="card__title">
                        <p style="font-size: 19px;font-weight: 600;padding:10px">{{ $title }} {{ $order->id }}</p>
                    </div>
                    <table cellspacing="0" cellpadding="5">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Lời nhắn</th>
                                <th>Trạng thái</th>
                                <th>Ngày đặt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->note }}</td>
                                <td>
                                    {{ $order->status }}
                                </td>
                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table-detail" cellspacing="0" cellpadding="5">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $order)
                                <tr>
                                    <td class="img-detail"><img src="/image/product/{{ $order->products->image }}"
                                            alt="">
                                    </td>
                                    <td>{{ $order->products->name }}</td>
                                    <td>{{ number_format($order->price) }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ number_format($order->price * $order->quantity) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="frame-totals">
                        <b style="float: right;padding:20px 5px;font-size:16px">Tổng tiền: {{ number_format($total) }}</b>
                    </div>
                </div>
                @if ($status == 'Tiếp nhận')
                    <form action="" method="post">
                        <div style="display: flex;justify-content: flex-end;">
                            <button style="font-size: 16px" class="btn btn-danger">Hủy đơn hàng</button>
                        </div>
                    </form>
                @endif
                @if ($status == 'Vận chuyển')
                    <div style="display: flex;justify-content: space-between;">
                        <button style="font-size: 16px" class="btn btn-danger" disabled>Hủy đơn hàng</button>
                        <button style="font-size: 16px" class="btn btn-success">Hoàn thành</button>
                    </div>
                @endif
            </div>
        </div>
    @endsection
</div>
</div>
