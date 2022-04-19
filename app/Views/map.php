<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DailyLaboratory_Coding_Test</title>
    <style>
        .container {
            width: 100vw;
            height: 100vh;
        }

        .section {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="section">
            <div id="map" style="width:700px;height:700px;"></div>
        </div>
    </div>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=88aa16a70acb90dc881dd869ae25b1b2&libraries=services,clusterer,drawing"></script>
    <script>
        var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
            mapOption = {
                center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
                level: 3 // 지도의 확대 정도
            };

        var map = new kakao.maps.Map(mapContainer, mapOption); // 지도 생성

        // 마커 표시 위치
        var markerPosition = new kakao.maps.LatLng(33.450701, 126.570667);

        // 마커 생성
        var marker = new kakao.maps.Marker({
            position: markerPosition
        });

        // 마커 표시
        marker.setMap(map);
    </script>
</body>

</html>