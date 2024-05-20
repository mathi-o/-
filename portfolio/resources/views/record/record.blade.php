@extends('layout')

@section('google_map_api')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}&libraries=places"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 35.682839, lng: 139.759455},
                zoom: 7
            });

            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
@endsection

@section('contents')
<div class="title">
    <h1>{{$name}}のページ</h1><br>
    @if(session('front.task_delete_success')==true)
        <div class="session">
            記録を削除しました。<br>
        </div>
    @endif
    @if(session('front.task_upload_success')==true)
        <div class="session">
            記録を追加しました!<br>
            地図の下の「今までの記録」をご覧ください！<br>
        </div>
    @endif
    <h2>新しい記録を追加する</h2>
</div>
    <form action="{{route('upload', ['name' => $name])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        日付:<input name="date" type="date"><br>
        場所:<input name="location" type="text"><br>
        タイトル:<input name="title" type="text"><br>
        写真:<input name="photo" type="file"><br>
        感想:<textarea name="impression" cols="50"></textarea><br>

    <button type="submit">追加する</a></button><br>
    </div>

    </form><br>
    <h2 class="title">記録の周辺情報検索</h2>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id=map></div><br>
<h2 class="title">今までの記録</h2><br>
@foreach($list as $data)
    <div class="data">
        <td>日付:{{ $data->date}}<br>
        <td>場所:{{ $data->location }}<br>
        <td>タイトル:{{ $data->title }}<br>
        <td>写真:<img src="{{ asset('storage/' . $data->photo) }}" width="" /><br>
        <td>感想:{{ $data->impression }}<br>
        <td><button><a href="{{route('edit', ['name' => $name, 'id' => $data->id])}}">編集画面</a></button>
    </div>
@endforeach
<div class="title">
    <a href="{{route('top')}}">都道府県一覧に戻る</a>
</div>
@endsection
