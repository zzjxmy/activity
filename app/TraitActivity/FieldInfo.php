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

    public function setData(array $data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function getUnique($key){
        return false;
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