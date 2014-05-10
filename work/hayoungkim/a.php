<?php
function searchDaum($type='blog', $query='bnb'){
    $apikey = 'a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3';
    $request = "http://apis.daum.net/search/$type?apikey=".$apikey."&q=".urlencode($query);

    $response = file_get_contents($request);

    if($response === false){
        die('Request failed');
    }
    
    $phpobject = simplexml_load_string($response);

    if($phpobject === false){
        die('Parsing failed');
    }
    return $phpobject;
}
$blogs = searchDaum();
$web = searchDaum('web');
$image = searchDaum('image');

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
        
        <span style="color: gray; font-size: 13px;">이미지</span>
        <div style="width: 1100px; height: 1px; background-color: gray; margin: 10px 0;"></div>
      
        <?php foreach($image->item as $value) { //start foreache ?>
        <div style="float: left; width: 110px; height: 80px; margin: 0px;">
            <a  href="<?php echo $value->link; ?>" target="_blank">
                <img src="<?php echo $value->thumbnail; ?>" alt="썸네일" style="width: 100%; height: 100%;"/>
            </a>
        </div>
      <?php } //end foreach   ?> 
      <div class="clear" style="clear:both"/>
      <br /><br /><br />

      <span style="color: gray; font-size: 13px;">블로그</span>
    <div style="width: 1100px; height: 1px; background-color: gray; margin: 10px 0;"></div>
    
      <div class="row">
        <?php foreach($blogs->item as $value) { //start foreache ?>
        <div class="col-md-4" style="height:300px;">
        
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $value->title; ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo "내용: ".$value->description; ?>
                    <p><a class="btn btn-default" href="<?php echo $value->link; ?>" role="button" target="_blank">View details &raquo;</a></p>
                </div>
            </div>
        </div>
      <?php } //end foreach   ?> 
      <div class="clear" style="clear:both" />
    
      <!-- Example row of columns -->
      <div class="row">
        <?php foreach($web->item as $value) { //start foreache ?>
        <div class="col-md-4" style="height:300px;">
        
            <div class="panel panel-warning">
                <div class="panel-heading" style="background-color: #f2f2f2">
                    <h3 class="panel-title"><?php echo $value->title; ?></h3>
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
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>