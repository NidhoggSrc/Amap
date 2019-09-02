<?php
require_once './Amap/vendor/autoload.php';

//$aa =  new \Amap\request\geocode\GeoRequest('3fc7e955e64fd97da51be8875e8911c3');
//
//$aad = $aa->getContents('文庙广场','德阳');
//var_dump($aad->getLocation());

//104.391202,31.127424
$test2 =new \Amap\request\geocode\RegeoRequest('3fc7e955e64fd97da51be8875e8911c3');
$aa = $test2->getContents('116.481488,39.990464','商务写字楼','1000','all');
