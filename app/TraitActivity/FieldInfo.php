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
    public $data = [];
    public $attributes = '';

    public function setData(array $data){
        $this->data = $data;
        $this->distribute();
        return $this;
    }

    public function getData(){
        return $this->data;
    }

    public function distribute(){
        foreach ($this->data['field'] as $key => $value){
            $this->attributes['name'][$value['fields']] = $value['name'];
            $this->attributes['type'][$value['fields']] = $value['type'];
            $this->attributes['explode'][$value['fields']] = $value['explode'];
            $this->attributes['like_search'][$value['fields']] = $value['like_search'];
            $this->attributes['is_explode'][$value['fields']] = $value['is_explode'];
            $this->attributes['length'][$value['fields']] = $value['length'];
            $this->attributes['unique'][$value['fields']] = $value['unique'];
            $this->attributes['default'][$value['fields']] = $value['default'];
            $this->attributes['required'][$value['fields']] = $value['required'];
            $this->attributes['fields'][] = $value['fields'];
            $this->attributes['order_by'][$value['fields']] = $value['order_by'];
            $this->attributes['search'][$value['fields']] = $value['search'];
        }
    }

    public function getUnique($key){

    }

    public function getRequired($key){
        return false;
    }

    public function getDefault($key){
        return '';
    }

    public function getSearch($key){
        return false;
    }

    public function getLikeSearch($key){
        return false;
    }

    public function getAllUnique(){
        return [];
    }

    public function getAllRequired(){
        return [];
    }

    public function getAllDefault(){
        return [];
    }

}