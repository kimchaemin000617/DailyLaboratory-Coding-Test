<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>DailyLaboratory_Coding_Test</title>
    <style>
        .container {
            width: 90vw;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
        }

        .section {
            width: 100%;
            height: 100%;
            display: flex;
            justify-items: center;
        }

        .infoWindow {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            width: 300px;
            line-height: 22px;
            border-radius: 4px;
            padding: 0px 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="section">
            <div id="map" style="width:700px;height:700px;"></div>
            <div id="clickLatlng">현재 선택된 위치는 "데일리레보라토리" 입니다.</div>
            <?php foreach ($place as $place_item): ?>
            <?= esc($place_item['name']) ?>
            <?php endforeach ?>
        </div>
    </div>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=88aa16a70acb90dc881dd869ae25b1b2&libraries=services,clusterer,drawing"></script>
    <script>
        var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
            mapOption = {
                center: new kakao.maps.LatLng(36.356338813967255, 127.36444156613784), // 지도의 중심좌표
                level: 3 // 지도의 확대 정도
            };

        var map = new kakao.maps.Map(mapContainer, mapOption); // 지도 생성

        // 지도를 클릭한 위치에 표출할 마커입니다
        marker = new kakao.maps.Marker({
            // 지도 중심좌표에 마커를 생성합니다 
            position: map.getCenter()
        });

        // 지도에 마커를 표시합니다
        marker.setMap(map);

        // 지도에 클릭 이벤트를 등록합니다
        // 지도를 클릭하면 마지막 파라미터로 넘어온 함수를 호출합니다
        kakao.maps.event.addListener(map, 'click', function(mouseEvent) {

            // 클릭한 위도, 경도 정보를 가져옵니다 
            var latlng = mouseEvent.latLng;

            // 마커 위치를 클릭한 위치로 옮깁니다
            marker.setPosition(latlng);

            var message = '현재 위치의 위도는 ' + latlng.getLat() + ' 이고, ';
            message += '경도는 ' + latlng.getLng() + ' 입니다';

            var resultDiv = document.getElementById('clickLatlng');
            resultDiv.innerHTML = message;

            infowindow.setContent;
            infowindow.open();
        });

        // 마커를 클릭했을 때 마커 위에 표시할 인포윈도우를 생성합니다
        // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
        var iwContent = '<div class="infoWindow" style="display:flex;">명칭:<input style="margin-left:5px;margin-right:5px;"/><button style="padding:5px;">데이터 추가</button></div>'
        // 인포윈도우를 생성합니다

        var infowindow = new kakao.maps.InfoWindow({
            content: iwContent,
        });

        // 마커에 클릭이벤트를 등록합니다
        kakao.maps.event.addListener(marker, 'click', function() {
            // 마커 위에 인포윈도우를 표시합니다
            infowindow.open(map, marker);
        });
    </script>
</body>

</html>