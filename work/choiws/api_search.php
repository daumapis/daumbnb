<?php
$query = urlencode('다음');
$request = 'http://apis.daum.net/search/blog?apikey=a72a4a6edc53aba79886a8ef1ccbb782dda6e6b3&q='.$query;

// 요청을 수행합니다.
$xml = file_get_contents($request);

// HTTP 상태를 받아들입니다.
list($version,$status_code,$msg) = explode(' ',$http_response_header[0], 3);

// HTTP 상태를 확인합니다.
switch($status_code) {
    case 200:
        // 성공
        break;
    case 503:
        die('Your call to Daum Web Services failed and returned an HTTP status of 503. That means: Service unavailable. An internal problem prevented us from returning data to you.');
        break;
    case 403:
        die('Your call to Daum Web Services failed and returned an HTTP status of 403. That means: Forbidden. You do not have permission to access this resource, or are over your rate limit.');
        break;
    default:
        die('Your call to Daum Web Services returned an unexpected HTTP status of:' . $status_code);
}

// XML 출력
echo $xml;
?>