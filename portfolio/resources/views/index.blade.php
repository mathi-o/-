@extends('record.layout')

@section('contents')
<div class="main-box">
    <div class="index">
        <h1>ログイン</h1>
        @if( session('front.task_register_success' )== true )
            新規登録しました！<br>
        @endif
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <form action="/login" method="post">
        @csrf
            <div>
                <label for="email">Email</label>
                <div>
                    <input name="email" type="email" autocomplete="email" value="{{old('email')}}">
                </div>
            </div>
            <div>
                <label for="password">password</label>
                <div>
                    <input name="password" type="password">
                </div>
            </div>


            <button style="margin-top:10">ログインする</button>
            </form>
        <button type="button" style="margin-top:10"><a href="/register" class="a-tagu">新規登録</a></button>
    </div>
</div>
@endsection