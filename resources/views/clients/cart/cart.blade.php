@extends('clients.include.main')
<?php
$total = 0;
$i = 1;
?>
<div class="content">
    @section('content')
        <div id="container">
            @if ($amountCart > 0)
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <?php $total += $details['sale'] * $details['quantity']; ?>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="/image/product/{{ $details['image'] }}" alt="" width="100%"></td>
                                    <td>{{ $details['name'] }}</td>
                                    <td>{{ number_format($details['sale']) }}</td>
                                    <td data-th="Quantity"><input type="number" class="quantity" style="width:40px"
                                            name="count" id="count" value="{{ $details['quantity'] }}"></td>
                                    <td>{{ number_format($details['sale'] * $details['quantity']) }}</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-info update-cart" data-id="{{ $id }}"><i
                                                class="fa-sharp fa-solid fa-rotate"></i></button>
                                        <button class="btn btn-danger remove-from-cart" data-id="{{ $id }}"><i
                                                class="fa-sharp fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tbody>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th> Tổng tiền: {{ number_format($total) }}</th>
                        </tr>
                    </tbody>
                </table>
                <div class="btn__cart-table">
                    <a href="/trang-chu" class="btn btn-secondary">Tiếp tục mua hàng</a>
                    <a href="/trang-chu/thanh-toan" class="btn btn-success">Thanh toán</a>
                </div>
            @else
                Giỏ hàng trống
            @endif

        </div>
    @endsection
</div>
