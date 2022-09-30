<html lang="en">

<head>
    @include('admins.include.head')
</head>

<body>
    <div class="page-login">
        <div class="login-container">
            <p class="title-login">Đăng nhập</p>
            @include('admins.include.alert')
            <form action="/quan-li/dang-nhap" class="login" method="post">
                <div class="login-form-group">
                    <label for="email">Email: </label><br>
                    <input type="email" name="email" id="email" placeholder="a123@gmail.com">
                </div>
                <div class="login-form-group">
                    <label for="password">Mật khẩu: </label><br>
                    <input type="password" name="password" id="password" placeholder="Mật khẩu">
                </div>
                <div class="login-form-group">
                    <input type="checkbox" name="remember" id="remember"> Nhớ mật khẩu
                </div>
                <div class="login-btn">
                    <a href="">Quên mật khẩu?</a>
                    <button type="submit">Đăng nhập</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</body>

</html>