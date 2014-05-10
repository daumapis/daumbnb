<?php
$apikey='24005363b577045ad2d2eafd4ca7e28b2f3ce23e';
$request='http://blog.daum.net/xml/rss/bluepoto3';

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
        			result += "title -> " + data.channel.item[i].title + "<br>";
        		} 
        	}).error(function(XMLHttpRequest, textStatus, errorThrown)
        	{          
        		result = textStatus;
        	}).complete(function(){
        		$("#"+id).html(result);                                    
        	});
        }
        </script>
  </head>
  <body>
    <!-- 코딩 구역 시작 -->
    <!-- TODO : 코딩 시작 -->
    <div class="jumbotron">
      <div class="container">
        <h1> News</h1>
        <p>소식을 접할 수 있는 사이트 입니다. </p>
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
                            <p><a class="btn btn-default" href="<?php echo $value->link; ?>" role="button" target="_blank">Media</a></p>
                            <p><input type="button" onClick="search_query('<?php 
                                $pattern=' '; 
                                $wordArray = split($pattern,trim($value->title)); 
                                $word = preg_replace ("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $wordArray[0]); 
                                echo $word 
                                ?>', 'results_<?php echo $index?>')" 
                                
                                value="<?php 
                                $pattern=' '; 
                                $wordArray = split($pattern,trim($value->title)); 
                                $word = preg_replace ("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $wordArray[0]); 
                                echo "'".$word."' 검색";
                                ?>" \></p>
                        </div>
                        <div id="results_<?php echo $index?>"></div>
                        <div>
                            <?php echo $value->description; ?>
                        </div>
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