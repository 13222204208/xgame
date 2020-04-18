<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Mail\CMessageController as CMessage;
use App\Http\Controllers\Mail\CCallbackClientController as CCallbackClient;

class CMailServiceWebController extends CCallbackClient
{
		//  RoleID  玩家ID;
		//  StartTime  开始时间 结束时间;
		//  EndTime  玩家ID;
		//  Title	邮件标题;
		//  Content	邮件文本;
		//  MailType	邮件类型; 0 == 个人邮件 1 = 系统邮件;
		//  IsImportant 是否是重大邮件;
		//  IsAuto 是否自动领取;
		//  Rewardlist  [{ "RewardType": 1, "ReWardCount": 2}]   是个列表 里面可以放多个奖励
		function cd_SendMail($RoleID,  $EndTime,$Title,$Content, $MailType, $IsImportant,$IsAuto, $Rewardlist )
		{
			$msg = new CMessage;
			$msg->setName("MSG_WEB_MAIL");
			$msg->serialUint32($RoleID);
	
			$msg->serialUint32($EndTime);
			$msg->serialString($Title);
			$msg->serialString($Content);
			$msg->serialUint32($MailType);
			$msg->serialUint32($IsImportant);
			$msg->serialUint32($IsAuto);
			$msg->serialString($Rewardlist);
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
				echo json_encode(['status'=>200]);
				break;
			case "WEB_MAIL_FAIL":
				echo json_encode(['status'=>403]);
				break;
			default:
				return false;
			}

			return true;
		}
}
