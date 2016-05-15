<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/9 20:53
 */
namespace Common\Model;

use Think\Model;

class ManageModel extends Model
{

    protected $_validate = array(
        //all
        array('username', 'require', '账号必填！'),
        // login
        array('password', 'require', '密码必填！', 1, 'regex', 4),
    );

    // 用户登录
    public function login($username, $password) {
        $return = [];
        $result = $this->where(['username' => $username, 'password' => $this->passEncrypt($password)])->find();
        if ($result) {
            if ($result['status']) {
                $this->setSession($result);
                $now = time();
                $data['last_login_time'] = $now;
                $data['updated'] = $now;
                $data['last_login_ip'] = get_client_ip();
                $this->where(['id' => $result['id']])->save($data);
            } else {
                $return['username'] = '用户被锁定，请联系管理员！';
            }
        } else {
            $return['username'] = '用户名或密码错误！';
        }

        return $return;
    }

    public function checkAdminLogin() {
        if (session('userinfo')) {
            return true;
        } else {
            return false;
        }
    }

    public function setSession($userinfo) {
        unset($userinfo['status']);
        unset($userinfo['password']);
        unset($userinfo['updated']);
        unset($userinfo['created']);
        session('userinfo', $userinfo);
    }

    public function passEncrypt($pass) {
        return md5($pass);
    }

    public function logout() {
        session('userinfo', null);
    }

}




