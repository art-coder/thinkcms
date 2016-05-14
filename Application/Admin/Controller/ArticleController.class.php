<?php
namespace Admin\Controller;

use Think\Controller;

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
        if (IS_POST) {
            $title = I('post.title');
            $content = I('post.content');
            $error = [];
            if (!$title) {
                $error['title'] = '文章标题必填！';
            }
            if (!$content) {
                $error['content'] = '文章内容必填！';
            }
            if ($error) {
                $this->error = $error;
            } else {
                $time = time();
                $Article = M("article"); // 实例化User对象
                $Article->add([
                    'title' => $title,
                    'content' => $content,
                    'uid' => session('userinfo.id'),
                    'updated' => $time,
                    'created' => $time,
                ]);
                $this->redirect('Article/index');
            }
        }
        $this->display();
    }

    public function edit() {
        if (IS_POST) {
            $title = I('post.title');
            $content = I('post.content');
            $id = I('post.aid');
            $error = [];
            if (!$title) {
                $error['title'] = '文章标题必填！';
            }
            if (!$content) {
                $error['content'] = '文章内容必填！';
            }
            if ($error) {
                $this->error = $error;
            } else {
                $Article = M("article");
                $Article->title = $title;
                $Article->content = $content;
                $Article->updated = time();
                $Article->where('id=' . intval($id))->save();
                $this->redirect('Article/index');
            }
        } else {
            $id = I('get.id');
            $article = M('article')->find($id);
            if ($article) {
                $this->assign('article', $article);
                $this->display();
            } else {
                $this->redirect(U('index'));
            }
        }
    }

    public function recycle() {
        $this->display();
    }

}