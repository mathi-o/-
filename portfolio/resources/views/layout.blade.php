<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>日本地図</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @yield('google_map_api')

    </head>
    <header>
        <div class="header">
            <h1 class="header-title">旅行記録サイト</h1>
            <div class="header-menu">
                <a href="{{route('top')}}" class="link">都道府県一覧に戻る</a>
            </div>
            <div class="header-menu">
                <a href="/picture" class="link">写真一覧</a>
            </div>
            <div class="header-menu">
                <a href="{{route('logout')}}" class="link">ログアウト</a>
            </div>
        </div>
    </header>
    <body class="body">
        @yield('contents')
    </body>
    <footer>
        <div class="footer">
            <div class="footer-title">
                ©webcamp
            </div>
        </div>
    </footer>
</html>