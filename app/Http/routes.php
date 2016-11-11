<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['domain' => 'vagrant.blog.com', 'namespace'=> 'Admin'], function () {
    // 验证码
    Route::get('/code/captcha/{tmp}', 'LoginController@captcha');
    // 后台登录页
    Route::resource('/login', 'LoginController');
    // 后台登出
    Route::resource('/logout', 'LoginController@logout');
    // 后台注册页
    Route::resource('/register', 'RegisterController');

    Route::group(['middleware' => 'AdminMiddleware'], function() {
        // 后台首页
        Route::resource('/', 'AdminController');
    });
});

