@extends('layout')
@section('google_map_api')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}&libraries=places"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 35.682839, lng: 139.759455},
                zoom: 7,
                gestureHandling: 'auto'
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

            @foreach($places as $place)
                var marker = new google.maps.Marker({
                    position: { lat: {{ $place->latitude }}, lng: {{ $place->longitude }} },
                    map: map,
                    title: '{{ $place->location }}'
                });
                markers.push(marker);
            @endforeach
        }

        google.maps.event.addDomListener(window, 'load', initMap);

    function initAutocomplete() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }


                document.getElementById('location').value = place.name;
                document.getElementById('latitude').value = place.geometry.location.lat();
                document.getElementById('longitude').value = place.geometry.location.lng();
            });
        }

        google.maps.event.addDomListener(window, 'load', initAutocomplete);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('file-upload');
            const fileNameDisplay = document.getElementById('filename');

            fileInput.addEventListener('change', function () {
                if (fileInput.files.length > 0) {
                    fileNameDisplay.textContent = fileInput.files[0].name;
                } else {
                    fileNameDisplay.textContent = '';
                }
            });
        });
    </script>
@endsection

@section('contents')
<div class="title">
    <h1>{{$name}}のページ</h1><br>
    <h2>{{$record->location}}の編集画面</h2><br>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <h2>記録を編集する</h2>
</div>
    <form action="{{route('edit_save', ['name' => $name,'id' => $record->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
        日付<br>
        <input name="date" type="date" class="form-text" value="{{$record->date}}"><br>

        場所<br>
        <input name="location" id="location" type="text" class="form-text" value="{{$record->location}}" ><br>

        <input name="latitude" id="latitude" type="hidden" class="form-text" value="{{$record->latitude}}" readonly>

        <input name="longitude" id="longitude" type="hidden" class="form-text" value="{{$record->longitude}}" readonly>

        タイトル<br>
        <input name="title" type="text" class="form-text" value="{{$record->title}}" ><br>

        写真<br>
        <div class="form-group">
            <label for="file-upload" class="file-button">
                 変更したい場合はファイルを選択
            </label>
            <input id="file-upload" type="file" name="photo" >
            <span id="filename"></span>
        </div>

        感想<br>
        <textarea name="impression" rows="3" cols="20" class="form-text">{{$record->impression}}</textarea><br>

    <button>編集完了</button><br><br>
    </form>
    <form action="{{route('delete',['name' => $name,'id' => $record->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button onclick='return confirm("この記録を削除します(削除したら戻せません)。よろしいですか？");'>記録を削除する</button>
    </form>
    </div>

    </form><br>


@endsection
