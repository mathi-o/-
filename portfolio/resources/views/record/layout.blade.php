<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    </head>
    <header class="header">
        <div>
            <h1 class="header-title">me-trip</h1></h1>
        </div>
    </header>
    <body>
        @yield('contents')
    </body>
    <footer class="footer">
        <div class="footer-title">
            ©webcamp
        </div>
    </footer>
</html>