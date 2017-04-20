<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/20
 * Time: 10:33
 */

namespace App\TraitActivity;

use Request;
use \App\Jobs\callBack;

trait Queue{
    use Log;

    /**
     * 处理回调队列
     * @param $title string 回调title
     * @param $controller string 回调方法
     * @param $otherData array 其他参数
     */
    public function queue($title,$controller,array $otherData = []){
        $data = Request::input();
        try{
            $data = get_callback_data($title);
            //任务分发，进入队列执行
            dispatch(new callBack($title,$controller,array_merge($data,$otherData)));
        }catch (\Exception $exception){
            //日志记录
            $this->callBackLog($title,$data,$exception->getMessage());
        }
    }
}