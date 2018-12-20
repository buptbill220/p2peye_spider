<?php
if (!defined('FM_SIM_PHP')) die ('undefied FM_SIM_PHP');

class ArtAction extends IndexAction {
    function index() {
        $db = D('Index');
        $aid = getID($_GET['aid']);
        $art = $db->getArt($aid);

        $cd = $this->get_cached($aid, $art);
        $art['read'] = $cd[0];
        $art['love'] = $cd[1];
        $this->assign('art', $art);

        $this->get_ip_address();
        $this->display("art");
    }

    protected function get_cached($aid, $art) {
        $key = $aid . 'r';
        $val = $art['read'] + 1;
        $cache = Cache::getInstance();
        if (false === $cache->get($key)) { 
            $cache->set($key, $val, C('CACHE_TIME')); 
        } else {
            $val = $cache->incr($key);
        }
        $re = array($val);
        $key = $aid . 'l';
        $val = $cache->get($key);
        if (false === $val) {
            $cache->set($key, $art['love'], C('CACHE_TIME'));
            $val = $art['love'];
        }
        $re[] = $val;
        return $re;
    }

    function dz() {
        if (!isset($_POST['aid'])) {
            echo "error";
            return ;
        }
        $aid = $_POST['aid'];
        if (intval($aid) != $aid) {
            echo "error";
            return ;
        }
        $cache = Cache::getInstance();
        if (false != $cache->get(session_id() . $aid)) {
            echo "error2";
            return ;
        }
        if (false != $cache->get(get_client_ip() . '_' . $aid)) {
            echo "error2";
            return ;
        }
        $key = $aid . 'l';
        if (false === $cache->get($key)) {
            echo "error1";
            return ;
        }
        $val = $cache->incr($key);
        $cache->set(session_id() . $aid, 1, C('CACHE_TIME'));
        $cache->set(get_client_ip() . '_' . $aid, 1, C('CACHE_TIME'));
        echo $val;
    }

}
