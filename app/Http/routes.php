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


Route::get('/', function () {
    return view('home/index');
});

Route::controller('/home', 'home\PageController');
Route::controller('/shopdo', 'home\ShopController');

Route::group(['middleware' => 'login'], function () {
    Route::controller('/home-person', 'home\PersonController');
    Route::controller('/persondo', 'home\PersondoController');
    // Route::get('/shopdo/search','home\ShopController@search');


});


Route::group(['middleware' => 'login2'], function () {
    Route::controller('/admin', 'admin\PageController');

});
Route::controller('auth/login2', 'Auth\AdminLoginController');


Route::group(['middleware' => 'login3'], function () {

    Route::controller('/admin2', 'admin2\ShopController');
});
Route::controller('auth/login3', 'Auth\AdminLogin2Controller');

// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::post('auth/register2', 'Auth\AdminAuthController@postRegister');

//密码重置路由
Route::get('reset', 'Auth\UserController@getReset');
Route::post('reset', 'Auth\UserController@postReset');


