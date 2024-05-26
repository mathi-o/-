<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>me-trip</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @yield('google_map_api')

    </head>
    <header>
        <div class="header">
            <h1 class="header-title">me-trip</h1>
            <div class="menu-box">
            <div class="header-menu">
                <a href="{{route('HowTo')}}" class="link">How To</a>
            </div>
            <div class="header-menu">
                <a href="{{route('top')}}" class="link">都道府県一覧</a>
            </div>
            <div class="header-menu">
                <a href="/picture" class="link">写真一覧</a>
            </div>
            <div class="header-menu">
                <a href="{{route('logout')}}" class="link">ログアウト</a>
            </div>
            </div>
        </div>
    </header>
    <body>
        <div>
            @yield('contents')
        </div>
    </body>
    <footer>
        <div class="footer-title">
            ©webcamp
        </div>
    </footer>
</html>