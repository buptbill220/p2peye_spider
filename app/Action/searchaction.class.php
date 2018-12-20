<?php
if (!defined('FM_SIM_PHP')) die ('undefied FM_SIM_PHP');

class SearchAction extends IndexAction {
    function index() {
        $type = null;
        $text = null;
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
            $text = $_GET['text'];
        }
        switch ($type) {
            case 'author':
                $index = 'idx_auart';
                break;
            case 'article':
                $index = 'idx_art';
                break;
            case null:
                $index = null;
        }
        if ($index != null) {
            $p = getID($_GET['p'], 1);
            $cl = new SphinxClient ();
            $cl->SetServer ( '127.0.0.1', 9312);
            $cl->SetConnectTimeout ( 3 );
            $cl->SetArrayResult ( true );
            $cl->SetMatchMode ( SPH_MATCH_ANY);
            $cl->SetSortMode(SPH_SORT_RELEVANCE);
            $cl->SetLimits(($p-1)*20, 20, 2000000);
            $res = $cl->Query ( $text, $index );
            $ids = array();
            foreach ($res['matches'] as $m) {
                $ids[] = $m['id'];
            }
            $data = D('index')->query_bbs_art($type, $ids);
#html_dump($data);
            $hits = $res['total_found'];
            $time = $res['time'];
            $max_page = intval($hits / 20) + 1;
            if ($this % 20 == 0) {
                $max_page -= 1;
            }
            if ($p > $max_page) {
                $p = $max_page;
            }
            $this->assign('type', $type);
            $this->assign('text', urlencode($text));
            $this->assign('p', $p);
            $this->assign('tpage', $max_page);
            $this->assign('time', $time);
            $this->assign('hits', $hits);
            $this->assign('data', $data);
            $this->assign('words', array_keys($res['words']));
        }
        $this->get_ip_address();
        $this->display('index');
    }
}
