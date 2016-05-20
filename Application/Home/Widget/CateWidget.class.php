<?php
/**
 * User: Evan.Duan
 * Date: 2016/5/19 14:57
 */
namespace Home\Widget;

use Think\Controller;

class CateWidget extends Controller
{
    public function menu($current = 0) {
        // nav category
        $category = D('Category')->getWebCategory();
        $this->assign('category', $category);
        $this->assign('current', $current);
        $this->display('Cate:menu');
    }
}


