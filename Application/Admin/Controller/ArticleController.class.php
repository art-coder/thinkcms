<?php
namespace Admin\Controller;

use Think\Controller;

class ArticleController extends AdminController
{

    public function index() {
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
        $this->display();
    }

    public function recycle() {
        $this->display();
    }

}