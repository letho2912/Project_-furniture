@extends('clients.include.main')
<?php
$total = 0;
$i = 1;
?>
<div class="content">
    @section('content')
        <div id="container">
            <h3>Chúc mừng bạn đã đặt thành công đơn hàng. Vui lòng chờ nhận điện thoại để xác nhận với nhân viên. </h3>
            <p>Theo dõi
                tình
                trạng đơn hàng <a href="/trang-chu/tai-khoan/lich-su-mua-hang">tại đây</a></p>
            <p>Lưu ý: Nếu có thay đổi gì, vui lòng liên hệ với chúng tôi trước khi đơn hàng được vận chuyển</p>
        </div>
    @endsection
</div>
