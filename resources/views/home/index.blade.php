<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MikMak Webshop - @yield('title')</title>
    <link href="{{ secure_asset('css/mikmak.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        @yield('header')
        <h1>MikMakWebshop</h1>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @yield('footer')
    </footer>
</body>
</html>