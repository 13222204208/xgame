<?php

namespace App\Http\Controllers\Advert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Advert\CDynamicWebController as CDynamicWeb;

class CreateAdvertController
{
    public function createAdvert(Request $request)
    {
        $file = $request->file('file');
        $url_path = 'D:\phpstudy_pro\WWW\xgame\public\uploads\advertImg'; //广告图片目录
        $rule = ['jpg', 'png', 'gif', 'jpeg'];
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();
            $tmpName = $file->getFileName();
            $realPath = $file->getRealPath();
            $entension = $file->getClientOriginalExtension();
            if (!in_array($entension, $rule)) {
                return '图片格式为jpg,png,gif,jpeg';
            }
            $newName = md5(date("Y-m-d H:i:s") . $clientName) . "." . $entension;
            $path = $file->move($url_path, $newName);
            $url_path = "/uploads/advertImg";
            $namePath = $url_path . '/' . $newName;

            $flag = DB::table('notice_config')->insertGetId([
                'f_title' => 'aa',
                'f_text' => 'tests',
                'f_view_type' => '2',
                'f_ok_jump' => 'www.baidu.com',
                'f_img_url' => $namePath, //保存广告图片地址到数据库
                'f_opentime' => time(),
                'f_closetime' => strtotime(date('Y-m-d H:i:s',strtotime('+1week'))),
                'f_weight' => 1,
                'f_enable' => 2
            ]);
        }

        $MailSvr = new CDynamicWeb;
        $res = "";

        $MailSvr->connect(config('connect.ip'), config('connect.port'), $res);

        //  添加游戏房间; t_game_table 表
        //  第一个字段代表标识; 固定的不用改
        //  第二个字段代表加的那条数据;  f_game_id；
        //141代表插入数据
        $MailSvr->cd_sendDynamicTwoInt(141, $flag);

        if (!$MailSvr->waitCallback()) {
            echo 'timeout';
            die();
        }
    }

    public function editAdvert(Request $request)
    {
        //编辑广告图片
        $limit = $request->get('limit'); //前端Layui 传过来分页标准
        $data = DB::table('notice_config')->paginate($limit);
        //$count = Advert::count('id');
        return $data;
        // return response()->json(['code'=>0 ,'count'=>$count,'data'=>$data]);
    }

    
    public function delAdvert(Request $request)
    {
        $id = $request->id;
        $MailSvr = new CDynamicWeb;
        $res = "";

        $MailSvr->connect(config('connect.ip'), config('connect.port'), $res);

        //  添加游戏房间; t_game_table 表
        //  第一个字段代表标识; 固定的不用改
        //  第二个字段代表加的那条数据;  f_game_id；
        //143代表删除数据
        $MailSvr->cd_sendDynamicTwoInt(143, $id);

        if (!$MailSvr->waitCallback()) {
            echo 'timeout';
            die();
        }else{
            $affectedRows = DB::table('notice_config')->where('f_id', '=', $id)->delete();
        }

    }

    public function updateAdvert(Request $request)
    {
        if ($request->ajax()) {
            $f_id = $request->input('f_id');
            $f_title = $request->input('f_title');
            $f_text = $request->input('f_text');
            $f_view_type = $request->input('f_view_type');
            $f_ok_jump = $request->input('f_ok_jump');
            $f_img_url = $request->input('f_img_url');
            $f_weight = intval($request->input('f_weight'));
            $f_enable = $request->input('f_enable');
            $f_opentime = intval(strtotime($request->input('f_opentime')));
            $f_closetime = intval(strtotime($request->input('f_closetime')));
            if ($f_enable =='on') {
                $f_enable = 1;
            }else{
                $f_enable = 2;
            }
            
          $status=  DB::table('notice_config')
            ->where('f_id', $f_id)
            ->update(['f_title' => $f_title,
                        'f_text' => $f_text,
                        'f_view_type' => $f_view_type,
                        'f_ok_jump' => $f_ok_jump,
                        'f_img_url' => $f_img_url,
                        'f_weight' => $f_weight,
                        'f_enable' => $f_enable,
                        'f_opentime' => $f_opentime,
                        'f_closetime' => $f_closetime                     
                    ]);
            if ($status !=1) {
                return response()->json(['status'=>$status]);
            }
           
        } 


        $MailSvr = new CDynamicWeb;
        $res = "";

        $MailSvr->connect(config('connect.ip'), config('connect.port'), $res);

        //  添加游戏房间; t_game_table 表
        //  第一个字段代表标识; 固定的不用改
        //  第二个字段代表加的那条数据;  f_game_id；
        //142代表更新数据
        $MailSvr->cd_sendDynamicTwoInt(142, $f_id);

        if (!$MailSvr->waitCallback()) {
            echo 'timeout';
            die();
        }
    }
}
