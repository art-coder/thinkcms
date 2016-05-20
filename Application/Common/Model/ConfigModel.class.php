<?php
/**
 * User: Evan.Duan
 * Date: 2016/5/20 10:35
 */

namespace Common\Model;

use Think\Model;

class ConfigModel extends Model
{

    protected $patchValidate = true;

    public function getConfig() {
        $config = $this->select();
        $return = [];
        if ($config) {
            foreach ($config as $key => $value) {
                $return[$value['name']] = $value['value'];
            }
        }
        return $return;
    }

    public function updateConfig($post) {
        foreach ($post as $key => $value) {
            $filed = strtoupper($key);
            if ($this->where("name='{$filed}'")->select()) {// edit
                $this->where("name='{$filed}'")->save(array('value' => $value));
            } else {// add
                $this->add([
                    'name' => $filed,
                    'value' => $value,
                ]);
            }
        }
    }

}

