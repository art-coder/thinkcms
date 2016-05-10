<?php
namespace Admin\Controller;

use Think\Controller;

class ArticleController extends AdminController
{

    public function index() {
        $article = M('article');
        $page_num = 4;
        $list = $article->where('status=1')->order('id desc')->page(intval(I('get.p')), $page_num)->select();
        $this->assign('list', $list);// 赋值数据集
        $count = $article->where('status=1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $page_num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
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