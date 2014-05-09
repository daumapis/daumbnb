<!DOCTYPE html>
<?php
error_reporting(E_ALL);
$request = 'http://apis.daum.net/search/blog?apikey=a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3&q='.urlencode('bnb');

$response = file_get_contents($request);

if ($response === false) {
    die('Request failed');
}

$phpobject = simplexml_load_string($response);
//print_r($phpobject);
if ($phpobject === false) {
    die('Parsing failed');
}
?>
<html lang="kr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DaumBnB 1step</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
        <h1><?php echo "<h1>".$phpobject->title."</h1><br />";?></h1>
        <p><?php echo "검색결과: ".$phpobject->description."<br />"; ?></p>
        <p><?php echo "<h2>검색결과: ".$phpobject->totalCount."</h2><br />"; ?></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
      <?php foreach($phpobject->item as $value) { //start foreache ?>
        <div class="col-md-4" style="height:300px;">
          <h2><?php echo "제목: ".$value->title; ?></h2>
          <p><?php echo "내용: ".$value->description; ?></p>
          <p><a class="btn btn-default" href="<?php echo $value->link; ?>" role="button" target="_blank">View details &raquo;</a></p>
        </div>
      <?php } //end foreach   ?>    
      </div>
    <!-- 코딩 구역 끝 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>