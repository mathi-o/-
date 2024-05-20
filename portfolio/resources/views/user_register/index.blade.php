@extends('record.layout')

@section('contents')
    @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
    @endif
    <div class="index">
        <h1>新規登録</h1>
            <form action="/register" method="post">
                @csrf
                名前:<input name="name" value="{{old('name')}}"><br>
                email:<input name="email" value="{{old('email')}}"><br>
                password:<input name="password" type="password"><br>
                password(再度):<input name="password_confirmation" type="password"><br>
                <button>登録する</button>
            </form>
    </div>
@endsection