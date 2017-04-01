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
        return ['start' => trim($times[0]) , 'end' => trim($times[1])];
    }
}