<?php
$apikey='24005363b577045ad2d2eafd4ca7e28b2f3ce23e';
$request='http://apis.daum.net/search/web?apikey='.$apikey.'&q='.urlencode('bnb');

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
    <title>DaumBnB 1step</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        function search_query(query) {      
        	var url = "http://apis.daum.net/search/web";
        	url += "?output=json";
        	url += "&apikey=b62b20a07b737c1cca5b88737980adb11809762a"
        	url += "&q=" + query;
        	url += "&callback=?";
        	$.getJSON(url,function(data) {
        		result = "";
        		for (var i in data.channel.item)
        		{                
        			result += "title -> " + data.channel.item[i].title + "<br>";
        		} 
        	}).error(function(XMLHttpRequest, textStatus, errorThrown)
        	{          
        		result = textStatus;
        	}).complete(function(){
        		$("#results").html(result);                                    
        	});
        }
        </script>
  </head>
  <body>
    <h1>Daum BnB!</h1>
    <!-- 코딩 구역 시작 -->
    <!-- TODO : 코딩 시작 -->
    <div class="jumbotron">
      <div class="container">
        <h1>Daum BnB!</h1>
        <p>본사이트는 전세계 어디서나 BnB 관련 정보를 찾는 사이트입니다.</p>
      </div>
    </div>
    

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <?php foreach($phpobject->item as $value) { //start foreache ?>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo "제목: ".$value->title; ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo "내용: ".$value->description; ?>
                    <p><a class="btn btn-default" href="<?php echo $value->link; ?>" role="button" target="_blank">Media</a></p>
                    <p><input type="button" onClick="search_query('<?php echo $value->title; ?>')" value="Info" \></p>
                </div>
                <div id="results"></div>
            </div>
      <?php } //end foreach   ?> 
      <div class="clear" style="clear:both" />
    </div>
    <!-- 코딩 구역 끝 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        
    </script>
  </body>
</html>