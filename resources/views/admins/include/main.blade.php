<!DOCTYPE html>
<html lang="en">

<head>
    @include('admins.include.head')
</head>
<?php
$admin = Auth::guard('admin')->user()->name;
?>

<body>
    <div class="app">
        <div class="grid">
            <div class="header">
                <div class="header__logo"></div>
                <div class="header__icon">
                    <div class="icon__login">
                        @if (Auth::guard('admin')->check())
                            <span>
                                {{ $admin }} </span>
                            <a href="/dang-xuat">Đăng xuất</a>
                        @else
                            <i class="fa-solid fa-user"></i>
                            <i class="fa-solid fa-sort-down"></i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="wrap">
                @include('admins.include.sidebar')
                <div class="content">
                    @include('admins.include.alert')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/admin/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    @stack('scripts')

</body>

</html>
