<?php
if (!defined('FM_SIM_PHP')) die ('undefied FM_SIM_PHP');

class MessageAction extends IndexAction {
    function index() {
        $this->get_ip_address();
        $this->display("message");
    }
}
