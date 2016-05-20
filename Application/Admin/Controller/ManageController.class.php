<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/15 16:29
 */

namespace Admin\Controller;

use Think\Controller;


class ManageController extends AdminController
{

    public function index() {
        $this->assign('action', 'index');
        $this->assign('list', M('manage')->where('status=1')->order('id desc')->select());
        $this->display();
    }

    public function recycle() {
        $this->assign('action', 'recycle');
        $this->assign('list', M('manage')->where('status=0')->order('id desc')->select());
        $this->display('index');
    }

    public function add() {
        $this->assign('action', 'add');
        $this->assign('info', $_GET);
        $this->display();
    }

    public function edit() {
        $id = I('get.id', session('userinfo')['id'], 'intval');
        $this->assign('info', M('manage')->find($id));
        $this->assign('action', 'edit');
        $this->display('add');
    }

    public function save() {
        if (IS_POST) {// save
            $Manage = D('Manage');
            $id = I('post.id');
            $mode = 'add';
            if ($id) {
                $mode = 'edit';
            }
            if (!($save = $Manage->create())) {
                foreach ($Manage->getError() as $error) {
                    save_admin_flash_msg($error, 'danger');
                }
                $this->redirect(I('post.action', 'add'), $_POST);
            } else {
                if ($mode == 'add') {
                    save_admin_flash_msg('添加管理员成功！！！');
                    $Manage->add();
                } else {
                    save_admin_flash_msg('修改管理员成功！！！');
                    $Manage->save($save);
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
        if ($id == 1) {
            $this->ajaxReturn(array('status' => 0, 'info' => '超级用户不能进行此操作'));
        }
        $Manage = M('Manage');
        $info = $Manage->find($id);
        if (!$info) {
            $this->ajaxReturn(array('status' => 0, 'info' => '该用户不存在'));
        }
        switch (I('post.mode')) {
            case 'status':
                if ($info['status']) {
                    $status = 0;
                } else {
                    $status = 1;
                }
                $result = $Manage->where(array('id' => $id))->setField('status', $status);
                if (false != $result) {
                    save_admin_flash_msg('用户状态更新成功(#' . $id . ')！！！');
                    $this->ajaxReturn(array('status' => 1, 'info' => '用户状态更新成功'));
                } else {
                    $this->ajaxReturn(array('status' => 0, 'info' => '用户状态更新失败'));
                }
                break;
            case 'delete':
                $result = $Manage->where('id=' . $id)->delete();;
                if ($result) {
                    save_admin_flash_msg('彻底删除用户成功(#' . $id . ')！！！');
                    $this->ajaxReturn(array('status' => 1, 'info' => '彻底删除用户成功(#' . $id . ')！！！'));
                } else {
                    $this->ajaxReturn(array('status' => 0, 'info' => '彻底删除用户失败(#' . $id . ')！！！'));
                }
                break;
            default :
                save_admin_flash_msg('非法请求！！！', 'danger');
                $this->redirect('index');
        }
    }

}


