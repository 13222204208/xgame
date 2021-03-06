<?php

namespace App\Http\Controllers\Turntable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Advert\CDynamicWebController as CDynamicWeb;

class TurntableController extends Controller
{
    public function editTurntable(Request $request)
    {
        $limit = $request->get('limit'); //前端Layui 传过来分页标准
        $data = DB::table('turntable_config')->paginate($limit);
        //$count = Advert::count('id');
        return $data;
    }

    public function updateTurntable(Request $request)
    {
        if ($request->ajax()) {
            $f_id = $request->input('f_id');
            $f_silver_count = intval($request->input('f_silver_count'));//白银奖池
            $f_gold_count = intval($request->input('f_gold_count'));//黄金奖池
            $f_diamond_count = intval($request->input('f_diamond_count'));//钻石奖池
            $f_is_default = intval($request->input('f_is_default'));//奖池类型
            if ($f_id ==1 ) {
               // return response()->json(['data'=> $f_is_default]);
               $SendTurntableSvr = new CDynamicWeb;
               $res = "";
       
               $SendTurntableSvr->connect(config('connect.ip'), config('connect.port'), $res);
               $SendTurntableSvr->cd_sendDynamicFour( $f_diamond_count,  $f_gold_count,$f_silver_count, $f_is_default);
       
               if (!$SendTurntableSvr->waitCallback()) {
                   echo 'timeout';
                   die();
               }
            }
        }
    }
}
