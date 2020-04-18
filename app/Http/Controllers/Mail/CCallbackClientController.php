<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Mail\CMemStreamController as CMemStream;
use App\Http\Controllers\Mail\CMessageController as CMessage;


class CCallbackClientController 
{
		var	$ConSock = false;

		var $MsgNum = 0;
		var $SockTimeOut=10;
		function debug($text)
		{
		//		flush();
		//		echo $text;
		}
		
		function connect($addr, $port, &$res)
		{
					
			$this->debug(sprintf("Connect<br>"));
			$this->MsgNum = 0;
			
			$this->ConSock = fsockopen ($addr, $port, $errno, $errstr, $this->SockTimeOut);
			$this->debug("H".gettype($this->ConSock)."<br>");

			if (!$this->ConSock)
			{
				$res = "Can't connect to the callback server '$addr:$port' ($errno: $errstr)";
				
				return false;
			}
			else
			{
				// set time out on the socket to 2 secondes
				stream_set_timeout($this->ConSock, $this->SockTimeOut);	
				$res = "";
				return true;
			}
		}
		
		function close()
		{
			if ($this->ConSock)
			{
				fclose($this->ConSock);
				$this->debug(sprintf("Close<br>"));
			}
			else
				$this->debug(sprintf("Already Closed !<br>"));
		}
		
		function sendMessage(&$message)
		{
			if (!$this->ConSock)
			{
				$this->debug(sprintf ("Socket is not valid\n"));
				return false;
			}
			$this->debug(sprintf ("sendMessage : message Buffer is '%d'<br>\n", $message->Pos));
			$this->debug(sprintf ("sendMessage : message Buffer is '%d'<br>\n", strlen($message->Buffer)));
			$hd = new CMemStream;
			$this->debug(sprintf("SendMessage number %u<br>", $this->MsgNum));
			$hd->serialUInt32 ($this->MsgNum);			// number the packet
			$this->MsgNum += 1;
			$this->debug(sprintf("After SendMessage, number %u<br>", $this->MsgNum));
			$messageType = 0;
			$hd->serialUInt8 ($messageType);
			$hd->serialString ($message->MsgName);

			$this->debug(sprintf ("sendMessage : header size is '%d'<br>\n", $hd->Pos));
			
//			$sb .= $message->Buffer;

			$size = $hd->Pos + $message->Pos;
			$Buffer = (string) chr(($size>>24)&0xFF);
			$Buffer .= chr(($size>>16)&0xFF);
			$Buffer .= chr(($size>>8)&0xFF);
			$Buffer .= chr($size&0xFF);
			$this->debug( "E".gettype($hd->Buffer)."<br>");
			$this->debug("F".gettype($message->Buffer)."<br>");
			$Buffer .= (string) $hd->Buffer;
			$Buffer .= (string) $message->Buffer;
			
			$this->debug("G".gettype($this->ConSock)."<br>");

			if (!fwrite ($this->ConSock, $Buffer))
			{
				$this->debug(sprintf ("Error writing to socket\n"));
				return false;
			}
			$this->debug(sprintf ("sent packet size '%d' (written size = %d) <br>\n", strlen($Buffer), $size));
			fflush ($this->ConSock);
			
			return true;
		}
		
		function waitMessage()
		{
			if (!$this->ConSock)
			{
				$this->debug(sprintf ("Socket is not valid\n"));
				return false;
			}
			

			$size = 0;
			$val = fread ($this->ConSock, 1);
			$info = stream_get_meta_data($this->ConSock);
			if ($info['timed_out']) 
			{
				$this->debug('Connection timed out!');
				return false;
			}
			$size = ord($val) << 24;
			$val = fread ($this->ConSock, 1);
			$info = stream_get_meta_data($this->ConSock);
			if ($info['timed_out']) 
			{
				$this->debug('Connection timed out!');
				return false;
			}
			$size = ord($val) << 16;
			$val = fread ($this->ConSock, 1);
			$info = stream_get_meta_data($this->ConSock);
			if ($info['timed_out']) 
			{
				$this->debug('Connection timed out!');
				return false;
			}
			$size += ord($val) << 8;
			$val = fread ($this->ConSock, 1);
			$info = stream_get_meta_data($this->ConSock);
			if ($info['timed_out']) 
			{
				$this->debug('Connection timed out!');
				return false;
			}
			$size += ord($val);
			$this->debug(sprintf ("receive packet size '%d'<br>\n", $size));
			$fake = fread ($this->ConSock, 5);
			$info = stream_get_meta_data($this->ConSock);
			if ($info['timed_out']) 
			{
				$this->debug('Connection timed out!');
				return false;
			}
			$size -= 5; // remove the fake

			$Buffer = "";
			while ($size > 0 && strlen($Buffer) != $size)
			{
				$Buffer .= fread ($this->ConSock, $size - strlen($Buffer));
				$info = stream_get_meta_data($this->ConSock);
				if ($info['timed_out']) 
				{
					$this->debug('Connection timed out!');
					return false;
				}
			}
			$msgin = new CMemStream;
			$msgin->setBuffer ($Buffer);
			
			// decode msg name
			$msgin->serialString($name);
			
			$this->debug(sprintf("Message name = '%s'<BR>", $name));
			$message = new CMessage;
			$message->setBuffer(substr($msgin->Buffer, $msgin->Pos));
			$message->setName($name);
			
			$this->debug(sprintf("In message name = '%s'<br>", $message->MsgName));
			
			return $message;
		}
}
