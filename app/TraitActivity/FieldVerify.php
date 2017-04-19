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
    public $saveData;
    private $allowField = ['token'];
    public function fieldCheck(Request $request){
        $this->defaultField = $this->getData()['fields'];
        $this->request = $request;
        if(count($this->defaultField) || $request->input('token')){
            $this->filter()->required()->mergeExistAndUnRequired()->unique();
        }
        return $this;
    }

    /**
     * 字段过滤
     */
    public function filter(){
        $data = [];
        foreach ($this->request->input() as $key => $value){
            if(in_array($key,$this->attributes['fields']) || in_array($key,$this->allowField)){
                $data[$key] = $this->fieldTypeTransform($value,$this->getFieldType($key));
            }
        }
        $this->saveData = $data;
        return $this;
    }

    /**
     * 字段唯一性设置
     */
    public function unique(){
        array_walk($this->saveData,function($value,$key){
            if($this->getUnique($key)){
                if(\DB::table($this->data['table_name'])->where($key,$value)->count()){
                    throw new \Exception($this->attributes['name'][$key] .'已经存在');
                }
            }
        });
        return $this;
    }

    /**
     * 字段必填
     */
    public function required(){
        $diff = array_diff($this->getAllRequired(),array_flip($this->saveData));
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
        $this->saveData = array_merge($merge,$this->saveData);
        return $this;
    }

    /**
     * 字段搜索
     */
    public function search(){

    }

    /**
     * 设置用户信息，如果存在token
     */
    public function setUserInfo()
    {
        if(isset($this->saveData['token'])){

        }
        return $this;
    }


}