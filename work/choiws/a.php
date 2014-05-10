<?php
$apikey = 'a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3';
$request = 'http://apis.daum.net/search/web?apikey='.$apikey.'&q='.urlencode('lol');
$request2 = 'http://apis.daum.net/search/web?knowledge='.$apikey.'&q='.urlencode('pc');
$response=file_get_contents($request);
$response2=file_get_contents($request2);
if($response===false)
{
    die('Request failed');}
$phpobject = simplexml_load_string($response);
if($phpobject ===false){
    die('Parsing failed');
}


?>
    
  
</html>
    
<!DOCTYPE html>
<html lang="kr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>daum 지도&검색반 choiws</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style>
  div {
    color: orange;
  }
  p {
    color: red;
  }
  span {
    color: red;
    display: none;
  }
  </style>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  </head>
  <body>
    <h1>LOL site!</h1>
    <!-- 코딩 구역 시작 -->
    <!-- TODO : 코딩 시작 -->
    <div class="jumbotron">
      <div class="container">
        <h1>Map & Search class - by choiws</h1>
        <p>Thank you for visit</p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">More detail Information »»</a></p>
        
      <div class="progress">
        <div class="progress-bar progress-bar-success" style="width: 35%"><span class="sr-only">35% Complete (success)</span></div>
        <div class="progress-bar progress-bar-warning" style="width: 20%"><span class="sr-only">20% Complete (warning)</span></div>
        <div class="progress-bar progress-bar-danger" style="width: 10%"><span class="sr-only">10% Complete (danger)</span></div>
      </div>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      
      <div class="row">
        <?php foreach($phpobject->item as $value) { //start foreache ?>
        <div class="col-md-4" style="height:300px;">
        
            <div class="panel panel-warning">
                <div color=blue , class="panel-heading">
                    <h3 class="panel-title"><?php echo "제목: ".$value->title; ?></h3>
                </div>
                <div class="panel-body">{ color : green 
                    <?php echo "내용: ".$value->description; ?> }
                    <p>
                    <a class="btn btn-default" href="<?php echo $value->link; ?>" role="button" target="_blank">View details &raquo;</a>
                    <button type="button" class="btn btn-lg btn-success">Success</button>
                    
      
                    
                    </p>
                </div>
            </div>
        </div>
      <?php } //end foreach   ?> 
    
 

      
      <div class="row">
        <div class="col-md-4">
          <h2>웹검색 결과</h2>
     

    
          <p>웹 검색 결과를 표시합니다. 여기서 오픈API를 사용합니다.</p>
        </div>
        <div class="col-md-4">
          <h2>이미지 검색결과</h2>
          <p>검색 결과를 표시합니다. 여기서 오픈API를 사용합니다.</p>
        </div>
        <div class="col-right-4">
          <h2>기타 검색 결과</h2>
          <p>검색 결과를 표시합니다. 여기서 오픈API를 사용합니다.</p>
        </div>
      </div>
      <div class="well">
        <p>Thank you</p>
      </div>
      
      <div class="progress">
        <div class="progress-bar progress-bar-success" style="width: 35%"><span class="sr-only">35% Complete (success)</span></div>
        <div class="progress-bar progress-bar-warning" style="width: 20%"><span class="sr-only">20% Complete (warning)</span></div>
        <div class="progress-bar progress-bar-danger" style="width: 10%"><span class="sr-only">10% Complete (danger)</span></div>
      </div>
      
    <!-- 코딩 구역 끝 -->
    
    <div id="map" style="width:600px;height:600px;"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://apis.daum.net/maps/maps3.js?apikey=6b96607bfaa8f55d7b6223445d64a60ecc825189" charset="utf-8"></script>
    <script type="text/javascript"> 
	var map;
	
	//페이지 로드시 실행
	$( document ).ready(function() {
	    loadData();
    });
    
    
    function init() {
	map = new daum.maps.Map(document.getElementById('map'), {
		center: new daum.maps.LatLng(37.537123, 127.005523),
		level: 3
	});		
}

function setCenter() {
	map.setCenter(new daum.maps.LatLng(37.53723910162246, 127.003362714821));
}
	// data/bnblist.json데이터 저장
	var bnbListData;
	function loadData()
	{
	    $.getJSON( "/data/bnblist.json", function( data ) {
	        bnbListData = data;
	        drawList();
	        //지도그리기(지도API 강의)
	        drawMap();
        });
	}
	
	//리스트 출력
	function drawList()
	{
	    $.each(bnbListData.list, function(i, item) {
            $itemTag = createBnbItem(item.lat,item.lng,item.url, item.name, item.desc);
            $itemTag.appendTo("#bnblist");
        });
	}
	
	//리스트 태그 생성
	function createBnbItem(lat, lng, url, name, desc)
	{
	    var aTag = $('<a onclick="return onBnbItem('+lat+','+lng+')" href="'+url+'" class="list-group-item" target="_blank">');
	    var h4Tag = $('<h4 class="list-group-item-heading">');
	    h4Tag.text(name);
	    h4Tag.appendTo(aTag);
	    var pTag = $('<p class="list-group-item-text">');
	    pTag.text(desc);
	    pTag.appendTo(aTag);
	    return aTag;
	}
	
	//리스트 클릭
	function onBnbItem(lat,lng)
	{
	    map.panTo(new daum.maps.LatLng(lat, lng));
	    return false;
	}
	
	//지도 그리기
	function drawMap() {

		map = new daum.maps.Map(document.getElementById('map'), {
			center: new daum.maps.LatLng(37.537123, 127.005523),
			level: 4
		});
	



		var icon = new daum.maps.MarkerImage(
			'http://localimg.daum-img.net/localimages/07/2009/map/icon/blog_icon01_on.png',
			new daum.maps.Size(31, 34),
			new daum.maps.Point(16,34),
			"poly",
			"1,20,1,9,5,2,10,0,21,0,27,3,30,9,30,20,17,33,14,33"
		);
		
		$.each(bnbListData.list, function(i, item) {
            new daum.maps.Marker({
				position: points[i],
				image: icon
			}).setMap(map);
        });
	}


	</script> 
	
	<body onload="init()"> 
	<div id="map" style="width:600px;height:600px;"></div>
	<form>
		<button type="button" onclick="setCenter()">중심점 이동하기</button>

</body>
  </body>
</html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>









