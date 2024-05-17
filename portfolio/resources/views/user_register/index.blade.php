@extends('layout')

@section('contents')
    @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
    @endif
    <h1>新規登録</h1>
        <form action="/register" method="post">
            @csrf
            名前:<input name="name" value="{{old('name')}}"><br>
            email:<input name="email" value="{{old('email')}}"><br>
            password:<input name="password" type="password"><br>
            password(再度):<input name="password_confirmation" type="password"><br>
            <button>登録する</button>
        </form>
@endsection