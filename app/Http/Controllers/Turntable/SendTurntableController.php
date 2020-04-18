<?php

namespace App\Http\Controllers\Turntable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Mail\CMessageController as CMessage;
use App\Http\Controllers\Mail\CCallbackClientController as CCallbackClient;

class SendTurntableController extends CCallbackClient
{
    function cd_SendTurntable($f_diamond_count,  $f_gold_count,$f_silver_count, $f_is_default )
    {
        $msg = new CMessage;
        $msg->setName("MSG_WEB_TURNTABLE");

        $msg->serialUint32($f_diamond_count);
        $msg->serialString($f_gold_count);
        $msg->serialString($f_silver_count);
        $msg->serialUint32($f_is_default);
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
