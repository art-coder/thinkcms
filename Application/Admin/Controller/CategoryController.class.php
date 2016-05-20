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
        $this->assign('category_list', $category_list);
        $this->display();
    }

    //增加 栏目页面
    public function add() {
        $pid = I('get.pid', 0);
        $this->assign('pid', $pid);
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

    public function operate() {
        $id = intval(I('post.id'));
        if (!$id) {
            $this->ajaxReturn(array('status' => 0, 'info' => '非法请求'));
        }
        $Category = M('Category');
        $category_info = $Category->find($id);
        if (!$category_info) {
            $this->ajaxReturn(array('status' => 0, 'info' => '该栏目不存在'));
        }
        switch (I('post.mode')) {
            case 'status':
                if ($category_info['status']) {
                    $status = 0;
                } else {
                    $status = 1;
                }
                $result = $Category->where(array('id' => $id))->setField('status', $status);
                if (false != $result) {
                    save_admin_flash_msg('栏目状态更新成功(#' . $id . ')！！！');
                    $this->ajaxReturn(array('status' => 1, 'info' => '栏目状态更新成功'));
                } else {
                    $this->ajaxReturn(array('status' => 0, 'info' => '栏目状态更新失败'));
                }
                break;
            case 'show':
                if ($category_info['is_show']) {
                    $show = 0;
                } else {
                    $show = 1;
                }
                $result = $Category->where(array('id' => $id))->setField('is_show', $show);
                if (false != $result) {
                    save_admin_flash_msg('栏目是否显示更新成功(#' . $id . ')！！！');
                    $this->ajaxReturn(array('status' => 1, 'info' => '栏目是否显示更新成功'));
                } else {
                    $this->ajaxReturn(array('status' => 0, 'info' => '栏目是否显示更新失败'));
                }
                break;
            case 'delete':
                $result = $Category->where('id=' . $id)->delete();;
                if ($result) {
                    save_admin_flash_msg('彻底删除栏目成功(#' . $id . ')！！！');
                    $this->ajaxReturn(array('status' => 1, 'info' => '彻底删除栏目成功(#' . $id . ')！！！'));
                } else {
                    $this->ajaxReturn(array('status' => 0, 'info' => '彻底删除栏目失败(#' . $id . ')！！！'));
                }
                break;
            default :
                save_admin_flash_msg('非法请求！！！', 'danger');
                $this->redirect('index');
        }
    }

    public function recycle() {
        $category_list = M('category')->where('status=0')->order('sort desc')->select();
        $category_list = Category::toLevel($category_list, '&nbsp;&nbsp;&nbsp;&nbsp;', 0);
        $this->assign('category_list', $category_list);
        $this->display();
    }

}