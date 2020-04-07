<?php
	require_once(__DIR__.'\nel_message.php');

	class CMailServiceWeb extends CCallbackClient
	{
		//  RoleID  玩家ID;
		//  StartTime  开始时间 结束时间;
		//  EndTime  玩家ID;
		//  Title	邮件标题;
		//  Content	邮件文本;
		//  MailType	邮件类型; 0 == 个人邮件 1 = 系统邮件;
		//  IsImportant 是否是重大邮件;
		//  IsAuto 是否自动领取;
		//  RewardType  奖励类型 0 = 金币 1 = 银币;
		//  ReWardCount 奖励数量;
		function cd_SendMail($RoleID, $StartTime, $EndTime,$Title,$Content, $MailType, $IsImportant,$IsAuto, $RewardType, $ReWardCount )
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
			echo '成功';
				break;
			case "WEB_MAIL_FAIL":
			echo '失败';
				break;
			default:
				return false;
			}
			return true;
		}
	}	
?>
