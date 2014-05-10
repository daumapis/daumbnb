<?php
/*
 STEP2
 블로그 API를 사용하는 에제입니다. 
 - http://dna.daum.net/myapi 에 접속하셔서 블로그 apikey를 발급받으세요.
*/

//서버페이지로 블로그 오픈API 사용
$apikey = 'a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3';
$request = 'http://apis.daum.net/search/blog?apikey='.$apikey.'&q='.urlencode('bnb');
//echo $request;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--script src="/js/bootstrap.min.js"></script-->
	<script type="text/javascript">
        function search_query() {      
            var result = '';
        	var query = document.getElementById("query");
        	query = query.value;
        	
        	if(!query){
        	    alert("검색어를 입력하세요");
        	    
        	    return false;
        	}
        	var url = "https://apis.daum.net/search/blog?apikey=a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3"
        	url += "&output=json";
        	url += "&q=" + query;
        	url += "&callback=?";
            
            $.getJSON(url,function(data) {
        	    console.log(data);
        		for (var i in data.channel.item)
        		{                
        			//result += "title -> " + data.channel.item[i].title + "<br>";
        			
        			
        		            result += "<div class='col-md-4' style='height:300px;'>";
                                result += "<div class='panel panel-warning'>";
                                    result += "<div class='panel-heading'>";
                                        result += "<h3 class='panel-title'>제목:"  + data.channel.item[i].title; + "</h3>";
                                    result += "</div>";
                                    result += "<div class='panel-body'>";
                                        result += "내용:" + data.channel.item[i].description;
                                        result += "<p><a class='btn btn-default' href='" + data.channel.item[i].link + "role='button' target='_blank'>View details &raquo;</a></p>";
                                    result += "</div>";
                                result += "</div>";
                            result += "</div>";
        			
        			
        		}
        	}).error(function(XMLHttpRequest, textStatus, errorThrown)
        	{          
        		result = textStatus;
        	}).complete(function(){
        		$(".row").html(result);                                    
        	});
        }
	</script>
	<style>
	#query{width:80%;}
	.cont{width:100%;background-color:#fefbed;padding:50px;}
	</style>
	
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
      
	<form id="search_form" action="javascript:search_query();" method="post">
           <input type="text" size="10" id="query" name="query" placeholder="검색어를 입력하세요."/>&nbsp;<input type="submit" >
	</form>
	
	<div id="test">
	
	</div>
	
      <div class="row">
          
          <div class="bs-callout bs-callout-warning">

      <p class="cont">검색어를 입력하세요</p>
          
      <!--
        <?php// foreach($phpobject->item as $value) { //start foreache ?>
        <div class="col-md-4" style="height:300px;">
        
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo "제목: ".$value->title; ?></h3>
                </div>
                <div class="panel-body">
                    <?php// echo "내용: ".$value->description; ?>
                    <p><a class="btn btn-default" href="<?php echo $value->link; ?>" role="button" target="_blank">View details &raquo;</a></p>
                </div>
            </div>
        </div>
        -->
      <?php// } //end foreach   ?> 
      <div class="clear"  style="clear:both"/>
      
    <!-- 코딩 구역 끝 -->
    