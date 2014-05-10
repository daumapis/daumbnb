<?php


//서버페이지로 블로그 오픈 api사용
$apikey = 'a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3';
$request = 'http://apis.daum.net/search/blog?apikey='.$apikey.'&q='.urlencode('bnb');


//데이터얻기(xml)
$response = file_get_contents($request);

if($response ===false) {
    die('Request failed');
}

// 파싱
$phpobject = simplexml_load_string($response);

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


    <div id="daum_customsearch_wrap"></div>

	
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
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
            <a class="navbar-brand" href="#">search</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#web">web</a></li>
              <li><a href="#blog">blog</a></li>
              <li><a href="#cafe">cafe</a></li>
              <li><a href="#all">all</a></li>
      
              
              
           
		<div id="daum_customsearch_wrap"></div>
          
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    

    <div class="container">
     
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
      <div class="row">
        <div class="col-md-4">
          <h2>웹검색 결과</h2>
          <p>웹 검색 결과를 표시합니다. 여기서 오픈API를 사용합니다.</p>
        </div>
        <div class="col-md-4">
          <h2>이미지 검색결과</h2>
          <p>검색 결과를 표시합니다. 여기서 오픈API를 사용합니다.</p>
        </div>
        <div class="col-md-4">
          <h2>기타 검색 결과</h2>
          <p>검색 결과를 표시합니다. 여기서 오픈API를 사용합니다.</p>
        </div>
      </div>
    <!-- 코딩 구역 끝 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>