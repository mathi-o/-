@extends('layout')
@section('google_map_api')
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzPhFReLV1lb2EafPtr0eWZR6Mr_xiIjs&callback=initMap"></script>
<script>
    function initMap() {
        var latlng = new google.maps.LatLng(35.682839, 139.759455);

        var map = new google.maps.Map(document.getElementById('map'), {
            center: latlng,
            zoom: 7,
            gestureHandling: 'auto'
        });

        var prefectures = [
            { name: '北海道', position: {lat: 43.064310, lng: 141.346879} },
            { name: '青森', position: {lat: 40.824589, lng: 140.740548} },
            { name: '岩手', position: {lat: 39.703526, lng: 141.152696} },
            { name: '宮城', position: {lat: 38.268579, lng: 140.872072} },
            { name: '秋県', position: {lat: 39.718626, lng: 140.102381} },
            { name: '山形', position: {lat: 38.240434, lng: 140.363690} },
            { name: '福島', position: {lat: 37.750029, lng: 140.467771} },
            { name: '茨城', position: {lat: 36.341737, lng: 140.446824} },
            { name: '栃木', position: {lat: 36.565912, lng: 139.883592} },
            { name: '群馬', position: {lat: 36.390688, lng: 139.060453} },
            { name: '埼玉', position: {lat: 35.857033, lng: 139.649012} },
            { name: '千葉', position: {lat: 35.604560, lng: 140.123154} },
            { name: '東京', position: {lat: 35.689501, lng: 139.691722} },
            { name: '神奈川', position: {lat: 35.447734, lng: 139.642537} },
            { name: '新潟', position: {lat: 37.902451, lng: 139.023245} },
            { name: '富山', position: {lat: 36.695265, lng: 137.211305} },
            { name: '石川', position: {lat: 36.594606, lng: 136.625669} },
            { name: '福井', position: {lat: 36.065209, lng: 136.221720} },
            { name: '山梨', position: {lat: 35.664108, lng: 138.568455} },
            { name: '長野', position: {lat: 36.651306, lng: 138.180904} },
            { name: '岐阜', position: {lat: 35.391174, lng: 136.723657} },
            { name: '静岡', position: {lat: 34.976944, lng: 138.383056} },
            { name: '愛知', position: {lat: 35.180209, lng: 136.906582} },
            { name: '三重', position: {lat: 34.730278, lng: 136.508611} },
            { name: '滋賀', position: {lat: 35.154312, lng: 136.175621} },
            { name: '京都', position: {lat: 35.021242, lng: 135.755613} },
            { name: '大阪', position: {lat: 34.686344, lng: 135.520037} },
            { name: '兵庫', position: {lat: 34.691257, lng: 135.183078} },
            { name: '奈良', position: {lat: 34.685274, lng: 135.832861} },
            { name: '和歌山', position: {lat: 34.226111, lng: 135.167500} },
            { name: '鳥取', position: {lat: 35.503449, lng: 134.238261} },
            { name: '島根', position: {lat: 35.472293, lng: 133.050520} },
            { name: '岡山', position: {lat: 34.661739, lng: 133.935032} },
            { name: '広島', position: {lat: 34.396558, lng: 132.459646} },
            { name: '山口', position: {lat: 34.186041, lng: 131.470654} },
            { name: '徳島', position: {lat: 34.065761, lng: 134.559286} },
            { name: '香川', position: {lat: 34.340112, lng: 134.043291} },
            { name: '愛媛', position: {lat: 33.841642, lng: 132.765682} },
            { name: '高知', position: {lat: 33.559722, lng: 133.531111} },
            { name: '福岡', position: {lat: 33.606389, lng: 130.417968} },
            { name: '佐賀', position: {lat: 33.249351, lng: 130.298792} },
            { name: '長崎', position: {lat: 32.750040, lng: 129.867251} },
            { name: '熊本', position: {lat: 32.789800, lng: 130.741584} },
            { name: '大分', position: {lat: 33.238130, lng: 131.612645} },
            { name: '宮城', position: {lat: 31.911034, lng: 131.423887} },
            { name: '鹿児島', position: {lat: 31.560171, lng: 130.558025} },
            { name: '沖縄', position: {lat: 26.212445, lng: 127.680922} },
        ];

        prefectures.forEach(function(prefecture) {
            var marker = new google.maps.Marker({
                position: prefecture.position,
                map: map,
                title: prefecture.name
            });

            marker.addListener('click', function() {
                window.location.href = 'https://38fbb47958c0424b875ee9cb7ea5f32a.vfs.cloud9.ap-northeast-1.amazonaws.com/record/' + prefecture.name;
            });
        });
    }

    window.addEventListener('load', initMap);
</script>
@endsection
@section('contents')
    <h1 class="main-title">都道府県リスト</h1>
    <div>
        <div class="container">
            <h2 class="title">北海道地方</h2>
            <div class="hokkaidou">
                @foreach ($hokkaidou as $prefecture)
                    <div>
                        <button><a href="{{ route('record',['name'=>$prefecture]) }}">{{ $prefecture }}</a></button>
                    </div>
                @endforeach
            </div>
            <h2 class="title">東北地方</h2>
            <div class="touhoku">
                @foreach ($touhoku as $prefecture)
                    <div>
                        <button><a href="{{ route('record',['name'=>$prefecture]) }}">{{ $prefecture }}</a></button>
                    </div>
                @endforeach
            </div>
            <h2 class="title">関東地方</h2>
            <div class="kanntou">
                @foreach ($kanntou as $prefecture)
                    <div>
                        <button><a href="{{ route('record',['name'=>$prefecture]) }}">{{ $prefecture }}</a></button>
                    </div>
                @endforeach
            </div>
            <div class="space"></div>
            <h2 class="title">中部地方</h2>
            <div class="tyuubu">
                @foreach ($tyuubu as $prefecture)
                    <div>
                        <button><a href="{{ route('record',['name'=>$prefecture]) }}">{{ $prefecture }}</a></button>
                    </div>
                @endforeach
            </div>
            <h2 class="title">近畿地方</h2>
            <div class="kinnki">
                @foreach ($kinnki as $prefecture)
                    <div>
                        <button><a href="{{ route('record',['name'=>$prefecture]) }}">{{ $prefecture }}</a></button>
                    </div>
                @endforeach
            </div>
            <div class="space"></div>
            <h2 class="title">中国地方</h2>
            <div class="tyuugoku">
                @foreach ($tyuugoku as $prefecture)
                    <div>
                        <button><a href="{{ route('record',['name'=>$prefecture]) }}">{{ $prefecture }}</a></button>
                    </div>
                @endforeach
            </div>
            <h2 class="title">四国地方</h2>
            <div class="sikoku">
                @foreach ($sikoku as $prefecture)
                    <div>
                        <button><a href="{{ route('record',['name'=>$prefecture]) }}">{{ $prefecture }}</a></button>
                    </div>
                @endforeach
            </div>
            <h2 class="title">九州地方</h2>
            <div class="kyusyu">
                @foreach ($kyusyu as $prefecture)
                    <div>
                        <button><a href="{{ route('record',['name'=>$prefecture]) }}">{{ $prefecture }}</a></button>
                    </div>
                @endforeach
            </div>
        </div>
    </div><br><br><br>

    <h1 class="main-title">日本地図</h1>
    <div id="map"></div>


@endsection

