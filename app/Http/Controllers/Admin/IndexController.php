<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/3/28
 * Time: 15:12
 */


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class IndexController extends Controller{
    public function index(){
        return view('index');
    }
}