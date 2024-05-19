<!DOCTYPE>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>写真一覧</title>
    </head>
    <body>
       <h1>写真一覧</h1>
        <div>
            @foreach($record as $data)
                    <img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $data->title }}" width="200">
                <p>{{ $data->prefecture }}:{{$data->location}}</p>

            @endforeach

        </div>


    <a href="{{route('top')}}">都道府県リストに戻る</a>
    </body>
</html>