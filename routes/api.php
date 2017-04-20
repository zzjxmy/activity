<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

//无频率限制
$api->version('v1', ['namespace' => 'App\Http\Controllers\Api'], function ($api) {
    //下单完成
    $api->post('order_call_back', 'MnsController@order');
    //点赞
    $api->post('like_call_back', 'MnsController@like');
    //活动页投票
    $api->post('activity_vote_call_back', 'MnsController@activityVote');
    //动态打赏
    $api->post('dong_tai_callBack', 'MnsController@dongTai');
    //直播间打赏
    $api->post('live_call_back', 'MnsController@live');
    //充值
    $api->post('live_call_back', 'MnsController@live');
    //用户登录
    $api->post('user_login_call_back', 'MnsController@userLogin');
    //用户注册
    $api->post('user_register_call_back', 'MnsController@userRegister');
});

//频率限制
$api->version('v2', ['namespace' => 'App\Http\Controllers\Api' ,'middleware' => ['api','api.throttle']], function ($api) {
    $api->post('commit', 'ActivityController@commit');
    $api->any('info', 'ActivityController@info');
    $api->any('list', 'ActivityController@list');
});