<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/15 20:29
 */
namespace Admin\Controller;

use Think\Controller;

class AddonsController extends AdminController
{

    public function index() {
        $this->display();
    }

    public function add() {
        $this->display();
    }

    public function edit() {
        $this->display();
    }

    public function recycle() {
        $this->display();
    }

    public function upload() {
        $upload = new \Common\Lib\Uploads();// 实例化上传类
        $this->ajaxReturn($upload->img('editormd-image-file'));
    }

}
