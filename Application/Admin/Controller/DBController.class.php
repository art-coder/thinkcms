<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/16 12:03
 */

namespace Admin\Controller;

use Think\Controller;

class DBController extends AdminController
{

    public function index()
    {
        $this->display();
    }

    public function undo(){
        $this->display();
    }

    public function recycle(){
        $this->display();
    }

}