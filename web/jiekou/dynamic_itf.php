<?php
	require_once(__DIR__.'/nel_message.php');

	class CDynamicWeb extends CCallbackClient
	{
		function cd_sendDynamicOne( $type)
		{
			$msg = new CMessage;
			$msg->setName("MSG_WEB_DYNAMIC_ONE");
			$msg->serialUint32($type);
			return parent::sendMessage($msg);
		}
		
		function cd_sendDynamicTwoStr( $type, $gamename )
		{
			$msg = new CMessage;
			$msg->setName("MSG_WEB_DYNAMIC_TWO_STR");
			$msg->serialUint32($type);
			$msg->serialString($gamename);
			return parent::sendMessage($msg);
		}
		
		function cd_sendDynamicTwoInt( $type, $id )
		{
			$msg = new CMessage;
			$msg->setName("MSG_WEB_DYNAMIC_TWO_INT");
			$msg->serialUint32($type);
			$msg->serialUint32($id);
			return parent::sendMessage($msg);
		}
		
		function cd_sendDynamicThree( $type, $id, $gamename )
		{
			$msg = new CMessage;
			$msg->setName("MSG_WEB_DYNAMIC_THREE");
			$msg->serialUint32($type);
			$msg->serialUint32($id);
			$msg->serialString($gamename);
			return parent::sendMessage($msg);
		}
		function waitCallback()
		{
			$message = parent::waitMessage();

			if ($message == false)
				return false;

			switch($message->MsgName)
			{
			case "WEB_DYNAMIC_ONE_SUCCESS":
				echo ' 成功';
				break;
			case "WEB_DYNAMIC_ONE_FAIL":
				echo ' 失败';
				break;
			case "WEB_DYNAMIC_TWO_INT_SUCCESS":
				echo ' 成功';
				break;
			case "WEB_DYNAMIC_TWO_INT_FAIL":
				echo ' 失败';
				break;
			case "WEB_DYNAMIC_TWO_STR_SUCCESS":
				echo ' 成功';
				break;
			case "WEB_DYNAMIC_TWO_STR_FAIL":
				echo ' 失败';
				break;
			case "WEB_DYNAMIC_THREE_SUCCESS":
				echo ' 成功';
				break;
			case "WEB_DYNAMIC_THREE_FAIL":
				echo ' 失败';
				break;
			default:
				return false;
			}

			return true;
		}
	}
?>
