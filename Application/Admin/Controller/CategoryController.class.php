<?php

namespace Admin\Controller;

use Think\Controller;
use Common\Lib\Category;

class CategoryController extends AdminController
{
    //栏目列表页
    public function index() {
        $category_list = M('category')->order('sort desc')->select();
        $category_list = Category::toLevel($category_list, '&nbsp;&nbsp;&nbsp;&nbsp;', 0);
//        show_bug($category_list);
        $this->assign('category_list', $category_list);
        $this->display();
    }

    //增加 栏目页面
    public function add() {
        $pid = I('get.pid', 0);
        $parent_category_info = M('Category')->where(array('id' => $pid))->find();
        if ($parent_category_info) {
            $this->assign('pid', $pid);
            $this->assign('parent_category_info', $parent_category_info);
        }
        $category_list = M('category')->order('sort desc')->select();
        $category_list = Category::toLevel($category_list, '---', 0);
        $this->assign('category_list', $category_list);
        $this->assign('action', 'add');
        $this->display();
    }


    //修改栏目
    public function edit() {
        $category_id = I('id');
        $category_info = M('Category')->find($category_id);
        $category_list = M('category')->order('sort desc')->select();
        $category_list = Category::toLevel($category_list, '---', 0);
        $this->assign('category_list', $category_list);
        $this->assign('action', 'edit');
        $this->assign('category_id', $category_id);
        $this->assign('category_info', $category_info);
        $this->display('add');
    }

    //保存栏目
    public function save() {
        if (IS_POST) {// save
            $Category = D('Category');
            $id = I('post.id');
            $mode = 'add';
            if ($id) {
                $mode = 'edit';
            }
            if (!($save = $Category->create())) {
                foreach ($Category->getError() as $error) {
                    save_admin_flash_msg($error, 'danger');
                }
                $this->redirect('index');
            } else {
                if ($mode == 'add') {
                    save_admin_flash_msg('添加栏目信息成功！！！');
                    $Category->add();
                } else {
                    save_admin_flash_msg('修改栏目信息成功！！！');
                    $Category->save($save);
                }
                $this->redirect('index');
            }
        } else {
            save_admin_flash_msg('非法请求！', 'danger');
            $this->redirect('index');
        }
    }

    //更新状态
    public function change_status() {
        $id = I('id');
        $Category = M('Category');
        $category_info = $Category->find($id);
        if (!$category_info) {
            $this->ajaxReturn(array('info' => '该栏目不存在'));
        } else {
            if ($category_info['status']) {
                $status = 0;
            } else {
                $status = 1;
            }
            $result = $Category->where(array('id' => $id))->setField('status', $status);
            if (false != $result) {
                $this->ajaxReturn(array('status' => 'ok', 'info' => '栏目状态更新成功'));
            } else {
                $this->ajaxReturn(array('info' => '栏目状态更新失败'));
            }
        }
    }

}