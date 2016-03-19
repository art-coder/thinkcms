<?php

namespace Admin\Controller;

use Common\Controller\BaseController;

class UserController extends BaseController
{

    public function index()
    {
        $this->display();
    }

    public function add()
    {
        $this->display();
    }

    public function recycle()
    {
        $this->display();
    }

    public function test()
    {
        show_bug(get_defined_constants(true));
    }

}
