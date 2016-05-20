<?php
namespace Home\Controller;

use Home\Common\WebController;

class HtmlController extends WebController
{

    public function index() {
        $this->redirect(U('Index/index'));
    }

    public function article() {
        $id = intval(I('get.id'));
        $Article = M('article');
        $article = $Article->find($id);
        if ($article) {
            $this->assign('article', $article);
            $this->assign('current_menu', D('Category')->getTopMenuCid(M('category')->find($article['cid'])));
            $this->assign('older',
                $Article->field('id,title')->where('id<' . $article['id'] . ' AND status = 1')->order('id desc')->find());
            $this->assign('newer',
                $Article->field('id,title')->where('id>' . $article['id'] . ' AND status = 1')->order('id desc')->find());
            $this->display();
        } else {
            $this->redirect(U('Index/index'));
        }
    }

    public function category($id = 0) {
        if (!$id) {
            $this->redirect(U('Index/index'));
            exit;
        }
        $Category = D('Category');
        $info = $Category->find($id);
        if (!$info || $info['is_show'] == 0 || $info['status'] == 0) {
            $this->redirect(U('Index/index'));
        }
        $this->assign('current_menu', $Category->getTopMenuCid($info));
        $this->assign('info', $info);
        $pages = get_pages(M('article'), ['where' => 'status=1 AND cid=' . $id, 'order' => 'id desc'],
            I('get.p', 1, 'intval'));
        $this->assign('list', $pages['list']);
        $this->assign('page', $pages['page']);
        $this->display();
    }

}