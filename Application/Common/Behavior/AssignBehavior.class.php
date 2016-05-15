<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Common\Behavior;

/**
 * 行为扩展：分配error错误信息给模板
 */
class AssignBehavior {

    public function run() {
        $app = get_instance();
        $app->assignValues('error', $app->error);
        $flash_msg = get_admin_flash_msg();
        $app->assignValues('flash_msg', $flash_msg);
    }

}
