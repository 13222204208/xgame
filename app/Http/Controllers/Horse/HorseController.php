<?php

namespace App\Http\Controllers\Horse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Advert\CDynamicWebController as CDynamicWeb;

class HorseController extends Controller
{
    public function addHorse(Request $request)
    {
        if ($request->ajax()) {
            $f_text = preg_replace('/[(\xc2\xa0)|\s]+/','', $request->input('f_text')); //内容
            $f_weights = intval($request->input('f_weights')); //跑马灯类型
            $f_openday = intval(strtotime($request->input('f_openday'))); //开启日期
            $f_closeday = intval(strtotime($request->input('f_closeday'))); //关闭日期
            $f_opentime = intval(strtotime($request->input('f_opentime'))); //开启时间
            $f_closetime = intval(strtotime($request->input('f_closetime'))); //关闭时间
            $f_waitime = intval($request->input('f_waitime')); //间隔时间以秒为单位

            if ($f_closeday < time()) {
                return false;
            }

            $flag = DB::table('hourcelamp_config')->insertGetId([
                'f_text' => $f_text,
                'f_weights' => $f_weights,
                'f_openday' => $f_openday,
                'f_closeday' => $f_closeday,
                'f_opentime' => $f_opentime,
                'f_closetime' => $f_closetime,
                'f_waitime' => $f_waitime,
            ]);
        }

        if ($flag != null) {
            $MailSvr = new CDynamicWeb;
            $res = "";

            $MailSvr->connect("152.136.61.225", 30002, $res);

            //  添加游戏房间; t_game_table 表
            //  第一个字段代表标识; 固定的不用改
            //  第二个字段代表加的那条数据;  f_game_id；
            //163代表插入数据
            $MailSvr->cd_sendDynamicTwoInt(163, $flag);

            if (!$MailSvr->waitCallback()) {
                echo 'timeout';
                die();
            }
        }
    }

    public function editHorse(Request $request)
    {
        $limit = $request->get('limit'); //前端Layui 传过来分页标准
        $data = DB::table('hourcelamp_config')->paginate($limit);
        //$count = Advert::count('id');
        return $data;
    }

    public function delHorse(Request $request)
    {
        $id = $request->id;
        $MailSvr = new CDynamicWeb;
        $res = "";

        $MailSvr->connect("152.136.61.225", 30002, $res);

        //  添加游戏房间; t_game_table 表
        //  第一个字段代表标识; 固定的不用改
        //  第二个字段代表加的那条数据;  f_game_id；
        //162代表删除跑马灯数据
        $MailSvr->cd_sendDynamicTwoInt(162, $id);

        if (!$MailSvr->waitCallback()) {
            echo 'timeout';
            die();
        } else {
            $affectedRows = DB::table('hourcelamp_config')->where('f_id', '=', $id)->delete();
        }
    }

    public function updateHorse(Request $request)
    {
        if ($request->ajax()) {
            $f_id = $request->input('f_id');
            $f_text = $request->input('f_text'); //内容
            $f_weights = intval($request->input('f_weights')); //跑马灯类型
            $f_openday = intval(strtotime($request->input('f_openday'))); //开启日期
            $f_closeday = intval(strtotime($request->input('f_closeday'))); //关闭日期
            $f_opentime = intval(strtotime($request->input('f_opentime'))); //开启时间
            $f_closetime = intval(strtotime($request->input('f_closetime'))); //关闭时间
            $f_waitime = intval($request->input('f_waitime')); //间隔时间以秒为单位

            $status =  DB::table('hourcelamp_config')
                ->where('f_id', $f_id)
                ->update([
                    'f_text' => $f_text,
                    'f_weights' => $f_weights,
                    'f_openday' => $f_openday,
                    'f_closeday' => $f_closeday,
                    'f_opentime' => $f_opentime,
                    'f_closetime' => $f_closetime,
                    'f_waitime' => $f_waitime,
                ]);
            if ($status != 1) {
                return response()->json(['status' => $status]);
            }
        }


        $MailSvr = new CDynamicWeb;
        $res = "";

        $MailSvr->connect("152.136.61.225", 30002, $res);

        //  添加游戏房间; t_game_table 表
        //  第一个字段代表标识; 固定的不用改
        //  第二个字段代表加的那条数据;  f_game_id；
        //161代表更新跑马灯数据
        $MailSvr->cd_sendDynamicTwoInt(161, $f_id);

        if (!$MailSvr->waitCallback()) {
            echo 'timeout';
            die();
        }
    }
}
