<?php
if (!defined('FM_SIM_PHP')) die ('undefied FM_SIM_PHP');

class LearnAction extends IndexAction {
    function index() {
        $pics = array('images/s.jpg', 'images/s1.jpg', 'images/s2.jpg', 'images/s3.jpg');
        $pid = getID($_GET['pid'], 1);
        $db = D('Index');
        $learn = $db->getArtList(6, $pid);
        if (!$learn) {
            $learn = array();
        }

        $max_page = $db->getMaxArtPage(6);
        $pid = ($pid > $max_page) ? $max_page : $pid;
        $pid = ($pid < 1) ? 1 : $pid;

        $this->assign('pics', $pics);
        $this->assign('pn', 4);
        $this->assign('pid', $pid);
        $this->assign('tpage', $max_page);
        $this->assign('learn', $learn);

        $this->get_ip_address();
        $this->display("learn");
    }
}
