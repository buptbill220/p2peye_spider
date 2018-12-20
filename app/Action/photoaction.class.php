<?php
if (!defined('FM_SIM_PHP')) die ('undefied FM_SIM_PHP');

class PhotoAction extends IndexAction {
    function index() {
        $this->get_ip_address();
        $this->display("photo");
    }
}
