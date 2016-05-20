<?php
/**
 * User: Evan.Duan
 * Date: 2016/3/9 20:53
 */
namespace Common\Model;

use Think\Model;

class ManageModel extends Model
{

    protected $patchValidate = true;

    protected $_validate = array(
        // all
        array('username', 'require', '账号必填！'),
        array('email', 'require', '邮箱必填！'),
        array('email', 'email', '邮箱必须是正确的邮箱地址！'),
        array('truename', 'require', '真实姓名必填！'),
        // add
        array('password', 'require', '密码必填！', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
        array(
            'username',
            'usernameUnique',
            '你填写的用户名已经存在，请重新填写一个！',
            self::MUST_VALIDATE,
            'callback',
            self::MODEL_INSERT
        ),
        // edit
    );

    protected $_auto = [
        // all
        ['password', 'updatePassword', self::MODEL_BOTH, 'callback'],
        // add
        ['created', 'time', self::MODEL_INSERT, 'function'],
        ['updated', 'created', self::MODEL_INSERT, 'field'],
        // update
        ['updated', 'time', self::MODEL_UPDATE, 'function'],
        ['password', '', self::MODEL_UPDATE, 'ignore'],
    ];

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

    public function updatePassword($pass) {
        if ($pass) {
            return $this->passEncrypt($pass);
        } else {
            return '';
        }
    }

    public function logout() {
        session('userinfo', null);
    }

    public function usernameUnique($username) {
        return !$this->where("username='{$username}'")->select();
    }

}




