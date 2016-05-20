<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends AdminController
{

    public function index() {
        $this->display();
    }

    public function web() {
        if (IS_POST) {
            D('Config')->updateConfig($_POST);
            save_admin_flash_msg('修改配置成功');
        }
        $config = D('Config')->getConfig();
        $this->assign('config', $config);
        $this->display();
    }

    public function test() {
        $this->display();
    }

}
