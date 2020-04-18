<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Mail\CMailServiceWebController as CMailServiceWeb;

class SendMailController extends Controller
{
    public function sendMail(Request $request)
    {
        $MailType = intval($request->input('MailType'));//邮件类型
        $RoleID = intval($request->input('RoleID'));//角色ID
        $Title = $request->input('Title');//标题
        $Content = $request->input('Content');//邮件内容

        $EndTime = $request->input('EndTime');//销毁时间
        $IsImportant = intval($request->input('IsImportant'));//是否是重大邮件
        //$RewardType = intval($request->input('RewardType'));//附件奖励
        //$ReWardCount = intval($request->input('ReWardCount'));//数量
        $ReWardExp = intval($request->input('ReWardExp'));//经验
        $ReWardXiMaLiang =intval($request->input('ReWardXiMaLiang'));//金豆
        $ReWardMoney =intval($request->input('ReWardMoney'));//金币
        $IsAuto = intval($request->input('IsAuto'));//是否自动领取
  
        $EndTime = intval(strtotime($EndTime));
        $MailSvr = new CMailServiceWeb;
        $res = "";
        
       // return response()->json(['res'=>'成功','time'=>$StartTime]);  
      
        if ($ReWardExp > 0) {
            $book[] = ['RewardType' =>1 ,'RewardCount' => $ReWardExp ];
        }

        if ($ReWardXiMaLiang > 0) {
            $book[] = ['RewardType' =>2 ,'RewardCount' => $ReWardXiMaLiang ];
        }

        if ($ReWardMoney > 0) {
            $book[] = ['RewardType' =>3 ,'RewardCount' => $ReWardMoney ];
        }
        //return response()->json(['res'=>'成功','data'=>$book]);  
        //$book = array( array('RewardType'=>$RewardType,'ReWardCount'=>$ReWardCount));
        $MailSvr->connect("152.136.61.225", 30002, $res);   
        $MailSvr->cd_SendMail($RoleID, $EndTime,$Title,$Content, $MailType, $IsImportant,$IsAuto,json_encode($book));
        
        if (!$MailSvr->waitCallback())
        {
            echo 'timeout';
            die();
        }
        //return response()->json(['res'=>'成功']);  

       
    }
}
