@extends('record.layout')

@section('contents')
<div class="index">
    <h1>ログイン</h1>
    @if( session('front.task_register_success' == true) )
        登録しました！<br>
    @endif

    <form action="/login" method="post">
        @csrf
        email:<input name="email" value="{{ old('email') }}"><br>
        password:<input name="password" type="password"><br>
        <button>ログインする</button><br>
    </form>
    <a href="/register">新規登録</a>
</div>
@endsection