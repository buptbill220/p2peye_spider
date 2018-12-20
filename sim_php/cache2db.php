<?php
date_default_timezone_set('PRC');
require_once('define.php');
require_once(FM_SIM_CORE . 'autoload.class.php');
$loader = Autoload::init(FM_SIM_PATH);
Autoload::requireAll(FM_SIM_COMMON);
Autoload::requireAll(FM_SIM_EXT);

echo "begin to dump cache to db at time " . date('Y-m-d H:i:s', time()) . "\n";
$db = M('article');
$art = $db->field('id, read, love')->where('enable = 1')->select();
$cache = Cache::getInstance();
$cache->init();
foreach ($art as $a) {
    $key = $a['id'] . 'r';
    $read = $cache->get($key);
    $key = $a['id'] . 'l';
    $love = $cache->get($key);
    if ($read === false && $love === false) {
        continue;
    }
    if ($read !== false) {
        $sql = "update st_article set `read` = $read where id = {$a['id']}";
        $db->execute($sql);
        echo $sql . "\n";
    }
    if ($love !== false) {
        $sql = "update st_article set `love` = $love where id = {$a['id']}";
        $db->execute($sql);
        echo $sql . "\n";
    }
}

echo "end to dump cache to db at time " . date('Y-m-d H:i:s', time()) . "\n";
