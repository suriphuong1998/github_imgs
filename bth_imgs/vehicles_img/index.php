<?php
// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json, false);
$url = $data->url;
preg_match_all('/vehicles_img\/([-a-z0-9_\/:.]+\.(jpg|jpeg|png))/i', $url, $matches);
    $image = get_headers($url, 1);
    $bytes = $image["Content-Length"];
if($bytes > 500){
     	file_put_contents($matches[1][0], file_get_contents($url));
}
?>


