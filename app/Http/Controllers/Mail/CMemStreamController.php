<?php

namespace App\Http\Controllers\Mail;


$SockTimeOut = 10;
	


class CMemStreamController 
{
    var $Buffer;
    var $InputStream;
    var $Pos;

    function debug($text)
    {
    //		flush();
    //		echo $text;
    }

    function CMemStream ()
    {
        $this->InputStream = false;
        $this->Pos = 0;
        $this->Buffer = "";
        $this->debug("A : ".gettype($this->Buffer)."<br>");
    }

    function setBuffer ($Buffer)
    {
        $this->InputStream = true;
        $this->Buffer = $Buffer;
        $this->Pos = 0;
    }

    function isReading () { return $this->InputStream; }

    function serialUInt8 (&$val)
    {
        if ($this->isReading())
        {
            $val = ord($this->Buffer{$this->Pos++});
            $this->debug(sprintf ("read uint8 '%d'<br>\n", $val));
        }
        else
        {
        $this->debug("B".gettype($this->Buffer)."<br>");
        $this->debug(sprintf ("write uint8 Buffer size before = %u<br>\n", strlen($this->Buffer)));
            $this->Buffer = $this->Buffer . chr($val & 0xFF);
            $this->Pos++;
        $this->debug("C".gettype($this->Buffer)."<br>");
        $this->debug(sprintf ("write uint8 '%d' %d<br>\n", $val, $this->Pos));
        $this->debug(sprintf ("write uint8 Buffer size after = %u<br>\n", strlen($this->Buffer)));
        }
    }

    function serialUInt32 (&$val)
    {
        if ($this->isReading())
        {
            $val = ord($this->Buffer{$this->Pos++});
            $val += ord($this->Buffer{$this->Pos++})*256;
            $val += ord($this->Buffer{$this->Pos++})*(double)256*256;
            $val += ord($this->Buffer{$this->Pos++})*(double)256*256*256;
            $this->debug(sprintf ("read uint32 '%d'<br>\n", $val));
//				var_dump($val);
        }
        else
        {
        $this->debug("D".gettype($this->Buffer)."<br>");
            $this->Buffer .= chr($val & 0xFF);
            $this->Buffer .= chr(($val>>8) & 0xFF);
            $this->Buffer .= chr(($val>>16) & 0xFF);
            $this->Buffer .= chr(($val>>24) & 0xFF);
            $this->Pos += 4;
        $this->debug("E".gettype($this->Buffer)."<br>");
        $this->debug(sprintf ("write uint32 '%d' %d<br>\n", $val, $this->Pos));
        }
    }

    function serialString (&$val)
    {
        if ($this->isReading())
        {
            $this->serialUInt32($size);
            $this->debug(sprintf ("read string : size = %u<br>\n", $size));
            $val = substr ($this->Buffer, $this->Pos, $size);
            $this->debug(sprintf ("read string '%s'<br>\n", $val));
            $this->Pos += strlen($val);
        }
        else
        {
            $val_len = strlen($val);
            $this->serialUInt32($val_len);
            $this->Buffer .= $val;
            $this->Pos += strlen($val);
            $this->debug(sprintf ("write string '%s' %d<br>\n", $val, $this->Pos));
        }
    }
    function serialEnum (&$val)
    {
        if ($this->isReading())
        {
            $intValue = 0;
            $this->serialUInt32($intValue);
            $val->fromInt((int)$intValue);
            $this->debug(sprintf ("read enum '%s'<br>\n", $val->toString()));
        }
        else
        {
            $this->serialUInt32($val->toInt());
            $this->debug(sprintf ("write enum '%s' %d<br>\n", $val->toString(), $this->Pos));
        }
    }
}
