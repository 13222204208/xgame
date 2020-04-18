<?php
	include_once('dynamic_itf.php');

	$MailSvr = new CDynamicWeb;
	$res = "";
	
	$MailSvr->connect("127.0.0.1", 30002, $res);
	
	//  添加游戏房间; t_game_table 表
	//  第一个字段代表标识; 固定的不用改
	//  第二个字段代表加的那条数据;  f_game_id；
	$MailSvr->cd_sendDynamicTwoInt(182, 1);

	if (!$MailSvr->waitCallback())
	{
		echo 'timeout';
		die();
	}
?>
