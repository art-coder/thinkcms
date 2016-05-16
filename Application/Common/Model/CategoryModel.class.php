<?php
/**
 * User: Evan.Duan
 * Date: 2016/5/16 10:14
 */


namespace Common\Model;

use Think\Model;

class CategoryModel extends Model
{

    protected $patchValidate = true;

    protected $_validate = array(
        // all
        array('title', 'require', '栏目名称必填！'),
        // add
        // edit
        array('pid', 'checkParentCategory', '父级分类不能为自己！！', 1, 'callback', self::MODEL_UPDATE),
    );

    protected $_auto = [
        // add
        ['created', 'time', 1, 'function'],
        ['updated', 'created', 1, 'field'],
        // update
        ['updated', 'time', 2, 'function'],
    ];

    public function checkParentCategory($pid) {
        $id = I('post.id');

        return $pid == $id ? false : true;
    }

}