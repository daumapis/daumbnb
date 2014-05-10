<?php
$apikey = 'a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3';
$request = 'http://apis.daum.net/search/blog?apikey='.$apikey.'&q='.urlencode('lol&allstar');
$response=file_get_contents($request);
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
    <title>League of Legends</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style>
  div {
    color: blue;
  }
  p {
    color: green;
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
        <h1>Daum LOL! - by choiws</h1>
        <p>Test 중입니다...</p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more »</a></p>
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      
      <div class="row">
        <?php foreach($phpobject->item as $value) { //start foreache ?>
        <div class="col-md-4" style="height:300px;">
        
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo "제목: ".$value->title; ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo "내용: ".$value->description; ?>
                    <p>
                    <a class="btn btn-default" href="<?php echo $value->link; ?>" role="button" target="_blank">View details &raquo;</a>
                    <button type="button" class="btn btn-lg btn-success">Success</button>
                    
                    <div class="dropdown theme-dropdown clearfix">
        <a id="dropdownMenu1" href="#" role="button" class="sr-only dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
          <li class="active" role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
          <li role="presentation" class="divider"></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
        </ul>
      </div>
                    
                    </p>
                </div>
            </div>
        </div>
      <?php } //end foreach   ?> 
      <div>Try scrolling the iframe.</div>
<p>Paragraph - <span>Scroll happened!</span></p>
 

      
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>