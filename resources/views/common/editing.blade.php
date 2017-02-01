<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MikMak Webshop - @yield('title')</title>
    <link href="{{ secure_asset('css/mikmak.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <a id="burger" href="/home/admin">&#9776;</a>
        <h1>MikMakWebshop</h1>
    </header>
    <main>
        <div id="tiles">
            <div id="contols">
                <div id="model">
                    <label class="@yield('lblcls')">@yield('model')</label>
                    @yield('ctrls')
                </div>
                @yield('content')
            </div>
            <div id="list">
                @yield('list')
            </div>
        </div>
    </main>
    <footer>
        @yield('footer')
    </footer>
</body>
</html>