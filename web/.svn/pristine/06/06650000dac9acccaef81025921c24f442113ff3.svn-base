<?php
	include_once(__DIR__.'/dynamic_itf.php');
	$type = $_POST['type'];
	if(!empty($type)){
		$MailSvr = new CDynamicWeb;
		$res = "";
		$MailSvr->connect("39.106.79.146", 30002, $res);
		$MailSvr->cd_sendDynamicTwoStr(52,$type);
	}
	$type1 = $_POST['type1'];
	if(!empty($type1)){
		$MailSvr = new CDynamicWeb;
		$res = "";
		$MailSvr->connect("39.106.79.146", 30002, $res);
		$MailSvr->cd_sendDynamicTwoStr(81,$type1);
	}
	if (!$MailSvr->waitCallback())
	{
		echo 'timeout';
		die();
	}
	//echo '123';
	//var_dump($a);
	
	
	//  添加游戏房间; t_game_table 表
	//  第一个字段代表标识; 固定的不用改
	//  第二个字段代表加的那条数据;  f_game_id；
	//$MailSvr->cd_sendDynamicTwoInt(1, 1);
	
	//  更新游戏房间; t_game_table 表
	//  第一个字段代表标识; 固定的不用改
	//  第二个字段代表更新的那条数据;  f_game_id；  只哦能更新 f_isshow( 是否显示房间) 跟f_is_watch_war（是否观战） 
	//$MailSvr->cd_sendDynamicTwoInt(2,1);
	
	//  删除游戏房间; t_game_table 表
	//  第一个字段代表标识; 固定的不用改
	//  第二个字段代表删除的那条数据;  f_game_id；
	//$MailSvr->cd_sendDynamicTwoInt(3,1);
	
	//  用户创建房间默认属性; t_craete_role_config 表
	//  第一个字段代表标识; 固定的不用改
	//  第二个字段代表更新的那条数据;  f_auto_id
	//$MailSvr->cd_sendDynamicTwoInt(71,1);
	
	
	//  翻牌机权重; t_game_fanpai_card_type 表
	//  第一个字段代表标识; 固定的不用改   需要改什么跟王琦交流下
	//$MailSvr->cd_sendDynamicOne(61);
	
	//  金豆获取; t_goldenbeans_table 表
	//  第一个字段代表标识; 固定的不用改
	//  第二个字段代表更新哪种房间的数据;  这些房间配置问下王琦 下面只是随便写了个房间 'RunFastTwo '
	
	/*
	$type = I('type');
	if(!empty($type)){
		$MailSvr->connect("39.106.79.146", 30002, $res);
		$MailSvr->cd_sendDynamicTwoStr(52,$type);
	}
	
	
	
	//  控制修改; t_game_controler 表
	//  第一个字段代表标识; 固定的不用改
	//  第二个字段代表更新哪种房间的数据;  这些房间配置问下王琦 下面只是随便写了个房间 'RunFastTwo '
	$type1 = I('type1');
	if(!empty($type1)){
		$MailSvr->connect("39.106.79.146", 30002, $res);
		$MailSvr->cd_sendDynamicTwoStr(81,$type1);
	}
	
	if (!$MailSvr->waitCallback())
	{
		echo 'timeout';
		die();
	}
	*/
?>
