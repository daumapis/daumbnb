<?php
$apikey='24005363b577045ad2d2eafd4ca7e28b2f3ce23e';
$request='http://apis.daum.net/search/web?apikey='.$apikey.'&q='.urlencode('bnb');
$request='http://gnuvill.hufs.ac.kr:2001/rss20.xml';

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
  </head>
  <body>
    
    <ul class=" navbar navbar-inverse" role="navigation">
       <h1 style="color:white;float:left;margin-right:20px;">Daum BnB!</h1>
       <li style="">
            <h1 style="color:white;float:left;list-style:none;">home</h1>
        </li>
     
            <div id="daum_customsearch_wrap"></div>
            <script>
            (function() {
                window._dcs=window._dcs||{};
                window._dcs.siteUrl = 'http://example.com';
                window._dcs.searchOrder = ["site","blog","vclip"];
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
        
    <!-- 코딩 구역 시작 -->
    <!-- TODO : 코딩 시작 -->
    </ul>
    
    <!-- 코딩 구역 시작 -->
    <!-- TODO : 코딩 시작 -->
    <div class="jumbotron">
      <div class="container">
        <h1 style="height:200px;float:left;background-image:url('http://focus.chosun.com/upimg/com/10000/c384.jpg');">Daum BnB</h1>
        <img src="" alt="..." class="img-rounded">
        <p>본사이트는 전세계 어디서나 BnB 관련 정보를 찾는 사이트입니다.</p>
      </div>
    </div>
    

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <?php foreach($phpobject->channel->item as $value) { //start foreache ?>
        <div class="col-md-4" style="height:300px;">
        
            <div class="panel panel-warning" style="">
                <div class="panel-heading" style="background-color:black;color:white;">
                    <h3 class="panel-title"><?php echo "제목: ".$value->title; ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo "내용: ".$value->description; ?>
                    <p><a class="btn btn-default" href="<?php echo $value->link; ?>" role="button" target="_blank">View details &raquo;</a></p>
                </div>
            </div>
        </div>
      <?php } //end foreach   ?> 
      <div class="clear" style="clear:both" />
    </div>
    <!-- 코딩 구역 끝 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>