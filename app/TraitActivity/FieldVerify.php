<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/13
 * Time: 9:40
 */

namespace App\TraitActivity;


use Illuminate\Http\Request;

trait FieldVerify{
    use FieldInfo;
    public $field = [];
    public $request;
    public function check(Request $request){
        $this->field = $this->getData()['fields'];
        $this->request = $request;
        if(!count($this->field)){
            $this->filter();
        }
        return [];
    }

    /**
     * 字段过滤
     */
    public function filter(){
        $data = [];
        foreach ($this->request as $key => $value){
            if(in_array($key,$this->attributes['fields'])){
                $data[$key] = $value;
            }
        }
        return $data;
    }

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