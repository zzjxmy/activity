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
});

//无频率限制
$api->version('v2', ['namespace' => 'App\Http\Controllers\Api'], function ($api) {
    //下单
    $api->get('commit', 'MnsController@commit');
    //点赞
    $api->get('commit', 'MnsController@commit');
    //活动页投票
    $api->get('commit', 'MnsController@commit');
    //动态打赏
    $api->get('commit', 'MnsController@commit');
    //直播间打赏
    $api->get('commit', 'MnsController@commit');
});