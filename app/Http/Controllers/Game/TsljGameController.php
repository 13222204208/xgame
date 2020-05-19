<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Advert\CDynamicWebController as CDynamicWeb;

class TsljGameController extends Controller
{
    public function getTsljConfig()
    {
        $data=  DB::table('game_controler')->select('f_int1','f_int2','f_int3','f_int4')
        ->where('f_room_type','TWL')
        ->get();
        return $data;
    }

    public function updateTsljConfig(Request $request)
    {
        if ($request->ajax()) {
            $int1 = $request->input('int1');
            $int2 = $request->input('int2');
            $int3 = $request->input('int3');
            $int4 = $request->input('int4');

            $status= DB::table('game_controler')->where('f_room_type','TWL')->update([
                'f_int1'=>$int1,
                'f_int2'=>$int2,
                'f_int3'=>$int3,
                'f_int4'=>$int4
            ]);
            
            if ($status == 1) {
                $SendGuildSvr = new CDynamicWeb;
                $res = "";

                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);//向游戏发送翻牌数据设置
                $SendGuildSvr->cd_sendDynamicTwoStr( 81 ,'TWL');
        
                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
            }
        }
    }

    public function getTsljRegion()//获取翻牌区间数据
    {
        $data= DB::table('goldenbeans_table')->select('f_id','f_min_level','f_max_level','f_proportion')
                ->where('f_game_name','TWL')->get();

                return $data;
    }


    public function addTsljRegion(Request $request)//添加太上老君区间数据
    {
        if ($request->ajax()) {
            $f_game_name ="TWL";
            $f_min_level = 41;
            $f_max_level = 50;
            $f_proportion = 20;

            $status= DB::table('goldenbeans_table')->insertGetId([
                'f_game_name' => $f_game_name,
                'f_min_level' => $f_min_level,
                'f_max_level' => $f_max_level,
                'f_proportion'=> $f_proportion
            ]);
         
            if ($status) {
                $SendGuildSvr = new CDynamicWeb;
                $res = "";
            
                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);//向游戏发送翻牌数据设置
                $SendGuildSvr->cd_sendDynamicTwoInt( 51 , $status);
        
                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
            }
        }
    }

    public function updateTsljRegion(Request $request)
    {
        if ($request->ajax()) {
            $f_id = $request->input('f_id');
            $f_max_level = $request->input('f_max_level');
            $f_min_level = $request->input('f_min_level');
            $f_proportion = $request->input('f_proportion');
            $num = count($f_id);
             for ($i=0; $i < $num ; $i++) { 
                $id = intval($f_id[$i]);
                $min_level = intval($f_min_level[$i]);
                $max_level = intval($f_max_level[$i]);
                $proportion = intval($f_proportion[$i]);
                DB::table('goldenbeans_table')->where('f_id',$id)->update([
                    'f_min_level'=>$min_level,
                    'f_max_level'=>$max_level,
                    'f_proportion'=>$proportion
                ]); 
            } 

            $SendGuildSvr = new CDynamicWeb;
            $res = "";

            $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);//向游戏发送翻牌数据设置
            $SendGuildSvr->cd_sendDynamicTwoStr( 52 ,'TWL');
    
            if (!$SendGuildSvr->waitCallback()) {
                echo 'timeout';
                die();
            }
           
        }
    }
}
