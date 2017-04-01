<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('logout', 'Auth\LoginController@logout');

Route::group(['namespace' => 'Admin','middleware' => ['auth']],function(){
    Route::resource('activity','ActivityController');
    Route::get('/', 'IndexController@index');

    Route::resource('purview','PurviewController');//权限管理
});
