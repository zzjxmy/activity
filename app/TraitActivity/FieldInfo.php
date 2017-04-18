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

    public function setData(array $data){
        $this->data = $data;
        $this->distribute();
        return $this;
    }

    public function getAttributes(){
        return $this->attributes;
    }

    public function getData(){
        return $this->data;
    }

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

    public function getUnique($key){
        if(isset($this->attributes['unique'][$key])){
            return $this->attributes['unique'][$key]==0?false:true;
        }
        return false;
    }

    public function getRequired($key){
        if(isset($this->attributes['required'][$key])){
            return $this->attributes['required'][$key]==0?false:true;
        }
        return false;
    }

    public function getDefault($key){
        if(isset($this->attributes['default'][$key])){
            return $this->attributes['default'][$key]==0?false:true;
        }
        return false;
    }

    public function getSearch($key){
        if(isset($this->attributes['default'][$key])){
            return $this->attributes['default'][$key];
        }
        return 0;
    }

    public function getAllUnique(){
        return isset($this->attributes['unique'])?$this->attributes['unique']:[];
    }

    public function getAllRequired(){
        return isset($this->attributes['required'])?$this->attributes['required']:[];
    }

    public function getAllDefault(){
        return isset($this->attributes['default'])?$this->attributes['default']:[];
    }

}