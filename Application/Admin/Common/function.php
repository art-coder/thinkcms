<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/14 17:38
 */

function get_nav()
{
    $navs = C('navs.relation');
    $li   = '';
    foreach ($navs as $val) {
        $active = '';
        if (in_array(CONTROLLER_NAME, $val['lists'])) {
            $active = "active";
        }
        $li .= '<li class="' . $active . '"}><a href="' . U($val['link']) . '">' . $val['name'] . '</a></li>';
    }
    return $li;
}

function admin_left_nav()
{
    $navs = C('navs');
    foreach ($navs['relation'] as $key => $val) {
        if (in_array(CONTROLLER_NAME, $val['lists'])) {
            if ($navs[$key]['level'] == 1) {
                $nav = '';
                foreach ($navs[$key]['items'] as $item) {
                    $icon = '';
                    if (isset($item['icon'])) {
                        $icon = '<i class="fa ' . $item['icon'] . '"></i>&nbsp;';
                    }
                    $class     = '';
                    $nav_items = get_admin_left_nav_items($item['uri']);
                    if ($nav_items['class']) {
                        $class = ' class="' . $nav_items['class'] . '"';
                    }
                    $nav .= '<li' . $class . '><a href="' . $nav_items['url'] . '">' . $icon . $item['name'] . '</a></li>';
                }
            } else {
                $nav = '';
                foreach ($navs[$key]['items'] as $items) {
                    $active   = '';
                    $collapse = ' collapse ';
                    if (in_array(CONTROLLER_NAME, explode(',', $items['lists']))) {
                        $active   = ' class="active"';
                        $collapse = '';
                    }
                    $level_top_icon = '';
                    if (isset($items['icon'])) {
                        $level_top_icon = '<i class="fa ' . $items['icon'] . '"></i>&nbsp;';
                    }
                    $ul = '<ul id="secondNav' . $items['group'] . '" class="nav nav-list ' . $collapse . ' secondmenu">';
                    foreach ($items['items'] as $item) {
                        // active second item
                        $secondActive = '';
                        if ($active) {
                            $uri       = $item['uri'];
                            $uriArr    = explode('.', $uri);
                            $uriString = isset($uriArr[0]) ? $uriArr[0] : null;
                            $nowUri    = CONTROLLER_NAME . '/' . ACTION_NAME;
                            if ($uriString == $nowUri) {
                                $secondActive = 'active';
                            }
                        }
                        $nav_items         = get_admin_left_nav_items($item['uri']);
                        $level_second_icon = '';
                        if (isset($item['icon'])) {
                            $level_second_icon = '<i class="fa ' . $item['icon'] . '"></i>&nbsp;';
                        }
                        $ul .= '<li class="' . $nav_items['class'] . ' ' . $secondActive . '"><a href="' . $nav_items['url'] . '">' .
                            $level_second_icon . $item['name'] . '</a></li>';
                    }
                    $ul .= '</ul>';
                    $nav .= '<li' . $active . '><a class="nav-header collapsed" data-toggle="collapse" href="#secondNav' .
                        $items['group'] . '">' . $level_top_icon . $items['name'] .
                        '<span class="pull-right glyphicon glyphicon-chevron-down"></span></a>' . $ul . '</li>';
                }
            }
        }
    }
    return $nav;
}

function get_admin_left_nav_items($uri)
{
    $uris  = explode('/', $uri);
    $class = '';
    if (strpos($uris[1], '.')) {
// 本身uri中自带的class
        $classes = explode('.', $uris[1]);
        $url     = U($uris[0] . '/' . $classes[0]);
        if (CONTROLLER_NAME == $uris[0] && ACTION_NAME == $classes[0]) {
            $class = 'active'; // 访问当前url，去掉自带的class，并设置为active
        } else {
            unset($classes[0]);
            $class .= join($classes, ' ');
        }
    } else {
        if (CONTROLLER_NAME == $uris[0] && ACTION_NAME == $uris[1]) {
            $class = 'active'; // 访问当前url，去掉自带的class，并设置为active
        }
        $url = U($uri);
    }
    return [
        'class' => $class,
        'url'   => $url,
    ];
}

function check_admin_login()
{
    return D('Manage')->checkAdminLogin();
}
