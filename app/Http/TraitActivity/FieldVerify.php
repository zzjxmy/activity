<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/13
 * Time: 9:40
 */

namespace App\Http\TraitActivity;


trait FieldVerify{
    use FieldInfo;
    /**
     * 字段唯一性设置
     */
    public function unique(){

    }

    /**
     * 字段必填
     */
    public function required(){

    }

    /**
     * 字段默认值
     */
    public function default(){

    }

    /**
     * 字段搜索
     */
    public function search(){

    }


}