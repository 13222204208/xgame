<?php
	//echo __DIR__;
	
	include_once(__DIR__.'\mail_service_itf.php');

	$MailSvr = new CMailServiceWeb;
	
	//$res = '{"MailType":"0","RoleID":"1","Title":"1","Content":"567567","StartTime":"2019-11-29 16:26:05","EndTime":"2019-12-13 16:26:05","IsImportant":"0","RewardType":"1","ReWardCount":"1"}';
	$res = $_POST['data'];
	$res_arr = json_decode($res,true);
	$res_arr['StartTime'] = strtotime($res_arr['StartTime']);
	$res_arr['EndTime'] = strtotime($res_arr['EndTime']);
	//var_dump($res_arr);
	$RoleID = $res_arr['RoleID'];
	$StartTime = $res_arr['StartTime'];
	$EndTime = $res_arr['EndTime'];
	$Title = $res_arr['Title'];
	$Content = $res_arr['Content'];
	$MailType = $res_arr['MailType'];
	$IsImportant = $res_arr['IsImportant'];
	$RewardType = $res_arr['RewardType'];
	$ReWardCount = $res_arr['ReWardCount'];
	
	$MailSvr->connect("39.106.79.146", 30002, $res);
	$MailSvr->cd_SendMail($RoleID, $StartTime, $EndTime,$Title,$Content, $MailType, $IsImportant,$IsAuto='0', $RewardType, $ReWardCount);
	if (!$MailSvr->waitCallback())
	{
		echo 'timeout';
		die();
	}
	
?>
