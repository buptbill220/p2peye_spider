<?php
date_default_timezone_set('PRC');
require_once('define.php');
require_once(FM_SIM_CORE . 'autoload.class.php');
$loader = Autoload::init(FM_SIM_PATH);
Autoload::requireAll(FM_SIM_COMMON);
Autoload::requireAll(FM_SIM_EXT);

$headers = array('X-Requested-With:XMLHttpRequest', 'Accept:application/json, text/javascript, */*; q=0.01', 'Referer:http://p2peye.com/');
$domain = 'p2peye.com';

function craw_platform($url) {
    global $headers;
    $filename = './p2peye/platform.txt';
    $time = time();
    if (file_exists($filename) && ($time - filemtime($filename)) < 86400 ) {
        $cont = file_get_contents($filename);
        $data = json_decode($cont, true);
    } else {
        echo "log=======\n"
        $http = new http;
        $http->initCurl();
        $ret = $http->headers($headers)->run($url);
        if ($ret && $http->getStatus() == 200) {
            $data = $http->getResponse();
            $json = json_decode($data, true);
            $data = $json['data'];
            //dump($data);
            $json = json_encode($data);
            file_put_contents($filename, $json);
        } else {
            return false;
        }
    }
    return $data;
}

$platform = craw_platform('http://we.p2peye.com/index/getPlatform');
if ($platform) {
    $platforms = array_chunk($platform, 300, true);
    $index = 0;
    foreach ($platforms as $p) {
        $data = json_encode($p);
        file_put_contents('./p2peye/platform_' . $index . '.txt', $data);
        $index += 300;
    }
}
