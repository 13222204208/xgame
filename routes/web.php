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

Route::get('/set/user/newuser', function() {
    return view('set.user.newuser');
});//创建客户帐号

//公会

Route::get('/create/guild', function() {
    return view('create.guild');
});//创建公会

Route::get('/edit/guild-info', function() {
    return view('edit.guild-info');
});//公会信息

Route::get('/guild/info','GuildController@guildInfo');//获取公会成员信息

Route::get('/create/turntable', function() {
    return view('create.turntable');
});//转盘设置

Route::get('/create/advert', function() {
    return view('create.advert');
});//创建广告

Route::get('/create/horse', function() {
    return view('create.horse');
});//创建广告

Route::post('admin/login','AdminLoginController@login');//后台登录

