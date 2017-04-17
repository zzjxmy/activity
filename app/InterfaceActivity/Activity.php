<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/13
 * Time: 9:54
 */

namespace App\InterfaceActivity;


use Illuminate\Http\Request;

interface Activity{
    /**
     * 验证字段
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function verify(Request $request);
}