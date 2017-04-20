<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/19
 * Time: 15:51
 */

namespace App\Http\Controllers\CallBack;


use App\Http\Controllers\Controller;

class order extends Controller{
    public function handle(){
        \Log::info('HGHHHHHHHH');
    }
}