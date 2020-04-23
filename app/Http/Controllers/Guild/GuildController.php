<?php

namespace App\Http\Controllers\Guild;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Advert\CDynamicWebController as CDynamicWeb;

class GuildController extends Controller
{
    public function addGuild(Request $request)
    {
        if ($request->ajax()) {
            $f_name = $request->input('f_name');
            $f_huizhang_name = $request->input('f_huizhang_name');
            $f_announcement = $request->input('f_announcement');
            $f_guild_icon_id = intval($request->input('f_guild_icon_id'));
            $f_name = preg_replace('/[(\xc2\xa0)|\s]+/','', $f_name);
            $f_huizhang_name = preg_replace('/[(\xc2\xa0)|\s]+/','', $f_huizhang_name);
          
           if ($f_name != null && $f_huizhang_name != null) {
                $SendGuildSvr = new CDynamicWeb;
                $res = "";
                //return response()->json(['data'=>$f_guild_icon_id]);
                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);
                $SendGuildSvr->cd_sendDynamicGuild( $f_name,  $f_huizhang_name,$f_announcement,$f_guild_icon_id);
        
                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
           }

        }
    }

    public function guildInfo()
    {
/*         $data[0] = ['id'=>1 ,'username'=>'yang','sex'=>'男'];
        $data[1] = ['id'=>2 ,'username'=>'meng','sex'=>'女'];
        
        return response()->json(['code'=>0 ,'count'=>2,'data'=> $data ]); */
        $tid= DB::table('notice_config')->where('f_id',1)->first();

        return response()->json(['code' => 0, 'data' => $tid]);
    }

    
    public function editGuild(Request $request)
    {
        //编辑广告图片
        $limit = $request->get('limit'); //前端Layui 传过来分页标准
        //return response()->json(['data'=>200]);
        $data = DB::connection('mysql_guild')->table('guild')->where('f_delete_state', '=', 0)->paginate($limit);


        return $data;
    }

    public function delGuild(Request $request)
    {
        $id = $request->id;
        $GuildSvr = new CDynamicWeb;
        $res = "";
     
        $GuildSvr->connect(config('connect.ip'), config('connect.port'), $res);

        //  添加游戏房间; t_game_table 表
        //  第一个字段代表标识; 固定的不用改
        //  第二个字段代表加的那条数据;  f_game_id；
        //162代表删除跑马灯数据
        $GuildSvr->cd_sendDynamicDelGuild( $id);

        if (!$GuildSvr->waitCallback()) {
            echo 'timeout';
            die();
        } 
    }

    function updateGuild(Request $request)
    {
        if ($request->ajax()) {
            $f_guild_id = $request->input('f_guild_id');
            $f_announcement = $request->input('f_announcement');
            $status =  DB::connection('mysql_guild')->table('guild')
            ->where('f_guild_id', $f_guild_id)
            ->update([
                'f_announcement' => $f_announcement
            ]);

        if ($status != 1) {
            return response()->json(['status' => $status]);
        }

        $GuildSvr = new CDynamicWeb;
        $res = "";
     
        $GuildSvr->connect(config('connect.ip'), config('connect.port'), $res);

        $GuildSvr->cd_sendDynamicUpdateGuild( $f_guild_id,$f_announcement);

        if (!$GuildSvr->waitCallback()) {
            echo 'timeout';
            die();
        } 

        }
    }
}
