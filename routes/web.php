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
});//创建客服帐号

Route::get('/set/user/power', function() {
    return view('set.user.power');
});//添加权限页面

Route::post('add/role','UserManageController@addRole');//添加权限
Route::post('add/newuser','UserManageController@addNewuser');//添加权限

//公会

Route::get('/create/guild', function() {
    return view('create.guild');
});//创建公会

Route::get('/all/guild', function() {
    return view('edit.allguild');
});//所有公会

Route::get('/guild/info','Guild\GuildController@guildInfo');//获取公会成员信息
Route::post('/add/guild','Guild\GuildController@addGuild');//添加公会
Route::get('/edit/guild','Guild\GuildController@editGuild');//获取所有公会
Route::get('/del/guild','Guild\GuildController@delGuild');//删除一个公会
Route::post('/update/guild','Guild\GuildController@updateGuild');//更新公会信息
Route::get('/guild/member/{guildID}','Guild\GuildMemberController@guildMember');//获取公会成员信息
Route::post('/update/guild/member/title','Guild\GuildMemberController@memberTitle');//更改公会成员职务
Route::get('/del/guild/member','Guild\GuildMemberController@delMember');//更改公会成员职务

Route::get('/edit/the-charts', function() {
    return view('edit.the-charts');
});//排行榜

Route::get('/the-charts/info','GuildController@guildInfo');//获取排行榜信息


Route::get('/create/turntable', function() {
    return view('create.turntable');
});//转盘设置
Route::get('/edit/turntable','Turntable\TurntableController@editTurntable');//编辑转盘
Route::post('/update/turntable','Turntable\TurntableController@updateTurntable');//编辑转盘

Route::get('/create/advert', function() {
    return view('create.advert');
});//创建广告

Route::get('/edit/advert-info', function() {
    return view('edit.advert-info');
});//编辑广告

Route::post('/upload/advert-img','Advert\CreateAdvertController@createAdvert');//上传广告图片
Route::get('/edit/advert', 'Advert\CreateAdvertController@editAdvert');//编辑广告信息
Route::get('/del/advert', 'Advert\CreateAdvertController@delAdvert');//删除一条广告
Route::post('/update/advert', 'Advert\CreateAdvertController@updateAdvert');//更新广告信息


Route::get('/create/horse', function() {
    return view('create.horse');
});//跑马灯

Route::get('/edit/horse-info', function() {
    return view('edit.horse-info');
});//编辑跑马灯

Route::post('/add/horse','Horse\HorseController@addHorse');//添加跑马灯信息
Route::get('/edit/horse','Horse\HorseController@editHorse');//获取跑马灯所有信息
Route::get('/del/horse','Horse\HorseController@delHorse');//删除一条跑马灯信息
Route::post('/update/horse','Horse\HorseController@updateHorse');//更新一条跑马灯信息


Route::get('/create/rescue', function() {
    return view('create.rescue');
});//救援金

//游戏帐号管理
Route::get('/game/userlist', function() {
    return view('edit.game-user-list');
});//游戏用户列表
Route::get('/edit/game-user-list','GameUserController@gameUserList');//获取玩家信息

Route::get('/edit/game/user', function() {
    return view('edit.game-user');
});//游戏用户设置

//邮件
Route::get('/create/mail', function() {
    return view('create.mail');
});//创建邮件页面

Route::post('/send/mail','Mail\SendMailController@sendMail');
Route::get('/test','Mail\SendMailController@test');

Route::post('admin/login','AdminLoginController@login');//后台登录
 
