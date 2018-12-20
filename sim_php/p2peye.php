<?php
date_default_timezone_set('PRC');
require_once('define.php');
require_once(FM_SIM_CORE . 'autoload.class.php');
$loader = Autoload::init(FM_SIM_PATH);
Autoload::requireAll(FM_SIM_COMMON);
Autoload::requireAll(FM_SIM_EXT);

$platform_name = 'platform.txt';
if (count($argv) >= 2) {
    $platform_name = $argv[1];
    echo $platform_name;
}
    
$headers = array('X-Requested-With:XMLHttpRequest', 'Accept:application/json, text/javascript, */*; q=0.01', 'Referer:http://p2peye.com/');
$domain = 'p2peye.com';
$common_fields = array(
    'plat_name', 'platform_name', 'time_sequences'
    );

$apis = array(
        /*
        '新增借贷/待收金额' => array(
            'uri' => '/shuju?&type=new_borrow_paid&flag=1',
            'type' => 'new_borrow_paid',
            'field' => array(
                'collected', 'newmoney'
            )
        ),
        '资金流入' => array(
            'uri' => '/shuju?&type=inflows&flag=1',
            'type' => 'inflows',
            'field' => array(
                'moneyinout'
            )
        ),
        '综合利率/行业利率' => array(
            'uri' => '/shuju?&type=rate&flag=1',
            'type' => 'rate',
            'field' => array(
                'hy_rate', 'zh_rate', 'finished_time'
            )
        ),
        '贷款余额' => array(
            'uri' => '/shuju?&type=remainder&flag=1',
            'type' => 'remainder',
            'field' => array(
                'amount'
            )
        ),
        '待收投资人数' => array(
            'uri' => '/shuju?&type=paid_invest_people&flag=1',
            'type' => 'paid_invest_people',
            'field' => array(
                'count_user'
            )
        ),
        '平台未来待收' => array(
            'uri' => '/shuju?&type=plat_paid&flag=1',
            'type' => 'plat_paid',
            'field' => array(
                'daliy_loan_amount'
            )
        ),
        '前10借款人分布' => array(
            'uri' => '/shuju?&type=top_ten_borrowing',
            'type' => 'top_ten_borrowing',
            'flag' => false,
            'field' => array(
                'amount', 'grade', 'ranknum'
            ) 
        ),
        '前10投资分布' => array(
            'uri' => '/shuju?&type=top_ten_invest',
            'type' => 'top_ten_invest',
            'flag' => false,
            'field' => array(
                'bidding'
            )
        ),
        '平均行业借款期限/行业均值' => array(
            'uri' => '/shuju?&type=average_borrowing_time&flag=1',
            'type' => 'average_borrowing_time',
            'field' => array(
                'avg_industry_times', 'avg_loan_time'
            )
        ),
        '借款/投资人数' => array(
            'uri' => '/shuju?&type=borrowing_to_invest&flag=1',
            'type' => 'borrowing_to_invest',
            'field' => array(
                'borrow_count', 'invest_count'
            )
        ),
        '新/老投资人数' => array(
            'uri' => '/shuju?&type=invest_vs&flag=1',
            'type' => 'invest_vs',
            'field' => array(
                'newuser_count', 'olduser_count'
            )
        ),
        '新/老投资人数总额' => array(
            'uri' => '/shuju?&type=invest_total_vs&flag=1',
            'type' => 'invest_total_vs',
            'field' => array(
                'newuser_money', 'olduser_money'
            )
        ),
        '新借款分布金额/个数' => array(
            'uri' => '/shuju?&type=new_borrowing_distribution',
            'type' => 'new_borrowing_distribution',
            'flag' => false,
            'field' => array(
                'amount_sum', 'bid_count', 'grade'
            )
        ),
        */
        '满标时间' => array(
            'uri' => '/shuju?&type=full_scale_time&flag=1',
            'type' => 'full_scale_time',
            'field' => array(
                'bidding'
            )
        )
    );

function craw_platform($url) {
    global $headers;
    global $platform_name;
    $filename = $platform_name;
    $time = time();
    if (file_exists($filename) && ($time - filemtime($filename)) < 86400 ) {
        $cont = file_get_contents($filename);
        $data = json_decode($cont, true);
    } else {
        echo "log ==========\n";
        $http = new http;
        $http->initCurl();
        $ret = $http->headers($headers)->run($url);
        if ($ret && $http->getStatus() == 200) {
            $data = $http->getResponse();
            $json = json_decode($data, true);
            $data = $json['data'];
            $json = json_encode($data);
            file_put_contents($filename, $json);
        } else {
            return false;
        }
    }
    return $data;
}

function craw_api($url, $flag, $prefix, $field, &$plat_url, &$plat_name, &$datas) {
    global $headers;
    if ($flag) {
        $filename = './p2peye/api/' . $prefix . '.txt';
    } else {
        $filename = './p2peye/' . $prefix . '.txt';
    }
    $time = time();
    /*
    if (file_exists($filename) && ($time - filemtime($filename)) < 86400) {
    if (file_exists($filename)) {
        $cont = file_get_contents($filename);
        $data = json_decode($cont, true);
    //} else {
    */
        $http = new http;
        $http->initCurl();
        $ret = $http->headers($headers)->run($url);
        if ($ret && $http->getStatus() == 200) {
            $data = $http->getResponse();
            $json = json_decode($data, true);
            $data = $json['data'];
            $data = $data['data'];
            //dump($data);
            $json = json_encode($data);
            file_put_contents($filename, $json);
        } else {
            return ;
        }
    //}
    if ($flag == false ) {
        return;
    }
    $time_field = 'finished_time';
    if (!in_array($time_field, $field)) {
        $time_field = 'time_sequences';
    }
    foreach ($data as $k => $v) {
        $plat_url = $v['plat_name'];
        $plat_name = $v['platform_name'];
        if (isset($datas[$v[$time_field]])) {
            foreach ($field as $f) {
                if (!isset($datas[$v[$time_field]][$f]) && $f != $time_field) {
                    $datas[$v[$time_field]][$f] = $v[$f];
                }
            }
        } else {
            foreach ($field as $f) {
                $datas[$v[$time_field]] = array();
                foreach ($field as $f) {
                    if ($f != $time_field) {
                        $datas[$v[$time_field]][$f] = $v[$f];
                    }
                }
            }
        }
    }
}

function load_data($prefix) {
    $data = array();
    $filename = './p2peye/' . $prefix . '.txt';
    $time = time();
    //if (file_exists($filename) && ($time - filemtime($filename)) < 86400 ) {
    if (file_exists($filename)) {
        $cont = file_get_contents($filename);
        $data = json_decode($cont, true);
    }
    return $data;
}

echo "begin to load platform at time: " . date('Y-m-d H:i:s', time()) . "\n";
$platform = craw_platform('https://we.p2peye.com/index/getPlatform');
if ($platform == false) {
    echo "cant load platform data\n";
    exit(-1);
}

$keys = array();
foreach ($apis as $api) {
    $flag = true;
    if (isset($api['flag'])) {
        $flag = $api['flag'];
    }
    if ($flag) {
        $key = array_search('finished_time', $api['field']);
        if ($key !== false)
            array_splice($api['field'], $key, 1);
        $keys = array_merge($keys, $api['field']);
    }
}
$keys = explode(',', 'collected,newmoney,moneyinout,hy_rate,zh_rate,amount,count_user,daliy_loan_amount,avg_industry_times,avg_loan_time,borrow_count,invest_count,newuser_count,olduser_count,newuser_money,olduser_money,bidding');
$all_keys = implode(',', $keys);
echo $all_keys, "\n";
echo "begin to load data at time: " . date('Y-m-d H:i:s', time) . '\n';
foreach ($platform as $k => $v) {
    $dm = $v['domain_body'];
    $com_name = $v['name'];
    $pinyin = $v['pinyin'];
    $url_prefix = 'https://' . $dm . '.' . $domain;
    $datas = load_data($com_name);
    if (!empty($datas)) {
        //continue;
    }
    $plat_name = '';
    $plat_url = '';
    echo "begin to craw $com_name\n";
    foreach ($apis as $api) {
        $url = $url_prefix . $api['uri'];
        echo "$url\n";
        $flag = true;
        if (isset($api['flag'])) {
            $flag = $api['flag'];
        }
        craw_api($url, $flag, $com_name . $api['type'], $api['field'], $plat_url, $plat_name, $datas);
    }
    file_put_contents('./p2peye/' . $com_name . '.txt', json_encode($datas));
    $filename = './p2peye/' . $pinyin . '.csv';
    $file = fopen($filename, 'w');
    fwrite($file, 'time,' . $all_keys . "\n");
    foreach ($datas as $time => $v) {
        $line = $time;
        foreach ($keys as $key) {
            if (isset($v[$key])) {
                $line .= ',' . $v[$key];
            } else {
                echo "time $time, key $key not exists\n";
                $line .= ',0';
            }
        }
        fwrite($file, $line . "\n");
    }
    fclose($file);
    unset($datas);
}
