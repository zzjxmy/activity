<?php

/**
 * Handle the event.
 *
 * @param $callBack string '回调函数'
 * @param $data array 回调函数参数
 * @return void
 */
if(!function_exists('call_back')){
    function call_back($callBack = '',array $data = []){
        if(!empty($callBack)){
            $function = explode('::',$callBack);
            if(count($function) == 2 && class_exists($function[0])){
                $obj = app()->make($function[0]);
                if(method_exists($obj,$function[1])){
                    call_user_func_array([$obj,$function[1]],[$data]);
                }
            }
        }
    }
}

if(! function_exists('get_callback_data')){
    function get_callback_data($info){
        $request = Request::input();
        if(!isset($request['MessageId']) || !isset($request['Message'])){
            throw new \Exception('没有MessageID或者Message数据');
        }
        //防止单条通知，重复触发
        $redis = \DefaultRedis::connection('call_back');
        $key = $info.':'.$request['MessageId'];
        if($redis->exists($key))throw new \Exception('重复触发数据');
        //set redis
        $redis->set($key,serialize($request));
        //decode
        $request['Message'] = json_decode($request['Message'],true);
        return $request;
    }
}
