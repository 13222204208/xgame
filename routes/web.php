<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index',['name' => session('username')]);
});//主页

Route::get('/console', function () {
    return view('home.console');
});//控制台

Route::get('/login', function () {
    return view('user.login');
});//后台登陆页面

Route::get('/set/user/info', function () {
    return view('set.user.info',['name' => session('username')]);
});//后台用户资料

Route::post('admin/login','AdminLoginController@login');

