<?php

namespace App\Http\Controllers\game;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Advert\CDynamicWebController as CDynamicWeb;

class TaskManagementController extends Controller
{
    public function taskRequirement(Request $request)
    {
        if ($request->ajax()) {
            $f_bottom_point= $request->input('req');//底分
            $num = $request->input('num');//任务条件

            if ($f_bottom_point == 0) {
                $game=array('TWL','Sslz','Ssdt','FanPai');
                $data= DB::table('consume_config')->select('f_room_type')->where('f_bottom_point','>=',$f_bottom_point)
                ->whereIn('f_room_type', $game)
                ->distinct('f_room_type')->get();
                 return response()->json(['status'=> 200,'game'=>$data]);
            }

            $arr = array(1,2,3,4);
            $arr2 = array(5,6);

            if(in_array($num,$arr)) {
                $game=array('TWL','Sslz','Ssdt','FanPai');
            }elseif(in_array($num,$arr2)){
                $game=array('FanPai');
            }

           $data= DB::table('consume_config')->select('f_room_type')->where('f_bottom_point','=',$f_bottom_point)
           ->whereIn('f_room_type', $game)
           ->distinct('f_room_type')->get();
            return response()->json(['status'=> 200,'game'=>$data]);
        }
    }

    public function createGameTask(Request $request)//插入任务
    {
        if ($request->ajax()) {
            $f_mission_game = $request->input('f_mission_game');
            $f_mission_content = $request->input('f_mission_content');
            $f_mission_weight = $request->input('f_mission_weight');
            $f_mission_count = $request->input('f_mission_count');
            $f_mission_reward = $request->input('f_mission_reward');
            $f_mission_event = $request->input('f_mission_event');
            $f_bottom_point = intval($request->input('f_bottom_point'));

            $f_mission_day_refresh = $request->input('f_mission_day_refresh');
            $f_mission_start_time = $request->input('f_mission_start_time');
            $f_mission_close_time = $request->input('f_mission_close_time');
            $f_mission_state = $request->input('f_mission_state');

            $f_mission_start_time = strtotime($f_mission_start_time);
            $f_mission_close_time = strtotime($f_mission_close_time);

            $f_mission_consume = $f_bottom_point;
            if ($f_bottom_point != 0 || $f_mission_game != "all") {
                $f_mission_consume= DB::table('consume_config')->where('f_room_type','=',$f_mission_game)
                ->where('f_bottom_point','=',$f_bottom_point)->value('f_consume_id');//查询游戏消耗ID
            }

 

           
            $taskId= DB::table('mission_template')->insertGetId([
                'f_mission_url'=>'no',
                'f_mission_content'=>$f_mission_content,
                'f_mission_weight'=>$f_mission_weight,
                'f_mission_count'=>$f_mission_count,
                'f_mission_reward'=>$f_mission_reward,
                'f_mission_event'=>$f_mission_event,
                'f_mission_game'=>$f_mission_game,
                'f_mission_consume'=>$f_mission_consume,
                'f_mission_day_refresh'=>$f_mission_day_refresh,
                'f_mission_start_time'=>$f_mission_start_time,
                'f_mission_close_time'=>$f_mission_close_time,
                'f_mission_state'=>$f_mission_state
            ]);
            
            if ($taskId) {
                $SendGuildSvr = new CDynamicWeb;
                $res = "";
            
                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);//新建游戏任务
                $SendGuildSvr->cd_sendDynamicTwoInt( 11,$taskId);
        
                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
            }
          
        }
    }

    function checkGameTask(Request $request)//查看所有任务
    {
        $limit= $request->get('limit');
       // $data=  DB::table('mission_template')->paginate($limit);
        $data= DB::table('mission_template')->leftJoin('consume_config','consume_config.f_consume_id','=','mission_template.f_mission_consume')->paginate($limit);
        return $data;
    }

    public function updateGameTask(Request $request)//更新任务
    {
        if ($request->ajax()) {
            $f_mission_id= $request->input('f_mission_id');
            $f_mission_content= $request->input('f_mission_content');
            $f_mission_weight= intval($request->input('f_mission_weight'));
          /*   $f_mission_count= intval($request->input('f_mission_count')); */
            $f_mission_reward= intval($request->input('f_mission_reward'));
            $f_mission_day_refresh = $request->input('f_mission_day_refresh');
            $f_mission_start_time = strtotime($request->input('f_mission_start_time'));
            $f_mission_close_time = strtotime($request->input('f_mission_close_time'));
            $f_mission_state = $request->input('f_mission_state');

            $state= DB::table('mission_template')->where('f_mission_id',$f_mission_id)->update([
                'f_mission_content'=>$f_mission_content,
                'f_mission_weight'=>$f_mission_weight,
         /*        'f_mission_count'=>$f_mission_count, */
                'f_mission_reward'=>$f_mission_reward,
                'f_mission_day_refresh'=>$f_mission_day_refresh,
                'f_mission_start_time'=>$f_mission_start_time,
                'f_mission_close_time'=>$f_mission_close_time,
                'f_mission_state'=>$f_mission_state
            ]);

            if ($state) {
                $SendGuildSvr = new CDynamicWeb;
                $res = "";
            
                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);//更新游戏任务
                $SendGuildSvr->cd_sendDynamicTwoInt( 12,$f_mission_id);
        
                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
            }
        }
    }

/*     public function getGamePay(Request $request)
    {
        //if ($request->ajax()) {
          //  $id = intval($request->input('id'));
          $id= intval($request->id);
            //return response()->json(['status'=>200,'f_mission_consume'=>$id]);
            $f_bottom_point= DB::table('consume_config')->where('f_consume_id',$id)->value('f_bottom_point');
           if ($f_bottom_point) {
                return response()->json(['status'=>200,'f_bottom_point'=>$f_bottom_point]);
             }else{
                return response()->json(['status'=>403]);
            } 
       // }
    } */
}
