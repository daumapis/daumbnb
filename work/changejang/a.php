<?php


//서버페이지로 블로그 오픈 api사용
$apikey = 'a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3';
$request = 'https://apis.daum.net/search/blog?apikey='.$apikey.'&q='.urlencode('daum');
$request1 = 'https://apis.daum.net/search/web?apikey='.$apikey.'&q='.urlencode('daum');



//데이터얻기(xml)
$response = file_get_contents($request);
$response1 = file_get_contents($request1);

if($response ===false) {
    die('Request failed');
}

// 파싱
$phpobject = simplexml_load_string($response);
$phpobject1 = simplexml_load_string($response1);

if($phpobject === false) {
    die('Parsing failed');
}
?>

<!DOCTYPE html>
<html lang="kr">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DaumBnB 1step</title>

    <script type="text/javascript" src="https://apis.daum.net/maps/maps3.js?apikey=6b96607bfaa8f55d7b6223445d64a60ecc825189" charset="utf-8"></script>
    <script type="text/javascript">
    function init1() {
    	var p = new daum.maps.LatLng(37.53729488297613, 127.00551022687515);
    	var rc = new daum.maps.RoadviewClient();
    	var rv = new daum.maps.Roadview(document.getElementById("roadview"));
    
    	rc.getNearestPanoId(p, 50, function(panoid) {
    		rv.setPanoId(panoid);
    	});
    	
    }
</script>
</head>
    
            

<script type="text/javascript">
        // 현재 페이지 주소(URL)을 가져올 함수 생성
        function pageUrl() { 
          var sHref = location.href;
          document.getElementById('aDiv').innerHTML = sHref;
        }
        // 현재 페이지 주소(URL)에서 쿼리스트링을 가져올 함수 생성
        function pageQuery() {
          // window 객체의 location.search 속성으로 쿼리스트링 가져오기
          var sQuery = location.search;
            // 쿼리스트링이 있는지 조건문으로 체크
            if ( sQuery ) {
              document.getElementById('aDiv').innerHTML = sQuery;
            } else {
              document.getElementById('aDiv').innerHTML = '현재 페이지 URL에 쿼리정보가 없습니다.';
            }
         }
      </script>
      
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>



  <body onload="init1()" >
    <h1>Daum search!</h1>
    <!-- 코딩 구역 시작 -->
    <!-- TODO : 코딩 시작 -->
    <div class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Daum</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="#web">검색</a></li>
              <li><a href="#blog">위치</a></li>
              <li><a href="#cafe">로드뷰</a></li>
             
              
            

      
             
              
           
		<div id="daum_customsearch_wrap"></div>
          
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    

    <div id = "web" class="container">
     <script>
                (function() {
                    window._dcs=window._dcs||{};
                    window._dcs.siteUrl = 'http://example.com';
                    window._dcs.searchOrder = ["site","cafe","blog","image","board","vclip","web","book","knowledge"];
                    window._dcs.searchboxtheme = 'default';
                    window._dcs.searchresulttheme = 'overlay';
                    var dcss = document.createElement('script');
                    dcss.type = 'text/javascript';
                    dcss.async = true;
                    dcss.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                        '//dna.daum.net/include/tools/playground/CustomSearch/cs.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(dcss, s);
                })();
    </script>
      <div class="row">
        <?php foreach($phpobject->item as $value) { //start foreache ?>
        <div class="col-md-4" style="height:300px;">
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo "제목: ".$value->title; ?></h3>
                </div>
                <div class="bg-default">
                    <?php echo "내용: ".$value->description; ?>
                    <p><a class="btn btn-xs btn-danger" href="<?php echo $value->link; ?>" role="button" target="_blank">View details &raquo;</a></p>
                </div>
            </div>
        </div>
       
      <?php } //end foreach   ?>
      </div>
      
      
      <div id = "blog" class="container">
 <div id="map" style="width:600px;height:600px;"></div>
    <!-- 코딩 구역 끝 -->
    
	
	<div id="map"style="width:600px;height:600px;"></div>
      </div>
      
      
      <div id = "cafe" class="container">
      <div id="roadview" style="width:600px;height:400px;"></div>
      
      </div>
      <div id = "all" class="container">
      <div class="row">
        <?php foreach($phpobject->item as $value) { //start foreache ?>
        <div class="col-md-4" style="height:300px;">
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo "제목: ".$value->title; ?></h3>
                </div>
                <div class="bg-default">
                    <?php echo "내용: ".$value->description; ?>
                    <p><a class="btn btn-xs btn-danger" href="<?php echo $value->link; ?>" role="button" target="_blank">View details &raquo;</a></p>
                </div>
            </div>
        </div>
       
      <?php } //end foreach   ?>
      

      <!-- Example row of columns -->
      
    <!-- 코딩 구역 끝 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>