<?php
namespace Home\Controller;

use Home\Common\WebController;

class IndexController extends WebController
{

    public function index() {
        $pages = get_pages(M('article'), ['where' => 'status=1', 'order' => 'id desc'], I('get.p', 1, 'intval'));
        $this->assign('list', $pages['list']);
        $this->assign('page', $pages['page']);
        $this->display();
    }


}