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

//频率限制
$api->version('v1', ['namespace' => 'App\Http\Controllers\Api' ,'middleware' => ['api','api.throttle']], function ($api) {
    $api->post('commit', 'ActivityController@commit');
    $api->post('commit', 'ActivityController@info');
    $api->post('commit', 'ActivityController@list');
});

//无频率限制
$api->version('v2', ['namespace' => 'App\Http\Controllers\Api'], function ($api) {
    //下单
    $api->post('commit', 'MnsController@order');
    //点赞
    $api->post('commit', 'MnsController@like');
    //活动页投票
    $api->post('commit', 'MnsController@activityVote');
    //动态打赏
    $api->post('commit', 'MnsController@dongTai');
    //直播间打赏
    $api->post('commit', 'MnsController@live');
    //用户登录
    $api->post('commit', 'MnsController@userLogin');
    //用户注册
    $api->post('commit', 'MnsController@userRegister');
});