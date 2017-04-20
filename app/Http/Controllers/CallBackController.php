<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/20
 * Time: 11:29
 */

namespace App\Http\Controllers;


use App\InterfaceActivity\callBack;

class CallBackController extends Controller implements callBack {
    /**
     * 根据模块名字获取所有有效的模块
     * @param string $name
     * @return array
     */
    public function getModulesByName($name){
        return [];
    }
}