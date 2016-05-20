<?php
/**
 * User: Evan.Duan
 * Date: 2016/5/18 12:04
 */

namespace Home\Common;

use Common\Controller\BaseController;


class WebController extends BaseController
{

    public function __construct() {
        parent::__construct();
        $this->web_config = D('Config')->getConfig();
        if (!$this->web_config['WEB_SITE_CLOSE']) {
            $this->show('<style type="text/css">*{ padding: 0; margin: 0; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>(:</h1><p>' . $this->web_config['WEB_SITE_CLOSE_MSG'] . '</p></div>');
            exit;
        }
    }

}