<?php
if (!defined('FM_SIM_PHP')) die ('undefied FM_SIM_PHP');

class MoodAction extends IndexAction {
    function index() {
        $pid = getID($_GET['pid'], 1);
        $db = D('Index');
        $mood = $db->getArtList(3, $pid);
        if (!$mood) {
            $mood = array();
        }
        $max_page = $db->getMaxArtPage(3);
        $pid = ($pid > $max_page) ? $max_page : $pid;
        $pid = ($pid < 1) ? 1 : $pid;

        $this->assign('pid', $pid);
        $this->assign("tpage", $max_page);
        $this->assign('mood', $mood);

        $this->get_ip_address();
        $this->display("mood");
    }
}
