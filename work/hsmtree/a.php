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
    <script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3 " charset="utf-8"></script>
  </head>
  <body>
    <!-- 코딩 구역 시작 -->
    <!-- TODO : 코딩 시작 -->
    <div class="jumbotron">
      <div class="container">
        <h1>Daum BnB!</h1>
        <p>본사이트는 전세계 어디서나 BnB 관련 정보를 찾는 사이트입니다.</p>
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
  $(function() {
    $("#mapTabs").tabs();
  });
  var map;
  function init() {
	map = new daum.maps.Map(document.getElementById('map'), {
		center: new daum.maps.LatLng(37.537123, 127.005523)
	});

	var marker = new daum.maps.Marker({
		position: new daum.maps.LatLng(37.537123, 127.005523)
	});
	marker.setMap(map);
  }
</script> 
  </body>
</html>
