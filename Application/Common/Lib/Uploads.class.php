<?php
/**
 * User: Evan.Duan
 * Date: 2016/5/19 16:18
 */
namespace Common\Lib;

class Uploads
{

    protected $config = array(
        'rootPath' => './Public/Uploads/',
        'exts' => array('jpg', 'gif', 'png', 'jpeg', "bmp", "webp"),
        'subName' => array('date', 'Ym'),
    );

    public function __construct($config = array()) {
        $this->config = array_merge($this->config, $config);
    }

    // 单个文件上传
    public function img($file, $config = array()) {
        $this->config = array_merge($this->config, $config);
        $upload = new \Think\Upload($this->config);// 实例化上传类
        $info = $upload->upload();// 上传文件
        $return = [
            'success' => 1,
            'message' => '上传成功',
            'url' => '',
        ];
        if (!$info) {// 上传错误
            $return['success'] = 0;
            $return['message'] = $upload->getError();
        } else {// 上传成功
            $return['url'] = substr($this->config['rootPath'],
                    1) . $info[$file]['savepath'] . $info[$file]['savename'];
        }

        return $return;
    }

}