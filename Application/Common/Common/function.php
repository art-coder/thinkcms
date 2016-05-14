<?php

function show_bug($var) {
    echo '<pre>';
    if (is_array($var)) {
        print_r($var);
    } else {
        var_dump($var);
    }
    echo '</pre>';
}


function get_instance($app = '') {
    static $_instace;
    if (!$app) {
        if ($_instace) {
            return $_instace;
        } else {
            E('必须先调用get_instance方法后才能够使用此方法！');
        }
    } else {
        $_instace = $app;
    }
}

/**
 * 设置主题
 */
function set_theme($theme = '') {
    //判断是否存在设置的模板主题
    if (empty($theme)) {
        $theme_name = C('DEFAULT_THEME');
    } else {
        if (is_dir(MODULE_PATH . 'View/' . $theme)) {
            $theme_name = $theme;
        } else {
            $theme_name = C('DEFAULT_THEME');
        }
    }
    //替换COMMON模块中设置的模板值
    if (C('Current_Theme')) {
        C('TMPL_PARSE_STRING', str_replace(C('Current_Theme'), $theme_name, C('TMPL_PARSE_STRING')));
    } else {
        C('TMPL_PARSE_STRING', str_replace("MODULE_NAME", MODULE_NAME, C('TMPL_PARSE_STRING')));
        C('TMPL_PARSE_STRING', str_replace("DEFAULT_THEME", $theme_name, C('TMPL_PARSE_STRING')));
    }
    C('Current_Theme', $theme_name);
    C('DEFAULT_THEME', $theme_name);
}

/**
 * 获取网站名称
 */
function get_web_name() {
    return C('WEB_NAME');
}


function pass_encrypt($pass) {
    return D('Manage')->passEncrypt($pass);
}

function get_pages($model, $condition, $now_page, $page_size = 10) {
    $where = '';
    if (isset($condition['where'])) {
        $where = $condition['where'];
    }
    $order = '';
    if (isset($condition['order'])) {
        $order = $condition['order'];
    }
    if ($where) {
        $count = $model->where($where)->count();
    } else {
        $count = $model->count();
    }
    if ($where && $order) {
        $list = $model->where($where)->order($order)->page(intval($now_page), $page_size)->select();
    } elseif ($where && !$order) {
        $list = $model->where($where)->page(intval($now_page), $page_size)->select();
    } elseif (!$where && $order) {
        $list = $model->order($order)->page(intval($now_page), $page_size)->select();
    } else {
        $list = $model->page(intval($now_page), $page_size)->select();
    }
    $Page = new \Org\BootstrapPage($count, $page_size);
    $show = $Page->show();// 分页显示输出
    return [
        'list' => $list,
        'page' => $show,
    ];
}
