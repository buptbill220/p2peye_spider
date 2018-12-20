<?php
if (!defined('FM_SIM_PHP')) die ('undefied FM_SIM_PHP');

class DiaryAction extends IndexAction {
    function index() {
        $pid = getID($_GET['pid'], 1);
        $db = D('Index');
        $diary = $db->getArtList(4, $pid);
        if (!$diary) {
            $diary = array();
        }
        $max_page = $db->getMaxArtPage(4);
        $pid = ($pid > $max_page) ? $max_page : $pid;
        $pid = ($pid < 1) ? 1 : $pid;

        $this->assign('pid', $pid);
        $this->assign("tpage", $max_page);
        $this->assign('diary', $diary);

        $this->get_ip_address();
        $this->display("diary");
    }
}
