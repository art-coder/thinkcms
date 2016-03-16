<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/8 15:20
 */

namespace Admin\Controller;

use Common\Controller\BaseController;

class AdminController extends BaseController
{


    public function _initialize()
    {
        // 验证是否登录后台
        if (!check_admin_login())
            $this->redirect('Login/index');
    }

}