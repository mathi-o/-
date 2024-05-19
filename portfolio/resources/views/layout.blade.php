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
            <h1>旅行記録サイト</h1>
            <a href="/picture">写真一覧</a>
        </div>
    </header>
    <body>
        @yield('contents')
    </body>
    <footer>
        <div class="footer">
            ©webcamp
        </div>
    </footer>
</html>