<?php
if (!defined('FM_SIM_PHP')) die ('undefied FM_SIM_PHP');

class AboutAction extends IndexAction {
    function index() {
        $db = D('Index');
        $me = $db->getArt(23, 2);

        $this->assign('me', $me);

        $this->get_ip_address();
        $this->display("about");
    }
}
