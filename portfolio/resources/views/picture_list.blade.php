@extends('layout')

@section('contents')
       <h1>写真一覧</h1>
        <div class="picture">
            @foreach($record as $data)
                <div class="picture-item">
                    <img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $data->title }}" width="250">
                    <p>{{ $data->prefecture }}:{{$data->location}}</p>
                </div>
            @endforeach
        </div>

    <div class="title">
        <a href="{{route('top')}}">都道府県リストに戻る</a>
    </div>
@endsection