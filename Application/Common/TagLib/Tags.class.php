<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/12 16:51
 */

namespace Common\TagLib;

use Think\Template\TagLib;


class Tags extends TagLib
{

    protected $tags = array(
        'info' => array(
            'attr' => 'userid, item',
            'close' => 1//close 标签是否为闭合方式(0闭合 1不闭合)，默认不闭合
        )
    );

    public function _info($tag, $content)
    {
        $userid = $tag['userid'];
        $item = $tag['item'];
        $age = $userid * 10;
        $info = '我是两个兵，杀死老百姓！！';
        $str = '';
        $str .= '<?php ';
        $str .= '$' . $item . '=["age" => ' . $age . ', "info" => "' . $info . '"]';
        $str .= '?>';
        return $str . $content;
    }

}