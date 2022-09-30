<title>Đăng nhập</title>
<link rel="stylesheet" href="/client/assets/css/style.css">
<link rel="stylesheet" href="/client/assets/css/responsive.css">
<link rel="stylesheet" href="/client/assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="content">
    <div class="page-register">
        <div class="login-container">
            <p class="title-login">Đăng kí</p>
            @include('clients.include.error')
            <form action="/trang-chu/dang-ki" class="login" method="post">
                <div class="login-form-group">
                    <label for="name">Họ tên: </label><br>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" placeholder="Nguyễn Văn A">
                </div>
                <div class="login-form-group">
                    <label for="email">Email: </label><br>
                    <input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="a123@gmail.com">
                </div>
                <div class="login-form-group">
                    <label for="phone">Số điện thoại: </label><br>
                    <input type="number" name="phone" value="{{ old('phone') }}" id="phone" placeholder="012345678">
                </div>
                <div class="login-form-group">
                    <label for="password">Mật khẩu: </label><br>
                    <div class="icon_hide">
                        <input type="password" name="password" id="password" placeholder=".....">
                        <i class="fa-solid fa-eye" onclick="showPassword()"></i>
                    </div>
                </div>
                <div class="login-form-group">
                    <label for="password_confirmation">Nhập lại mật khẩu: </label><br>
                    <div class="icon_hide">
                        <input type="password" name="password_confirmation" id="password_confirmation">
                        <i class="fa-solid fa-eye" onclick="showPassword1()"></i>
                    </div>
                </div>
                <div class="login-btn">
                    <div class="btn-register">
                        Bạn đã có tài khoản? <a href="/trang-chu/dang-nhap">Đăng nhập</a>
                    </div>
                    <button type="submit">Đăng kí</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/client/assets/js/main.js"></script>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
