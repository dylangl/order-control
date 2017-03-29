<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//})->middleware('auth');

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
});

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Index'], function () {
        Route::get('/', 'IndexController@run');
    });

    Route::group(['namespace' => 'Manage', 'prefix' => 'manage'], function () {
        Route::get('/user', 'UserListController@run');
        Route::get('/user/verify', 'UserVerifyController@run');
        Route::get('/product', 'ProductController@run');
        Route::post('/product/add', 'ProductAddController@run');
    });

    Route::get('user/profile', function () {
        // 使用 `Auth` 中间件
    });
});
