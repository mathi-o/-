@extends('layout')

@section('contents')
        <h1>都道府県リスト</h1>
        <ul>
           @foreach ($prefectures as $prefecture)
                <div class="prefectures">
                    <button><a href="{{ route('record',['name'=>$prefecture]) }}">{{ $prefecture }}</a></button>
                </div>
           @endforeach
        </ul>
        <a href="{{route('logout')}}">ログアウト</a>
@endsection