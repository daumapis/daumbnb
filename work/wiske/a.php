<?php
   
    //서버페이지로 블로그 open api사용
    $apikey = 'a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3';
    $request = 'http://apis.daum.net/search/blog?apikey='.$apikey.'&q='.urlencode('magic the gathering');
    
    //데이터 얻기
    $response = file_get_contents($request);
    
    if($response === false) {
        die('Request Failed');
    }
    
    //파싱
    $phpobject = simplexml_load_string($response);
    
    if($phpobject === false) {
        die('Parsing Failed');
    }
?>

<!DOCTYPE html>
<html lang="kr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome MTG</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Welcome MTG</h1>
    <!-- 코딩 구역 시작 -->
    <!-- TODO : 코딩 시작 -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome:D Magic The Gathering!</h1>
        <p>본사이트는 전세계 어디서나 Magic The Gathering 관련 정보를 찾는 사이트입니다.</p>
      </div>
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
    </div>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <?php foreach($phpobject->item as $value) { //start foreache ?>
        <div class="col-md-4" style="height:300px;">
        
            <div class="panel panel-success">
                <div class="panel panel-heading">
                    <h3 class="panel-title"><?php echo "제목: ".$value->title; ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo "내용: ".$value->description; ?>
                    <p><a class="btn btn-primary" href="<?php echo $value->link; ?>" role="button" target="_blank">View details &raquo;</a></p>
                </div>
            </div>
        </div>
      <?php } //end foreach   ?> 
      <div class="clear" style="clear:both" />
      
     
      
    <!-- 코딩 구역 끝 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>