<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/19
 * Time: 13:37
 */


namespace App\Http\Controllers\CallBack;


use App\Http\Controllers\Controller;

class TestController extends Controller{
    public function handle(){
        \Log::info('I am Teacher');
    }
}