<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/13
 * Time: 9:46
 */


namespace App\TraitActivity;


trait FieldInfo{
    private $data = [];
    private $attributes = [];

    public function setCheckData(array $data){
        $this->data = $data;
        $this->distribute();
        return $this;
    }

    public function getSaveData(){
        return $this->saveData;
    }

    /**
     * 根据key值来获取属性值
     * @param string $key
     * @return array
     */
    public function getAttributesByKey($key)
    {
        if(isset($this->attributes[$key])){
            return $this->attributes[$key];
        }
        return [];
    }

    /**
     * 获取所有的属性值
     * @return array
     */
    public function getAllAttributes(){
        return $this->attributes;
    }

    /**
     * @param array $attributes
     */
    public function setAllAttributes(array $attributes){
        $this->attributes = $attributes;
    }

    public function getData(){
        return $this->data;
    }

    /**
     * 属性值整合
     */
    public function distribute(){
        foreach ($this->data['fields'] as $key => $value){
            $this->attributes['name'][$value['field']]          = $value['name'];
            $this->attributes['type'][$value['field']]          = $value['type'];
            $this->attributes['explode'][$value['field']]       = $value['explode'];
            $this->attributes['field_type'][$value['field']]    = $value['field_type'];
            $this->attributes['length'][$value['field']]        = $value['length'];
            $this->attributes['unique'][$value['field']]        = $value['unique'];
            $this->attributes['default'][$value['field']]       = $value['default'];
            $this->attributes['required'][$value['field']]      = $value['required'];
            $this->attributes['fields'][]                       = $value['field'];
            $this->attributes['order_by'][$value['field']]      = $value['order_by'];
            $this->attributes['search'][$value['field']]        = $value['search'];
        }
    }

    /**
     * 获取单个字段是否唯一
     * @param $key
     * @return bool
     */
    public function getUnique($key){
        if(isset($this->attributes['unique'][$key])){
            return $this->attributes['unique'][$key]==0?false:true;
        }
        return false;
    }

    /**
     * 获取单个字段是否必填
     * @param $key
     * @return bool
     */
    public function getRequired($key){
        if(isset($this->attributes['required'][$key])){
            return $this->attributes['required'][$key]==0?false:true;
        }
        return false;
    }

    /**
     * 获取单个字段的默认值
     * @param $key
     * @return string
     */
    public function getDefault($key){
        if(isset($this->attributes['default'][$key])){
            return $this->attributes['default'][$key];
        }
        return '';
    }

    /**
     * 获取单个字段类型 0、字符串  1、整型
     * @param $key
     * @return int
     */
    public function getFieldType($key){
        if(isset($this->attributes['field_type'][$key])){
            return $this->attributes['field_type'][$key];
        }
        return 0;
    }

    /**
     * 值转换
     * @param $val
     * @param int $type
     * @return int
     */
    public function fieldTypeTransform($val,$type = 0){
        return $type!=0?intval($val):$val;
    }

    /**
     * 获取单个字段是否为搜索字段
     * @param $key
     * @return int
     */
    public function getSearch($key){
        if(isset($this->attributes['default'][$key])){
            return $this->attributes['default'][$key];
        }
        return 0;
    }

    /**
     * 获取所有的唯一性字段
     * @return array
     */
    public function getAllUnique(){
        if(!isset($this->attributes['unique']))return [];
        $allUnique = [];
        foreach ($this->attributes['unique'] as $key=>$val){
            if($val)$allUnique[] = $key;
        }
        return $allUnique;
    }

    /**
     * 获取所有的必填或者非必填字段
     * @param int $type 0、非必填 1、必填
     * @return array
     */
    public function getAllRequired($type = 1){
        if(!isset($this->attributes['required']))return [];
        $fields = [];
        foreach ($this->attributes['required'] as $key=>$val){
            if($val == $type)$fields[] = $key;
        }
        return $fields;
    }

}