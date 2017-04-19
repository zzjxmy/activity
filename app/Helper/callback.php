<?php

/**
 * Handle the event.
 *
 * @param $callBack string '回调函数'
 * @param $data array 回调函数参数
 * @return void
 */
if(!function_exists('activity_call_back')){
    function activity_call_back($callBack = '',array $data = []){
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