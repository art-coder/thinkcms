<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/15 16:37
 */
namespace Admin\Controller;

use Think\Controller;

class CommentController extends AdminController
{

    public function index()
    {
        $this->display();
    }

    public function recycle(){
        $this->display();
    }

}