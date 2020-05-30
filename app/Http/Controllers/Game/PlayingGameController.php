<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Advert\CDynamicWebController as CDynamicWeb;

class PlayingGameController extends Controller
{
    public function gamePlaying(Request $request)//翻牌游戏 
    {

        if ($request->ajax()) {
            $int1 = $request->input('int1');
            $int2 = $request->input('int2');
            $int3 = $request->input('int3');
            $int4 = $request->input('int4');
            $int5 = $request->input('int5');
            $int6 = $request->input('int6');
            $int7 = $request->input('int7');
            $int8 = intval($request->input('int8'))*60*1000;

            $status= DB::table('game_controler')->where('f_room_type','Fanpai')->update([
                'f_int1'=>$int1,
                'f_int2'=>$int2,
                'f_int3'=>$int3,
                'f_int4'=>$int4,
                'f_int5'=>$int5,
                'f_int6'=>$int6,
                'f_int7'=>$int7,
                'f_int8'=>$int8
            ]);
            
            if ($status == 1) {
                $SendGuildSvr = new CDynamicWeb;
                $res = "";

                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);//向游戏发送翻牌数据设置
                $SendGuildSvr->cd_sendDynamicTwoStr( 81 ,'Fanpai');
        
                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
            }

           
        }

    }

    public function getGamePlaying()//获取翻牌数据显示在前台页面
    {
       $data=  DB::table('game_controler')->select('f_int1','f_int2','f_int3','f_int4','f_int5','f_int6','f_int7','f_int8')
                ->where('f_room_type','Fanpai')
                ->get();
       return $data;
    }

    public function getPlayingRegion()//获取翻牌区间数据
    {
        $data= DB::table('goldenbeans_table')->select('f_id','f_min_level','f_max_level','f_proportion')
                ->where('f_game_name','FanPai')->get();

                return $data;
    }

    public function addPlayingRegion(Request $request)//添加翻牌区间数据
    {
        if ($request->ajax()) {
            $f_game_name ="FanPai";
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

    public function updatePlayingRegion(Request $request)
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
            $SendGuildSvr->cd_sendDynamicTwoStr( 52 ,'FanPai');
    
            if (!$SendGuildSvr->waitCallback()) {
                echo 'timeout';
                die();
            }
           
        }
    }

    public function getPlayingWeight()
    {
        //获取翻牌权重数据
        $data= DB::table('game_fanpai_card_type')->select('f_proportion')
        ->get();

        return $data;
    }

    public function updatePlayingWeight(Request $request)//修改翻牌权重
    {
        if ($request->ajax()) {
            $id[4]= $request->input('4');
            $id[5]= $request->input('5');
            $id[6]= $request->input('6');
            $id[7]= $request->input('7');
            $id[8]= $request->input('8');//多少分钟后自动踢出
            $id[9]= $request->input('9');
            $id[10]= $request->input('10');
            $id[11]= $request->input('11');
            $id[12]= $request->input('12');
            $id[13]= $request->input('13');
            $id[14]= $request->input('14');
            $id[15]= $request->input('15');
            $id[16]= $request->input('16');

            for ($i=4; $i <=16 ; $i++) { 
                DB::table('game_fanpai_card_type')->where('f_auto_id',$i)->update([
                    'f_proportion'=>intval($id[$i])
                ]); 
            }

            $SendGuildSvr = new CDynamicWeb;
            $res = "";

            $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);//向游戏发送翻牌数据设置
            $SendGuildSvr->cd_sendDynamicOne( 62);
    
            if (!$SendGuildSvr->waitCallback()) {
                echo 'timeout';
                die();
            }
            
        }
    }

    public function queryPlayerRecords(Request $request ,$f_role_id, $f_account_id, $tname)//查询客户游玩记录
    {
        
            $limit = $request->get('limit');
            //$f_account_id = $request->input('f_account_id');
            if ($f_role_id =="not" && $f_account_id =="not") {
                return response()->json(['status'=>403]);
            }
          
            $tname = 'game_money_dot_'.$tname;
            if ($f_account_id != "not") {
                $role_id = $f_account_id << 4 | 1;  //帐号id左移4位或1等于角色id
            }else{
                $role_id = $f_role_id;
            }
           
            $data= DB::connection('mysql_logs')->table($tname)->where('f_role_id',$role_id)->paginate($limit);
            return $data;
/*             if ($data) {
                $data = json_encode($data);
                return response()->json(['status'=>200,'data'=>$data]);
            }else{
                return response()->json(['status'=>403]);
            } */
           
   
    }
}
