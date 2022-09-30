<title>Đăng nhập</title>
<link rel="stylesheet" href="/client/assets/css/style.css">
<link rel="stylesheet" href="/client/assets/css/responsive.css">
<link rel="stylesheet" href="/client/assets/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="content">
    <div class="page-login">
        <div class="login-container">
            <p class="title-login">Đăng nhập</p>
            @include('clients.include.error')
            <form action="/trang-chu/dang-nhap" class="login" method="post">
                <div class="login-form-group">
                    <label for="email">Tên đăng nhập: </label><br>
                    <input type="text" name="email" value="{{ old('email') }}" id=""
                        placeholder="Tên đăng nhập">
                </div>
                <div class="login-form-group">
                    <label for="password">Mật khẩu: </label><br>
                    <div class="icon_hide">
                        <input type="password" name="password" id="password" autocomplete="current-password"
                            placeholder="Mật khẩu">
                        <i class="fa-solid fa-eye" onclick="showPassword()"></i>
                    </div>
                </div>
                <div class="login-form-group">
                    <input type="checkbox" name="" id=""> Nhớ mật khẩu
                </div>
                <div class="btn-register">
                    Bạn chưa có tài khoản? <a href="/trang-chu/dang-ki">Đăng kí</a>
                </div>
                <div class="login-btn">
                    <a href="">Quên mật khẩu?</a>
                    <button type="submit">Đăng nhập</button>
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
