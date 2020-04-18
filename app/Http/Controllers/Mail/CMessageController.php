<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Mail\CMemStreamController;


class CMessageController extends CMemStreamController
{
    var $MsgName;
		
    function CMessage()
    {
        $this->CMemStream();
    }
    
    function setName($name)
    {
        $this->MsgName = $name;
    }
}
