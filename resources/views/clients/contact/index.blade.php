@extends('clients.include.main')
@section('content')
    <div id="container">
        <div class="contact-home">
            <div class="map-contact">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.482350679887!2d107.58375391417485!3d16.451096033462136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a152ffbcac3f%3A0xff4c443207926dd9!2zMjgsIDE2OCBUcuG6p24gUGjDuiwgUGjGsOG7m2MgVsSpbmgsIFRow6BuaCBwaOG7kSBIdeG6vywgVGjhu6thIFRoacOqbiBIdeG6vywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1662753850959!5m2!1svi!2s"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="form-contact">
                <h1>Liên hệ với chúng tôi</h1>
                @include('clients.include.error')
                <form action="" id="form1" method="POST">
                    <input type="text" id="fname" name="name" placeholder="Họ tên"><br>
                    <input type="email" id="femail" name="email" placeholder="Địa chỉ Email"><br>
                    <input type="text" id="fphone" name="phone" placeholder="Số điện thoại"><br>
                    <input type="text" id="fcontent" name="message" placeholder="Lời nhắn..."><br>
                    <input type="submit" value="Gửi yêu cầu">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
