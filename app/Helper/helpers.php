<?php

/**
 * 检测时间格式为 2017/03/31 - 2017/03/31
 * 错误返回false 正确返回拆分数组
 * array:2 [▼
 *   "start" => "2017/03/31"
 *   "end" => "2017/03/31"
 * ]
 */
if(!function_exists('time_format_check')){
    function time_format($date){
        $times = explode('-',$date);
        if(count($times) != 2)return false;
        $match = '/^[\d]{4}\/[\d]{2}\/[\d]{2}$/';
        if(!preg_match($match,trim($times[0])) || !preg_match($match,trim($times[1])))return false;
        if(strtotime($times[0]) > strtotime($times[1]))return false;
        return ['start_time' => trim($times[0]) , 'end_time' => trim($times[1])];
    }
}

/**
 * 获取活动信息
 * 检测缓存是否存在
 * 不存在则重新获取
 */
if(!function_exists('get_activity_info')){
    function get_activity_info($id){
        $key = ACTIVITY_REDIS_INFO_PREFIX.$id;
        if(DefaultRedis::exists($key)){
            return json_decode(DefaultRedis::get($key),true);
        }
        $info = \App\Models\Activity::getActivityAllInfoById($id);
        if(!$info){
            throw new Exception('活动信息不存在');
        }
        $data = $info->toArray();
        DefaultRedis::set($key,json_encode($data));
        return $data;
    }
}

/**
 * 获取活动组件信息
 * 检测缓存是否存在
 * 不存在则重新获取
 */
if(!function_exists('get_activity_modules')){
    function get_activity_modules(){
        if(DefaultRedis::exists(ACTIVITY_MODULES)){
            return json_decode(DefaultRedis::get(ACTIVITY_MODULES),true);
        }
        $data = App\Models\Modules::getModules();
        DefaultRedis::set(ACTIVITY_MODULES,json_encode($data));
        return $data;
    }
}