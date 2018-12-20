<?php
if (!defined('FM_SIM_PHP')) die ('undefied FM_SIM_PHP');

class FinanceAction extends IndexAction {
    function index() {
        $this->get_ip_address();
        $this->display('index');
    }

    function zyht() {
        header('Content-Type: text/json; Charset=utf-8');
        $http = new http();
        $http->initCurl();
        $headers = array('Accept: application/json, text/javascript, */*; q=0.01', 'User-Agent: Mozilla/5.0', 'X-Requested-With: XMLRequest', 'Referer: http://www.zyhtcae.com');
        $http->headers($headers)->run('http://120.55.124.178:81/shyhsy/?type=lists&ajax=1');
        echo $http->getResponse();
    }

    function ybk() {
        header('Content-Type: text/json; Charset=utf-8');
        $tidx = $_GET['tidx'];
        $t = $_GET['t'];
        $http = new http();
        $http->initCurl();
        $headers = array('Accept: application/json, text/javascript, */*; q=0.01', 'User-Agent: Mozilla/5.0', 'X-Requested-With: XMLRequest', 'Referer: http://ta.shscce.com:8080/front/hq/delay_hq_cache.htm?stockPreCodes=&indexCodes=600001');
        $http->headers($headers)->run("http://ta.shscce.com:8080/front/hq/delay_hq.json?callback=jsonp{$tidx}&_={$t}&stockPreCodes=&mainIndexCode=&dataIndexCode=");
        $res = $http->getResponse();
        $res = iconv('gbk', 'utf8', $res);
        $res = substr($res, 14, -1);
        //$res = json_decode($res, true);
        echo $res;
    }
}
