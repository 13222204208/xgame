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

/* Route::get('/console', function () {
    return view('home.console');
}); */

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
Route::post('add/newuser','UserManageController@addNewuser');//添加后台管理帐号
Route::get('get/back/users','UserManageController@getBackUsers');//获取后台管理帐号

//公会

/* Route::get('/create/guild', function() {
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
Route::get('/del/guild/member','Guild\GuildMemberController@delMember');//更改公会成员职务 */

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
Route::post('/query/user','GameUserController@queryUser');//查询玩家昵称
Route::post('/reset/phone','GameUserController@resetPhone');//重置玩家手机号
Route::post('/reset/password','GameUserController@resetPassword');//重置玩家密码
Route::post('/reset/depot','GameUserController@resetDepot');//重置玩家仓库密码
Route::post('/change/control/role','GameUserController@controlRole');//开启帐号算法
Route::post('/update/account/status','GameUserController@accountStatus');//帐号封禁状态

Route::get('/edit/game/user', function() {
    return view('edit.game-user');
});//游戏用户设置

Route::get('/game/player/records', function() {
    return view('game.player-records');
});//客户查询记录
Route::get('/query/player/records/{f_role_id}/{f_account_id}/{tname}','Game\PlayingGameController@queryPlayerRecords');//客户游玩记录


Route::get('/clients/loss', function() {
    return view('game.clients-loss');
});//客户流失

Route::get('/check/clients/loss','Game\ClientsLossController@checkClientsLoss');

//常见问题
Route::get('/create/FAQ', function() {
    return view('create.FAQ');
});//创建常见问题页面
Route::post('/create/question/type','Game\FAQController@createQtype');//创建问题类型
Route::get('/get/question/type','Game\FAQController@getQtype');//创建问题类型
Route::get('/get/game/question/{tid}','Game\FAQController@getQuestion');//查询问题
Route::post('/add/question/answer','Game\FAQController@addQAnswer');//添加问题及答案
Route::get('/del/question','Game\FAQController@delQuestion');//删除问题
Route::post('/update/question','Game\FAQController@updateQuestion');//更新问题
Route::get('/del/question/type','Game\FAQController@delQType');//删除问题类型

//邮件
Route::get('/create/mail', function() {
    return view('create.mail');
});//创建邮件页面

//游戏管理
Route::get('/game/playing', function() {//翻牌金豆设置
    return view('game.playing');
});

Route::get('/game/playing/earnings', function() {//翻牌赢利设置
    return view('game.earnings');
});

Route::get('/game/playing/weight', function() {//翻牌权重设置
    return view('game.weight');
});

Route::post('/game/playing','Game\PlayingGameController@gamePlaying');//王牌小丑，翻牌
Route::get('/get/game/playing','Game\PlayingGameController@getGamePlaying');//获取王牌小丑数据
Route::get('/get/playing/region','Game\PlayingGameController@getPlayingRegion');//获取翻牌王牌小丑区间
Route::get('/get/playing/weight','Game\PlayingGameController@getPlayingWeight');//获取翻牌王牌小丑权重数据
Route::post('/add/playing/region','Game\PlayingGameController@addPlayingRegion');//添加翻牌王牌小丑区间
Route::post('/update/playing/region','Game\PlayingGameController@updatePlayingRegion');//更新翻牌王牌小丑区间
Route::post('/update/playing/weight','Game\PlayingGameController@updatePlayingWeight');//更新翻牌王牌小丑牌型权重

//太上老君管理
Route::get('/game/tslj', function() {
    return view('game.tslj');
});

Route::get('/get/tslj/config','Game\TsljGameController@getTsljConfig');//获取太上老君设置
Route::post('/update/tslj/config','Game\TsljGameController@updateTsljConfig');//修改太上老君设置
Route::get('/get/tslj/region','Game\TsljGameController@getTsljRegion');//获取太上老君区间
Route::post('/add/tslj/region','Game\TsljGameController@addTsljRegion');//添加太上老君区间
Route::post('/update/tslj/region','Game\TsljGameController@updateTsljRegion');//更新太上老君区间

//三色龙珠
Route::get('/game/three-colour', function() {
    return view('game.three-colour');
});

Route::get('/get/three/config','Game\ThreeColourController@getThreeConfig');//获取三色龙珠设置
Route::post('/update/three/config','Game\ThreeColourController@updateThreeConfig');//修改三色龙珠设置
Route::get('/get/three/region','Game\ThreeColourController@getThreeRegion');//获取三色龙珠区间
Route::post('/add/three/region','Game\ThreeColourController@addThreeRegion');//添加三色龙珠区间
Route::post('/update/three/region','Game\ThreeColourController@updateThreeRegion');//更新三色龙珠区间


//神兽单挑
Route::get('/game/animals', function() {
    return view('game.animals');
});

Route::get('/get/animals/config','Game\AnimalsController@getAnimalsConfig');//获取太上老君设置
Route::post('/update/animals/config','Game\AnimalsController@updateAnimalsConfig');//修改太上老君设置
Route::get('/get/animals/region','Game\AnimalsController@getAnimalsRegion');//获取太上老君区间
Route::post('/add/animals/region','Game\AnimalsController@addAnimalsRegion');//添加太上老君区间
Route::post('/update/animals/region','Game\AnimalsController@updateAnimalsRegion');//更新太上老君区间


//任务管理
Route::get('/game/task-management', function() {
    return view('game.task-management');
});

Route::post('/query/task/requirement','Game\TaskManagementController@taskRequirement');//任务条件
Route::post('/create/game/task','Game\TaskManagementController@createGameTask');//创建游戏任务
Route::get('/check/game/task','Game\TaskManagementController@checkGameTask');//查看所有游戏任务
Route::post('/update/game/task','Game\TaskManagementController@updateGameTask');//更新游戏任务
/* Route::get('/get/game/pay','Game\TaskManagementController@getGamePay');//获取游戏场次类型 */


Route::post('/send/mail','Mail\SendMailController@sendMail');//邮件发送
Route::get('/test','Mail\SendMailController@test');

Route::post('/admin/login','AdminLoginController@login');//后台登录
 
