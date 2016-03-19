<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/16 8:54
 */

namespace Admin\Controller;

use Common\Controller\BaseController;

class LoginController extends BaseController
{

    public function index()
    {
        if (IS_POST) {
            $error = D('Manage')->login(I('post.username'), I('post.password'));
            if ($error) {
                $this->error = $error;
            } else {
                $this->redirect('Index/index');
            }
        }
        $this->display();
    }

    public function logout()
    {
        D('Manage')->logout();
        $this->redirect('Login/index');
    }

    public function findpass()
    {
        $this->display();
    }

    public function test()
    {
        show_bug(get_defined_constants(true));
    }

}
