<?php

namespace App\Http\Controllers\Advert;

use App\Http\Controllers\Mail\CCallbackClientController as CCallbackClient;
use App\Http\Controllers\Mail\CMessageController as CMessage;

class CDynamicWebController extends CCallbackClient
{
	function cd_sendDynamicOne($type)
	{
		$msg = new CMessage;
		$msg->setName("MSG_WEB_DYNAMIC_ONE");
		$msg->serialUint32($type);
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicTwoStr($type, $gamename)
	{
		$msg = new CMessage;
		$msg->setName("MSG_WEB_DYNAMIC_TWO_STR");
		$msg->serialUint32($type);
		$msg->serialString($gamename);
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicTwoInt($type, $id)
	{
		$msg = new CMessage;
		$msg->setName("MSG_WEB_DYNAMIC_TWO_INT");
		$msg->serialUint32($type);
		$msg->serialUint32($id);
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicThree($type, $id, $gamename)
	{
		$msg = new CMessage;
		$msg->setName("MSG_WEB_DYNAMIC_THREE");
		$msg->serialUint32($type);
		$msg->serialUint32($id);
		$msg->serialString($gamename);
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicFour($f_diamond_count,  $f_gold_count, $f_silver_count, $f_is_default)
	{
		$msg = new CMessage;
		$msg->setName("MSG_WEB_TURNTABLE");
		$msg->serialUint32($f_diamond_count);
		$msg->serialUint32($f_gold_count);
		$msg->serialUint32($f_silver_count);
		$msg->serialUint32($f_is_default);
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicGuild( $f_name, $f_huizhang_name,$f_announcement,$f_guild_icon_id)
	{
		$msg = new CMessage;
		$msg->setName("MSG_GUILD_CREATE");
		$msg->serialString($f_name);
		$msg->serialString($f_huizhang_name);
		$msg->serialString($f_announcement);
		$msg->serialUint32($f_guild_icon_id);
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicDelGuild( $f_guild_id)
	{
		$msg = new CMessage;
		$msg->setName("MSG_GUILD_DELETE");
		$msg->serialUint32($f_guild_id);
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicUpdateGuild( $f_guild_id ,$f_announcement)
	{
		$msg = new CMessage;
		$msg->setName("MSG_GUILD_UPDATE_NOTICE");
		$msg->serialUint32($f_guild_id);
		$msg->serialString($f_announcement);
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicUpdateGuildTitle( $f_guild_id ,$f_role_id, $f_title)
	{
		$msg = new CMessage;
		$msg->setName("MSG_GUILD_UPDATE_POST");
		$msg->serialUint32($f_guild_id);
		$msg->serialUint32($f_role_id);
		$msg->serialUint32($f_title);
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicDelGuildTitle( $f_guild_id,$f_role_id )
	{
		$msg = new CMessage;
		$msg->setName("MSG_GUILD_DELROLE");
		$msg->serialUint32($f_guild_id);
		$msg->serialUint32($f_role_id);
		$msg->serialUint32($f_title);
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicResetPhone( $f_role_id )//重置手机号
	{
		$msg = new CMessage;
		$msg->setName("MSG_RESET_PHONE");

		$msg->serialUint32($f_role_id);
	
		return parent::sendMessage($msg);
	}

	function cd_sendDynamicResetDepot( $f_role_id )//重置仓库密码
	{
		$msg = new CMessage;
		$msg->setName("MSG_RESET_SAVE_PASSWORLD");

		$msg->serialUint32($f_role_id);
	
		return parent::sendMessage($msg);
	}

	
	function cd_sendDynamicControlRole( $f_role_id ,$role )//重置仓库密码
	{
		$msg = new CMessage;
		$msg->setName("MSG_CHANGE_CONTROL_ROLE");

		$msg->serialUint32($f_role_id);
		$msg->serialUint32($role);
	
		return parent::sendMessage($msg);
	}

	function waitCallback()
	{
		$message = parent::waitMessage();

		if ($message == false)
			return false;

		switch ($message->MsgName) {
			case "WEB_DYNAMIC_ONE_SUCCESS":
				echo json_encode(['status' => 200]);
				break;
			case "WEB_DYNAMIC_ONE_FAIL":
				echo json_encode(['status' => 403]);
				break;
			case "WEB_DYNAMIC_TWO_INT_SUCCESS":
				echo json_encode(['status' => 200]);
				break;
			case "WEB_DYNAMIC_TWO_INT_FAIL":
				echo json_encode(['status' => 403]);
				break;
			case "WEB_DYNAMIC_TWO_STR_SUCCESS":
				echo json_encode(['status' => 200]);
				break;
			case "WEB_DYNAMIC_TWO_STR_FAIL":
				echo json_encode(['status' => 403]);
				break;
			case "WEB_DYNAMIC_THREE_SUCCESS":
				echo json_encode(['status' => 200]);
				break;
			case "WEB_DYNAMIC_THREE_FAIL":
				echo json_encode(['status' => 403]);
				break;
			case "WEB_UPDATE_TURNTABLE_SUCCESS":
				echo json_encode(['status' => 200]);
				break;
			case "WEB_UPDATE_TURNTABLE_FAIL":
				echo json_encode(['status' => 403]);
				break;
			case "WEB_CREATE_GUILD_SUCCESS":
				echo json_encode(['status' => 200]);
				break;
			case "WEB_CREATE_GUILD_FAIL":
				echo json_encode(['status' => 403]);
				break;
			case "WEB_DELETE_GUILD_SUCCESS":
				echo json_encode(['status' => 200]);
				break;
			case "WEB_DELETE_GUILD_FAIL":
				echo json_encode(['status' => 403]);
				break;
			case "WEB_GUILD_UPDATENOTICE_SUCCESS":
				echo json_encode(['status' => 200]);
				break;
			case "WEB_GUILD_UPDATENOTICE_FAIL":
				echo json_encode(['status' => 403]);
				break;	
			case "WEB_GUILD_UPDATEPOST_SUCCESS"://更新公会成员职务返回状态
				echo json_encode(['status' => 200]);
				break;
			case "WEB_GUILD_UPDATEPOST_FAIL":
				echo json_encode(['status' => 403]);
				break;	
			case "WEB_GUILD_ROLE_DEL_SUCCESS"://请离公会成员返回的状态
				echo json_encode(['status' => 200]);
				break;
			case "WEB_GUILD_ROLE_DEL_FAIL":
				echo json_encode(['status' => 403]);
				break;	
			case "WEB_RESET_PHONE_SUCCESS"://重置玩家用户手机号
				echo json_encode(['status' => 200]);
				break;
			case "WEB_RESET_PHONE_FAIL":
				echo json_encode(['status' => 403]);
				break;	
			case "WEB_RESET_SAVE_PASSWORLD_SUCCESS"://重置玩家仓库密码
				echo json_encode(['status' => 200]);
				break;
			case "WEB_RESET_SAVE_PASSWORLD_FAIL":
				echo json_encode(['status' => 403]);
				break;		
			case "WEB_CHANGE_CONTROL_ROLE_SUCCESS"://是否启用帐号算法
				echo json_encode(['status' => 200]);
				break;
			case "WEB_CHANGE_CONTROL_ROLE_FAIL":
				echo json_encode(['status' => 403]);
				break;					

			default:
				return false;
		}

		return true;
	}
}
