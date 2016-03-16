<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/11 22:47
 */

namespace Common\Controller;

use Think\Controller;


class BaseController extends Controller
{

    public $error = [];

    public function __construct(){
        parent::__construct();
        get_instance($this);
        // 设置模板
        set_theme();// 必须调用一次，以便解析定义的css等变量
    }

    /* 空操作，用于输出404页面 */
    public function _empty()
    {
        $this->redirect('Index/index');
    }

    public function assignValues($name, $value = '')
    {
        $this->assign($name, $value);
        return $this;
    }

}