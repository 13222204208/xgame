<?php
namespace Home\Controller;
use Think\Controller;
class YoujianController extends Controller {
	function _initialize() {
		//权限验证
		if (!session('admin_user')) {
		//	$this -> redirect('login/login');
		}

	}
	function ceshi(){
		$MailSvr = new CMailServiceWeb;
		$res = "";
			
		$MailSvr->connect("192.168.1.102", 30002, $res);
		$MailSvr->cd_SendMail(50,1574671670,1607746332,'ddd','vvvv',0,1,0,9,3);
		if (!$MailSvr->waitCallback())
		{
			echo 'timeout';
			die();
		}
	}
	function send(){
		$RoleID = '123';
		$StartTime = '123';
		$EndTime = '123';
		$Title = '123';
		$Content = '123';
		$MailType = '123';
		$IsImportant = '123';
		$IsAuto = '123';
		$RewardType = '123';
		$ReWardCount = '123';
		$this -> cd_SendMail($RoleID, $StartTime, $EndTime,$Title,$Content, $MailType, $IsImportant,$IsAuto, $RewardType, $ReWardCount );
	}
	
	function cd_SendMail($RoleID='1', $StartTime='1', $EndTime='1',$Title='1',$Content='1', $MailType='1', $IsImportant='1',$IsAuto='1', $RewardType='1', $ReWardCount='1' )
	{
		$msg = new CMessage;
		$msg->setName("MSG_WEB_MAIL");
		$msg->serialUint32($RoleID);
		$msg->serialUint32($StartTime);
		$msg->serialUint32($EndTime);
		$msg->serialString($Title);
		$msg->serialString($Content);
		$msg->serialUint32($MailType);
		$msg->serialUint32($IsImportant);
		$msg->serialUint32($IsAuto);
		$msg->serialUint32($RewardType);
		$msg->serialUint32($ReWardCount);
		return parent::sendMessage($msg);
	}
	function waitCallback()
	{
		$message = parent::waitMessage();
	
		if ($message == false)
			return false;
	
		switch($message->MsgName)
		{
		case "WEB_MAIL_SUCCESS":
			break;
		case "WEB_MAIL_FAIL":
			break;
		default:
			return false;
		}
	
		return true;
	}
	

}
