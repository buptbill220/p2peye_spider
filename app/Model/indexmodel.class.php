<?php
class IndexModel extends Model{
    function getMaxArtPage($mid = 0) {
        if ($mid == 0) {
            $wh = "1";
        } else {
            $wh = "menu_id = $mid and enable = 1";
        }
        $res = M('article')->field('count(1) as c')->where($wh)->find();
        return intval(($res['c'] + C('ART_PAGE') - 1) / C('ART_PAGE'));
    }

    function getArtList($mid = 0, $pid = 1, $order = 'create_time') {
        if ($mid == 0) {
            $wh = "menu_id = 4 or menu_id = 6";
        } else {
            $wh = "menu_id = $mid and enable = 1";
        }
        $start = ($pid - 1) * C('ART_PAGE');
        $limit = $start . ',' . C('ART_PAGE');
        return M('article')->field('id,menu_id,title,sub_title,create_time as modify_time,read,love')->where($wh)->order("$order desc")->limit($limit)->select();
    }

    function getArt($aid = 1, $mid = 1) {
        if ($mid == 0) {
            $wh = "menu_id = $mid and enable = 1 and (menu_id = 4 or menu_id = 6)";
        } else {
            $wh = "enable = 1";
        }
        return M('article')->field('id,menu_id,title,sub_title,content,create_time as modify_time,read,love')->where("id = $aid and $wh")->find();
    }

    function query_bbs_art($type, $ids) {
        if ($type == 'author') {
            $table = 'newauart';
        } else {
            $table = 'newart';
        }
        $wh = implode(',', $ids);
        $sql = "select *from $table where id in ($wh) order by id desc";
        $model = new Model;
        return $model->query($sql);
    }
}
