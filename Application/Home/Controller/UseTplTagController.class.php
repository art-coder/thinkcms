<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/12 16:40
 */

namespace Home\Controller;

use Common\Controller\BaseController;

class UseTplTagController extends BaseController
{


    public function index()
    {
        $names = [
            'ZhangSan',
            'LiSi',
        ];
        $this->names = $names;
        $this->display();
    }


}