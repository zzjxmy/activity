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
    public $defaultField = [];
    public $request;
    public $field;
    private $allowField = ['token'];
    public function check(Request $request){
        $this->defaultField = $this->getData()['fields'];
        $this->request = $request;
        if(count($this->defaultField) || $request->input('token')){
            $this->filter()->required()->mergeExistAndUnRequired()->unique()->default();
        }
        return [];
    }

    /**
     * 字段过滤
     */
    public function filter(){
        $data = [];
        foreach ($this->request->input() as $key => $value){
            if(in_array($key,$this->attributes['fields']) || in_array($key,$this->allowField)){
                $data[$key] = $value;
            }
        }
        $this->data = $data;
        return $this;
    }

    /**
     * 字段唯一性设置
     */
    public function unique(){
        return $this;
    }

    /**
     * 字段必填
     */
    public function required(){
        $diff = array_diff($this->getAllRequired(),array_flip($this->data));
        if(count($diff))throw new \Exception($this->attributes['name'][reset($diff)] . '必填');
        return $this;
    }

    /**
     * 合并不存在且非必填的数据
     */
    public function mergeExistAndUnRequired(){
        $unRequiredFields = $this->getAllRequired(0);
        $merge = [];
        foreach ($unRequiredFields as $key => $val){
            $merge[$val] = $this->getDefault($val);
        }
        $this->data = array_merge($merge,$this->data);
        return $this;
    }

    /**
     * 字段默认值
     */
    public function default(){
        return $this;
    }

    /**
     * 字段搜索
     */
    public function search(){

    }


}