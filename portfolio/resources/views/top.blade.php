@extends('layout')
@section('google_map_api')
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzPhFReLV1lb2EafPtr0eWZR6Mr_xiIjs&callback=initMap"></script>
<script>
    function initMap() {
        var latlng = new google.maps.LatLng(35.682839, 139.759455);

        var map = new google.maps.Map(document.getElementById('map'), {
            center: latlng,
            zoom: 7
        });

        var prefectures = [
            { name: '北海道', position: {lat: 43.064310, lng: 141.346879} },
            { name: '青森県', position: {lat: 40.824589, lng: 140.740548} },
            { name: '岩手県', position: {lat: 39.703526, lng: 141.152696} },
            { name: '宮城県', position: {lat: 38.268579, lng: 140.872072} },
            { name: '秋田県', position: {lat: 39.718626, lng: 140.102381} },
            { name: '山形県', position: {lat: 38.240434, lng: 140.363690} },
            { name: '福島県', position: {lat: 37.750029, lng: 140.467771} },
            { name: '茨城県', position: {lat: 36.341737, lng: 140.446824} },
            { name: '栃木県', position: {lat: 36.565912, lng: 139.883592} },
            { name: '群馬県', position: {lat: 36.390688, lng: 139.060453} },
            { name: '埼玉県', position: {lat: 35.857033, lng: 139.649012} },
            { name: '千葉県', position: {lat: 35.604560, lng: 140.123154} },
            { name: '東京都', position: {lat: 35.689501, lng: 139.691722} },
            { name: '神奈川県', position: {lat: 35.447734, lng: 139.642537} },
            { name: '新潟県', position: {lat: 37.902451, lng: 139.023245} },
            { name: '富山県', position: {lat: 36.695265, lng: 137.211305} },
            { name: '石川県', position: {lat: 36.594606, lng: 136.625669} },
            { name: '福井県', position: {lat: 36.065209, lng: 136.221720} },
            { name: '山梨県', position: {lat: 35.664108, lng: 138.568455} },
            { name: '長野県', position: {lat: 36.651306, lng: 138.180904} },
            { name: '岐阜県', position: {lat: 35.391174, lng: 136.723657} },
            { name: '静岡県', position: {lat: 34.976944, lng: 138.383056} },
            { name: '愛知県', position: {lat: 35.180209, lng: 136.906582} },
            { name: '三重県', position: {lat: 34.730278, lng: 136.508611} },
            { name: '滋賀県', position: {lat: 35.004513, lng: 135.868568} },
            { name: '京都府', position: {lat: 35.021242, lng: 135.755613} },
            { name: '大阪府', position: {lat: 34.686344, lng: 135.520037} },
            { name: '兵庫県', position: {lat: 34.691257, lng: 135.183078} },
            { name: '奈良県', position: {lat: 34.685274, lng: 135.832861} },
            { name: '和歌山県', position: {lat: 34.226111, lng: 135.167500} },
            { name: '鳥取県', position: {lat: 35.503449, lng: 134.238261} },
            { name: '島根県', position: {lat: 35.472293, lng: 133.050520} },
            { name: '岡山県', position: {lat: 34.661739, lng: 133.935032} },
            { name: '広島県', position: {lat: 34.396558, lng: 132.459646} },
            { name: '山口県', position: {lat: 34.186041, lng: 131.470654} },
            { name: '徳島県', position: {lat: 34.065761, lng: 134.559286} },
            { name: '香川県', position: {lat: 34.340112, lng: 134.043291} },
            { name: '愛媛県', position: {lat: 33.841642, lng: 132.765682} },
            { name: '高知県', position: {lat: 33.559722, lng: 133.531111} },
            { name: '福岡県', position: {lat: 33.606389, lng: 130.417968} },
            { name: '佐賀県', position: {lat: 33.249351, lng: 130.298792} },
            { name: '長崎県', position: {lat: 32.750040, lng: 129.867251} },
            { name: '熊本県', position: {lat: 32.789800, lng: 130.741584} },
            { name: '大分県', position: {lat: 33.238130, lng: 131.612645} },
            { name: '宮城県', position: {lat: 31.911034, lng: 131.423887} },
            { name: '鹿児島県', position: {lat: 31.560171, lng: 130.558025} },
            { name: '沖縄県', position: {lat: 26.212445, lng: 127.680922} },
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
    <h1>都道府県リスト</h1>
    <div class="box">
        <div class="container">
            @foreach ($prefectures as $prefecture)
                <div class="prefecture">
                    <button><a href="{{ route('record',['name'=>$prefecture]) }}">{{ $prefecture }}</a></button>
                </div>
            @endforeach
        </div>
    </div><br>

    <h1>日本地図</h1>
    <div id="map"></div>

    
@endsection

