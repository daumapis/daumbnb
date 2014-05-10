<?php
$apikey='24005363b577045ad2d2eafd4ca7e28b2f3ce23e';
$request='http://blog.daum.net/xml/rss/jon2092/view';

//데이터 얻기(xml)
$response = file_get_contents($request);

if ($response === false) {
    die('Request failed');
}

//파싱
$phpobject = simplexml_load_string($response);

if ($phpobject === false) {
    die('Parsing failed');
}
?>

<!DOCTYPE html>
<html lang="kr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>여행 블로그</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        function search_query(query, id) {      
            console.log(query);
            console.log(id);
        	var url = "https://apis.daum.net/search/web";
        	url += "?output=json";
        	url += "&apikey=24005363b577045ad2d2eafd4ca7e28b2f3ce23e"
        	url += "&q=" + query;
        	url += "&callback=?";
        	$.getJSON(url,function(data) {
        		result = "";
        		for (var i in data.channel.item)
        		{                
        			result += "<a href='"+ data.channel.item[i].link +"' target='_blank'>" + data.channel.item[i].title + "</a><br>";
        		} 
        	}).error(function(XMLHttpRequest, textStatus, errorThrown)
        	{          
        		result = textStatus;
        	}).complete(function(){
        		$("#"+id).html(result);                                    
        	});
        }
        </script>
        <script type="text/javascript" src="http://apis.daum.net/maps/maps3.js?apikey=7336eb3f454e2910146be3072fb677e94c1c4d77" charset="utf-8"></script>
        <script type="text/javascript"> 
        var map;
        function init() {
        	map = new daum.maps.Map(document.getElementById('map'), {
        		center: new daum.maps.LatLng(37.537123, 127.005523),
        		level: 3
        	});
        
        	// 좌표값들 지정
        	var points = new Array();
        	points[0] = new daum.maps.LatLng(37.529196714213114, 126.92506196011036);
        	points[1] = new daum.maps.LatLng(37.529197714213114, 127.17546196011036);
        	points[2] = new daum.maps.LatLng(37.529217714213114, 126.92526196011036);
        	points[3] = new daum.maps.LatLng(37.529257714213114, 126.92520196011036);
        	points[4] = new daum.maps.LatLng(37.530257714213114, 126.92530196011036);
        
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
        </script> 
  </head>
  <body onload="init()"> 
	<div id="map" style="width:600px;height:600px;"></div>
    <!-- 코딩 구역 시작 -->
    <!-- TODO : 코딩 시작 -->
    <div class="jumbotron">
      <div class="container">
        <h1>여행 블로그</h1>
        <p>여행 소식을 접할 수 있는 사이트 입니다. </p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <?php 
            $index=-1;
            foreach($phpobject->channel->item as $value) { 
                $index++;
        ?>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $value->title; ?></h3>
                    </div>
                    <div class="panel-body">
                        <div>
                            <div class="panel-body">
                                <?php echo $value->description; ?>
                            </div>
                            <p><a class="btn btn-default" href="<?php echo $value->link; ?>" role="button" target="_blank">More ...</a></p>
                             <?php 
                                $pattern=' '; 
                                $wordArray = split($pattern,trim($value->title)); 
                                foreach($wordArray as $word) { 
                            ?>
                                <p><input type="button" onClick="search_query('<?php 
                                    $word = preg_replace ("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $word); 
                                    echo $word 
                                    ?>', 'results_<?php echo $index?>')" 
                                    
                                    value="<?php 
                                    //$word = preg_replace ("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $word); 
                                    echo "'".$word."' 웹 검색";
                                    ?>" \></p>
                            <?php 
                            } //end foreach   ?>
                        </div>
                        <div id="results_<?php echo $index?>"></div>
                        
                    </div>
                    
                </div>
      <?php 
      } //end foreach   ?> 
      <div class="clear" style="clear:both" />
    </div>
    <!-- 코딩 구역 끝 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        
    </script>
  </body>
</html>