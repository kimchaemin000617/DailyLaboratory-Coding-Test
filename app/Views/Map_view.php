<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- pagination.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.css" />

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

        .map_list {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="section">
            <!-- 지도 -->
            <div id="map" style="width:700px;height:700px;"></div>
            <div style="display:flex;flex-direction:column;align-items:center;">
                <!-- pagination.js를 이용한 장소 목록 출력 -->
                <span id="place_list"></span>
                <!-- pagination.js를 이용한 pagination 출력 -->
                <div id="pagination"></div>
            </div>
        </div>
        <!-- 현재 선택된 위치의 위/경도 출력 -->
        <div id="clickLatlng">현재 선택된 위치는 "데일리레보라토리" 입니다.</div>
    </div>

    <!-- 카카오 맵 api -->
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=88aa16a70acb90dc881dd869ae25b1b2&libraries=services,clusterer,drawing"></script>
    <script>
        var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
            mapOption = {
                center: new kakao.maps.LatLng(36.356338813967255, 127.36444156613784), // 지도의 중심좌표
                level: 3 // 지도의 확대 정도
            };

        var map = new kakao.maps.Map(mapContainer, mapOption); // 지도 생성

        // 지도를 클릭한 위치에 표출할 마커입니다
        marker = new kakao.maps.Marker();

        // 지도에 마커를 표시합니다
        marker.setMap(map);

        // HTML5의 geolocation으로 사용할 수 있는지 확인합니다 
        if (navigator.geolocation) {

            // GeoLocation을 이용해서 접속 위치를 얻어옵니다
            navigator.geolocation.getCurrentPosition(function(position) {

                var lat = position.coords.latitude, // 위도
                    lon = position.coords.longitude; // 경도

                // 마커가 표시될 위치를 geolocation으로 얻어온 좌표로 생성합니다
                var locPosition = new kakao.maps.LatLng(lat, lon),

                    // 인포윈도우에 표시될 내용입니다
                    infoMessage = '<div style="padding:5px;">현재 위치입니다.</div>';

                // 마커와 인포윈도우를 표시합니다
                displayMarker(locPosition, infoMessage);

                var message = '현재 선택된 위치의 위도는 ' + lat + ' 이고, ';
                message += '경도는 ' + lon + ' 입니다';

                // 지정된 div에 message 삽입
                var resultDiv = document.getElementById('clickLatlng');
                resultDiv.innerHTML = message;
            });

        }

        // 지도에 마커와 인포윈도우를 표시하는 함수입니다
        function displayMarker(locPosition, message) {

            // 마커를 생성합니다
            var marker = new kakao.maps.Marker({
                map: map,
                position: locPosition
            });

            // 인포윈도우에 표시할 내용
            var iwContent = message,
                iwRemoveable = true;

            // 인포윈도우를 생성합니다
            var infowindow = new kakao.maps.InfoWindow({
                content: iwContent,
                removable: iwRemoveable
            });

            // 인포윈도우를 마커위에 표시합니다 
            infowindow.open(map, marker);

            // 지도 중심좌표를 접속위치로 변경합니다
            map.setCenter(locPosition);
        }

        // 지도에 클릭 이벤트를 등록합니다
        // 지도를 클릭하면 마지막 파라미터로 넘어온 함수를 호출합니다
        kakao.maps.event.addListener(map, 'click', function(mouseEvent) {

            // 클릭한 위도, 경도 정보를 가져옵니다 
            var latlng = mouseEvent.latLng;

            // 마커 위치를 클릭한 위치로 옮깁니다
            marker.setPosition(latlng);

            var message = '현재 선택된 위치의 위도는 ' + latlng.getLat() + ' 이고, ';
            message += '경도는 ' + latlng.getLng() + ' 입니다';

            // 지정된 div에 message 삽입
            var resultDiv = document.getElementById('clickLatlng');
            resultDiv.innerHTML = message;
        });

        function markerSet(Lat, Lng) {
            // 마커가 표시될 위치입니다 
            var markerPosition = new kakao.maps.LatLng(Lat, Lng);

            // 마커를 생성합니다
            var marker = new kakao.maps.Marker({
                position: markerPosition
            });
        }

        // php의 place_list 데이터 가져오기
        var place_list = <?php echo json_encode($place_list); ?>;

        // pagination.js
        $(function() {

            // place_list의 마커를 저장하는 배열
            markers = [];
            let container = $('#pagination');
            container.pagination({

                // 한 페이지 당 출력할 아이템 개수
                pageSize: 8,

                // 출력할 아이템 배열
                dataSource: place_list,

                // 출력
                callback: function(data, pagination) {

                    // 이전 리스트의 마커 삭제
                    for (var i = 0; i < markers.length; i++) {
                        markers[i].setMap(null);
                    }

                    var dataHtml = '<ul>';

                    $.each(data, function(index, item) {

                        dataHtml += '<li> 명칭:' + item.name;
                        dataHtml += '<div style="margin-bottom: 10px;">주소:' + item.address + '</div></li>';

                        // 마커가 표시될 위치입니다 
                        var markerPosition = new kakao.maps.LatLng(item.latitude, item.longitude);

                        // 마커를 생성합니다
                        var marker = new kakao.maps.Marker({
                            position: markerPosition
                        });

                        // 마커가 지도 위에 표시되도록 설정합니다
                        marker.setMap(map);
                        markers.push(marker);
                    });

                    dataHtml += '</ul>';
                    $("#place_list").html(dataHtml);
                }
            })
        })
    </script>
</body>

</html>