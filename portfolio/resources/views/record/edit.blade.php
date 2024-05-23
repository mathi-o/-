@extends('layout')

@section('contents')
<div class="title">
    <h1>{{$name}}のページ</h1><br>
    @if(session('front.task_delete_success'==true))
        <div class="session">
            記録を削除しました。<br>
        </div>
    @endif

    <h2>記録を編集する</h2>
</div>
    <form action="{{route('edit_save', ['name' => $name,'id' => $record->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
        日付:<input name="date" type="date" value="{{$record->date}}"><br>
        場所:<input name="location" type="text" value="{{$record->location}}"><br>
        タイトル:<input name="title" type="text" value="{{$record->title}}"><br>
        写真:<input name="photo" type="file"><br>
        感想:<textarea name="impression" cols="50">{{$record->impression}}</textarea><br>

    <button type="submit">編集完了</button><br><br>
    <form action="{{route('delete',['name' => $name,'id' => $record->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button onclick='return confirm("この記録を削除します(削除したら戻せません)。よろしいですか？");'>記録を削除する</button>
    </form>
    </div>

    </form><br>


@endsection
