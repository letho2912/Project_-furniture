@extends('admins.include.main')

@section('content')
    <div class="manager-form">
        <div class="card shadow mb-4">
            <div class="card__title">
                <p>{{ $title }}</p>
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
                            <td class="img-detail"><img src="/image/product/{{ $order->products->image }}" alt="">
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
                <b>Tổng tiền: {{ number_format($total) }}</b>
            </div>
        </div>
        <div>
            <a href="/quan-li/don-hang/danh-sach" class="btn btn-outline-success" title="Trở về">Trở về</a>
        </div>
    </div>
@endsection
