<?php
/**
 * Created by PhpStorm.
 * User: zhangzhijian
 * Signature: change self
 * Date: 2017/4/19
 * Time: 12:01
 */

if(!function_exists('activity_call_back')){
    function activity_call_back(\App\Events\ActivityCommitSuccessEvent $event){
        if(isset($event->activityInfo['call_back']) && !empty($event->activityInfo['call_back'])){
            $function = explode('::',$event->activityInfo['call_back']);
            if(count($function) == 2 && class_exists($function[0])){
                $obj = app()->make($function[0]);
                if(method_exists($obj,$function[1])){
                    call_user_func_array([$obj,$function[1]],[$event->data,$event->activityInfo]);
                }
            }
        }
    }
}