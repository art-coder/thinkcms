<?php
/**
 * User: Evan.Duan
 * Date: 2016/5/15 9:33
 */

namespace Common\Model;

use Think\Model;

class ArticleModel extends Model
{

    protected $_validate = array(
        // all
        array('title', 'require', '文章标题必填！'),
        array('title', '3, 20', '文章标题必须为3到20个字！', 1, 'length'),
        array('content', 'require', '文章内容必填！'),
//        array('content', '3, 20', '文章内容必须为3到20个字！', 1, 'length'),// for test
        // add
        // edit
    );

    protected $_auto = [
        // add
        ['created', 'time', 1, 'function'],
        ['updated', 'created', 1, 'field'],
        ['uid', 'getAdminSignInUid', 1, 'function'],
        // update
        ['updated', 'time', 2, 'function'],
    ];

}