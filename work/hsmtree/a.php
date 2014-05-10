<!DOCTYPE html>
<html lang="kr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DaumBnB 1step</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=c571bb994830721c77f948ceb26b7f093c614a8d " charset="utf-8"></script>
  </head>
  <body>
    <!-- 코딩 구역 시작 -->
    <!-- TODO : 코딩 시작 -->
    <div class="jumbotron">
      <div class="container">
        <h1>Daum Map!</h1>
        <p>본사이트는 전세계 어디서나 Map 관련 정보를 찾는 사이트입니다.</p>
      </div>
    </div>
    <div id="mapTabs">
      <ul>
        <li><a href="#tabs-1">Daum Mobile Map</a></li>
      </ul>
      <div id="tabs-1">
        <div id="map"></div>
      </div>
    </div>
    
    <script type="text/javascript"> 
  function init() {
	map = new daum.maps.Map(document.getElementById('map'), {
		center: new daum.maps.LatLng(37.537123, 127.005523),
		level: 3
	});

	// 좌표값들 지정
	var points = new Array();
	points[0] = new daum.maps.LatLng(37.529196714213114, 126.92506196011036);
	points[1] = new daum.maps.LatLng(37.539197714213114, 126.87546196011036);
	points[2] = new daum.maps.LatLng(37.549217714213114, 126.72526196011036);
	points[3] = new daum.maps.LatLng(37.559257714213114, 126.62520196011036);
	points[4] = new daum.maps.LatLng(37.560257714213114, 126.52530196011036);

	// 빈 LatLngBounds 객체 생성
	var bounds = new daum.maps.LatLngBounds();
	
	for(var i = 0; i < points.length; i++)
	{
		// 해당 좌표에 marker 올리기
		new daum.maps.Marker({position:points[i]}).setMap(map);
		// LatLngBounds 객체에 해당 좌표들을 포함
		bounds.extend(points[i]);
	}
	// 좌표가 채워진 LatLngBounds 객체를 이용하여 지도 영역을 확장
	map.setBounds(bounds);
  }
  $(function() {
    $("#mapTabs").tabs();
    init()
  });
  var map;
</script> 
  </body>
</html>
