@extends('clients.include.main')
<?php
$total = 0;
$i = 1;
?>
<div class="content">
    @section('content')
    @if ((session('cart')))
    <form action="" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form_checkout">
            <div class="form__checkout-product">
                <h3>Chi tiết đơn hàng</h3>
                <table class="table__product-checkout">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $details)
                                <?php $total += $details['sale'] * $details['quantity']; ?>
                                <tr>
                                    <td>{{ $id }}</td>
                                    <td><img src="/image/product/{{ $details['image'] }}" alt="" width="100%">
                                    </td>
                                    <td>{{ $details['name'] }}</td>
                                    <input type="hidden" name="name_product" value="{{ $details['name'] }}">
                                    <td>{{ number_format($details['sale']) }}</td>
                                    <td>{{ $details['quantity'] }}</td>
                                    <input type="hidden" name="quantity" value="{{ $details['quantity'] }}">
                                    <td>{{ number_format($details['sale'] * $details['quantity']) }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tbody>
                        @if(Session::has('cart'))
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th> Tổng tiền: {{ number_format($total) }}</th>
                            <input type="hidden" name="total" value="{{ $total }}">
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="form__checkout-info">
                <h3>Thông tin khách hàng</h3>
                <div class="form-group-checkout">
                    <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                        placeholder="Họ tên (*)">
                </div>
                <div class="form-group-checkout">
                    <input type="text" name="address" id="address" value="{{ auth()->user()->address }}"
                        placeholder="Địa chỉ (*)">
                </div>
                <div class="form-group-checkout">
                    <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" disabled
                        placeholder="Địa chỉ email (*)">
                </div>
                <div class="form-group-checkout">
                    <input type="tel" name="phone" id="phone" value="{{ auth()->user()->phone }}"
                        placeholder="Số điện thoại (*)">
                </div>
                <div class="form-group-checkout">
                    <textarea type="text" name="note" id="note" placeholder="Lời nhắn"></textarea>
                </div>
                <div class="form-group-checkout">
                    <span style="padding-right: 20px">
                        <input type="radio" name="payment" id="payment" value="">
                        Thanh toán khi nhận hàng</span>
                    <span>
                        <input type="radio" name="payment" id="payment" value="">
                        Thanh toán qua VNPay</span>
                </div>
            </div>
        </div>
        <div class="btn__cart-table">
            <a href="/trang-chu/gio-hang" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i> Giỏ
                hàng</a>
            <button type="submit" class="btn btn-success">Thanh toán</button>
        </div>
    </form>
    @else
        <p>Giỏ hàng trống</p>
    @endif
      
    @endsection
</div>
