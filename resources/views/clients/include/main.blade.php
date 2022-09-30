<html lang="en">

<head>
    @include('clients.include.head')
</head>

<body>
    <div class="app">
        @include('clients.include.header')
        <div class="content">
            @yield('banner')
            <div id="container">
                @yield('content')
            </div>
        </div>
        @include('clients.include.footer')
    </div>
</body>

</html>
