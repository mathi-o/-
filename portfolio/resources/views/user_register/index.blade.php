@extends('record.layout')

@section('contents')

    <div class="main-box">
        <div class="index">
            <h1>新規登録</h1>
            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
                <form action="/register" method="post">
                @csrf

                <div>
                    <label for="name">名前</label>
                    <div>
                        <input name="name" value="{{old('name')}}" >
                    </div>
                </div>
                <div>
                    <label for="email">Email</label>
                    <div>
                        <input name="email" type="email" autocomplete="email">
                    </div>
                </div>
                <div>
                    <label for="password">password</label>
                    <div>
                        <input name="password" type="password">
                    </div>
                </div>
                <div>
                    <label for="password">password(確認)</label>
                    <div>
                        <input name="password_confirmation" type="password">
                    </div>
                </div>
                <button style="margin:10 10 0 0 ">登録する</button>
                <button style="margin-top:10"><a href="{{route('front.index')}}" class="a-tagu">戻る</a></button>
            </form>
        </div>
    </div>
@endsection