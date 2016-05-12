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
