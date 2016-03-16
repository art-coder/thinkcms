<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends AdminController
{

    public function index()
    {
        $this->display();
    }

    public function web(){
        $this->display();
    }

    public function test(){
        $this->display();
    }

}