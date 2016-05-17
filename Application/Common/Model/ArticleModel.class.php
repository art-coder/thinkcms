<?php
/**
 * User: Evan.Duan
 * Date: 2016/5/15 9:33
 */

namespace Common\Model;

use Think\Model;

class ArticleModel extends Model
{
	
	protected $patchValidate = true;

    protected $_validate = array(
        // all
        array('title', 'require', '文章标题必填！'),
        array('title', '1, 80', '文章标题必须为1到80个字！', 1, 'length'),
        array('content', 'require', '文章内容必填！'),
//        array('content', '3, 20', '文章内容必须为3到20个字！', 1, 'length'),// for test
        // add
        // edit
    );

    protected $_auto = [
        // all
        ['thumbnail', 'uploadThumbnail', self::MODEL_BOTH, 'callback'],
        // add
        ['created', 'time', 1, 'function'],
        ['updated', 'created', 1, 'field'],
        ['uid', 'getAdminSignInUid', 1, 'function'],
        // update
        ['updated', 'time', 2, 'function'],
    ];

    public function uploadThumbnail() {
        $is_cancel = I('post.cancel_upload_thumbnail');
        if (!$is_cancel){
            if (isset($_FILES['upload_thumbnail']) && $_FILES['upload_thumbnail']['error'] != 4) {// upload
                $config = array(
                    'rootPath' => './Public/Uploads/',
                    'savePath' => '',
                    'saveName' => array('uniqid', ''),
                    'exts' => array('jpg', 'gif', 'png', 'jpeg'),
                    'autoSub' => true,
                    'subName' => array('date', 'Ym'),
                );
                $upload = new \Think\Upload($config);// 实例化上传类
                $info = $upload->upload();// 上传文件
                if (!$info) {// 上传错误提示错误信息
                    save_admin_flash_msg('上传缩略图失败(请重新上传)：' . $upload->getError(), 'danger');
                } else {// 上传成功
                    return substr($config['rootPath'], 1) .
                        $info['upload_thumbnail']['savepath'] . $info['upload_thumbnail']['savename'];
                }
            }
        }
        $old = I('post.old_thumbnail');
        if ($old && !$is_cancel) {
            return $old;
        } else {
            return null;
        }
    }

}