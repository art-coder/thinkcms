<?php
namespace Admin\Controller;

use Think\Controller;
use Common\Lib\Category;

class ArticleController extends AdminController
{

    public function index() {
        $article = M('article');
        $pages = get_pages($article, ['where' => 'status=1', 'order' => 'id desc'], intval(I('get.p')));
        $this->assign('list', $pages['list']);
        $this->assign('page', $pages['page']);
        $this->display();
    }

    public function add() {
        $cid = I('post.cid', 0);
        if (IS_POST) {
            $Article = D("Article");
            if (!$Article->create()) {
                foreach ($Article->getError() as $error) {
                    save_admin_flash_msg($error, 'danger');
                }
            } else {
                $Article->add();
                save_admin_flash_msg('添加文章成功！！！');
                $this->redirect('index');
            }
        }
        $category_list = M('category')->order('sort desc')->select();
        $category_list = Category::toLevel($category_list, '---', 0);
        $this->assign('data', $_POST);
        $this->assign('cid', $cid);
        $this->assign('category_list', $category_list);
        $this->display();
    }

    public function edit() {
        $id = I('request.id');
        $Article = D("Article");
        $article = $Article->find($id);
        if ($article) {
            $category_list = M('category')->order('sort desc')->select();
            $category_list = Category::toLevel($category_list, '---', 0);
            $cid = I('post.cid', $article['cid']);
            $this->assign('cid', $cid);
            $this->assign('category_list', $category_list);
            if (IS_POST) {// edit
                if (!($save = $Article->create())) {
					foreach ($Article->getError() as $error) {
						save_admin_flash_msg($error, 'danger');
					}
                    $this->assign('data', $_POST);
                    $this->display();
                } else {
                    $Article->save($save);
                    save_admin_flash_msg('修改文章成功！！！');
                    $this->redirect('index');
                }
            } else {// show
                $this->assign('data', $article);
                $this->display();
            }
        } else {
            save_admin_flash_msg('非法请求！！！', 'danger');
            $this->redirect('index');
        }
    }

    public function recycle() {
        $article = M('article');
        $pages = get_pages($article, ['where' => 'status=0', 'order' => 'id desc'], intval(I('get.p')));
        $this->assign('list', $pages['list']);
        $this->assign('page', $pages['page']);
        $this->display();
    }

    public function operate() {
        $id = intval(I('get.id'));
        if (!$id) {
            save_admin_flash_msg('非法请求！！！', 'danger');
            $this->redirect('index');
        }
        switch (I('get.mode')) {
            case 'recycle':
                $result = M('article')->where('id=' . $id)->save(['status' => 0]);
                if ($result) {
                    save_admin_flash_msg('删除文章到回收站成功(#' . $id . ')！！！');
                    $this->redirect('index');
                } else {
                    save_admin_flash_msg('删除文章到回收站失败(#' . $id . ')！！！', 'danger');
                }
                break;
            case 'recover':
                $result = M('article')->where('id=' . $id)->save(['status' => 1]);
                if ($result) {
                    save_admin_flash_msg('恢复文章成功(#' . $id . ')！！！');
                    $this->redirect('index');
                } else {
                    save_admin_flash_msg('恢复文章失败(#' . $id . ')！！！', 'danger');
                }
                break;
            case 'delete':
                $result = M('article')->where('id=' . $id)->delete();;
                if ($result) {
                    save_admin_flash_msg('彻底删除文章成功(#' . $id . ')！！！');
                    $this->redirect('recycle');
                } else {
                    save_admin_flash_msg('彻底删除文章失败(#' . $id . ')！！！', 'danger');
                }
                break;
            default :
                save_admin_flash_msg('非法请求！！！', 'danger');
                $this->redirect('index');
        }
    }

}