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
//    return view('static_pages/home');
//});

Route::get('/', 'StaticPagesController@home')->name('home');//首页
Route::get('/help', 'StaticPagesController@help')->name('help');//关于页
Route::get('/about', 'StaticPagesController@about')->name('about');//帮助页

Route::get('signup','UsersController@signup')->name('signup');//登陆页

Route::resource('users', 'UsersController');//RESTful 风格，用户控制器
//Route::get('/users', 'UsersController@index')->name('users.index');
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');
//Route::get('/users/create', 'UsersController@create')->name('users.create');
//Route::post('/users', 'UsersController@store')->name('users.store');
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
//Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
//Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');

Route::get('login','SessionsController@create')->name('login');//显示登录页面
Route::post('login','SessionsController@store')->name('login');//创建新会话（登录）
Route::delete('logout','SessionsController@destroy')->name('logout');//销毁会话（退出登录）

