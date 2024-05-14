@extends('layout')

@section('contents')
<h1>ログイン</h1>
<form action="/login" method="post">
    @csrf
    email:<input name="email" value="{{ old('email') }}"><br>
    password:<input name="password" type="password"><br>
    <button>ログインする</button><br>
    
</form>
<a href="/register">新規登録</a>

@endsection