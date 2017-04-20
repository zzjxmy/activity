<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/20
 * Time: 10:36
 */

namespace App\TraitActivity;

trait Log{
    //是否记录回调日志
    private $saveCallBackLog = true;
    /**
     * 回调日志记录
     * @param $title
     * @param $data
     * @param $message
     */
    public function callBackLog($title,$data,$message){
        if($this->saveCallBackLog){
            \Log::info('哎呀回调了啊');
        }
    }
}