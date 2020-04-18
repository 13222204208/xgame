<?php

namespace App\Http\Controllers\Advert;

use App\Http\Controllers\Mail\CCallbackClientController as CCallbackClient;
use App\Http\Controllers\Mail\CMessageController as CMessage;

class CDynamicWebController extends CCallbackClient
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
				echo json_encode(['status'=>200]);
				break;
			case "WEB_DYNAMIC_ONE_FAIL":
				echo json_encode(['status'=>403]);
				break;
			case "WEB_DYNAMIC_TWO_INT_SUCCESS":
				echo json_encode(['status'=>200]);
				break;
			case "WEB_DYNAMIC_TWO_INT_FAIL":
				echo json_encode(['status'=>403]);
				break;
			case "WEB_DYNAMIC_TWO_STR_SUCCESS":
				echo json_encode(['status'=>200]);
				break;
			case "WEB_DYNAMIC_TWO_STR_FAIL":
				echo json_encode(['status'=>403]);
				break;
			case "WEB_DYNAMIC_THREE_SUCCESS":
				echo json_encode(['status'=>200]);
				break;
			case "WEB_DYNAMIC_THREE_FAIL":
				echo json_encode(['status'=>403]);
				break;
			default:
				return false;
			}

			return true;
		}
}
