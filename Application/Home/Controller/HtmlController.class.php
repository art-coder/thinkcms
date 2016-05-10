<?php
namespace Home\Controller;

use Common\Controller\BaseController;

class HtmlController extends BaseController
{

    public function index() {
        echo 11;
    }

    public function show() {
        $id = intval(I('get.id'));
        $article = M('article')->find($id);
        if ($article) {
            $this->assign('article', $article);
            $this->display();
        } else {
            $this->redirect(U('Index/index'));
        }
    }

}