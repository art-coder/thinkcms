<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/16 8:54
 */

namespace Admin\Controller;

use Common\Controller\BaseController;

class LoginController extends BaseController
{

    public function index() {
        if (IS_POST) {
            $Manage = D('Manage');
            if (!$Manage->create($_POST, 4)) {
                save_admin_flash_msg($Manage->getError(), 'danger');
            } else {
                $errors = $Manage->login(I('post.username'), I('post.password'));
                if ($errors) {
                    foreach ($errors as $error) {
                        save_admin_flash_msg($error, 'danger');
                    }
                } else {
                    $this->redirect('Index/index');
                }
            }
        }
        $this->display();
    }

    public function logout() {
        D('Manage')->logout();
        $this->redirect('Login/index');
    }

    public function findpass() {
        $this->display();
    }

    public function test() {
        show_bug(get_defined_constants(true));
    }

}
