<?php
/**
 * User: Evan.Duan
 * Date: 2016/5/16 10:14
 */


namespace Common\Model;

use Think\Model;
use Common\Lib\Category;

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

    public function getWebCategory() {
        $list = $this->field('id,pid,title')->order('sort ASC')->where('status=1 AND is_show = 1')->select();

        return Category::toLayer($list);
    }

    public function getTopMenuCid($category) {
        if ($category['pid']) {
            return $this->getTopMenuCid($this->find($category['pid']));
        } else {
            return $category['id'];
        }
    }

}