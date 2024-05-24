@extends('layout')

@section('contents')
    <div class="main-box">
       <h1 class="title">写真一覧</h1>
       <form action="{{route('picture')}}" method="get">
           <div class="form-group">
               <label for="prefecture">都道府県</label><br>
                <div>
                    <select name="prefecture" class="form-text2">
                        <option value="">すべて</option>
                        @foreach($prefectures as $prefecture)
                            <option value="{{$prefecture}}" {{ request('prefecture') == $prefecture ? 'selected' : '' }}>{{$prefecture}}</option>
                        @endforeach
                    </select>
                </div><br>
                <label for="order">ソート順</label><br>
                <div>
                    <select name="order" class="form-text2">
                        <option value="date_asc" {{ request('order') == 'date_asc' ? 'selected' : '' }}>日付昇順</option>
                        <option value="date_desc" {{request('order') == 'date_desc' ? 'selected' : ''}}>日付降順</option>
                    </select>
                </div><br>
               <button type="submit">絞り込む</button>
           </div>
       </form><br>
        <div class="picture">
            @foreach($sortRecord as $data)
                <div class="picture-item">
                    <img src="{{ Storage::disk('s3')->url($data->photo) }}" alt="{{ $data->title }}">
                    <p>{{ $data->prefecture }}:{{$data->location}}</p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="title">
        <button><a href="{{route('top')}}" class="a-tagu">都道府県リストに戻る</a></button>
    </div>
@endsection