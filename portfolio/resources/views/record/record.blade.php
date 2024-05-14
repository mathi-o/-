@extends('record.layout')

@section('contents')

<form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        日付:<input name="date" type="date"><br>
        場所:<input name="location" type="text"><br>
        タイトル:<input name="title" type="text"><br>
        写真:<input name="photo" type="file"><br>
        感想:<textarea name="impression" cols="50"></textarea><br>

    <button type="submit">追加する</a></button><br>
    </div>

</form>
@foreach($list as $data)
    <div class="data">
        <td>日付:{{ $data->date}}<br>
        <td>場所:{{ $data->location }}<br>
        <td>タイトル:{{ $data->title }}<br>
        <td>写真:<img src="{{ asset('storage/' . $data->photo) }}" /><br>
        <td>感想:{{ $data->impression }}<br>
    </div>
@endforeach


@endsection
