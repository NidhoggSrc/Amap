<?php
require_once './Amap/vendor/autoload.php';

//$aa =  new \Amap\request\geocode\GeoRequest('3fc7e955e64fd97da51be8875e8911c3');
//
//$aad = $aa->getContents('文庙广场','德阳');
//var_dump($aad->getLocation());

//104.391202,31.127424


function def()
{
    $i =0;
    while ($i<1000){
        $i++;
        echo $i;
//        yield $i;
    }
}

$aa = def();
//foreach ($aa as $item){
//    var_dump($item);
//}