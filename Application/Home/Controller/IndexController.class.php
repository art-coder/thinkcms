<?php
namespace Home\Controller;

use Common\Controller\BaseController;

class IndexController extends BaseController
{

    public function index()
    {

//        echo U('index/index');
//        show_bug(D('role'));// Home\Model\RoleModel
//        show_bug(D('Manage'));
//        D('Manage');
//        D('Role');
//        show_bug(D('Role'));

//        show_bug($this->_error);
//        $this->_error = [];
        $this->error['username'] = '请填写用户名';
        $this->title = '我是一个兵，打死老百姓！';
        $this->display();
        show_bug(get_defined_constants(true));
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8');
    }



    public function ss(){
        echo 33333;
    }

}