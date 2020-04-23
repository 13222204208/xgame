<?php

namespace App\Http\Controllers\Guild;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Advert\CDynamicWebController as CDynamicWeb;

class GuildMemberController extends Controller
{
    public function guildMember(Request $request ,$guildID)
    {
        $limit = $request->get('limit'); 
     
      //  return response()->json(['id'=>$limit]);

       // $data = DB::connection('mysql_guild')->table('guild_role')->where('f_guild_id', '=', 8)->paginate($limit);
        $data=  DB::select("select *
         from d_guild.t_guild_role, d_player.t_player 
        where d_guild.t_guild_role.f_guild_id = {$guildID} and d_guild.t_guild_role.f_role_id = d_player.t_player.f_role_id limit {$limit}");
        $total=  DB::select("select count(*) as dd from d_guild.t_guild_role where d_guild.t_guild_role.f_guild_id = {$guildID}");
        $total= $total[0]->dd;

        return response()->json(['code' => 0,'total'=>$total, 'status' => 200 ,'data'=>$data,'guildID'=>$guildID]);
    }

    public function memberTitle(Request $request)//更改公会成员职务
    {
        if ($request->ajax()) {
            $f_role_id = $request->input('f_role_id');
            $f_title = $request->input('f_title');
            $f_guild_id = $request->input('f_guild_id');
            $where = array('f_guild_id'=>$f_guild_id, 'f_title' => 1);//1代表副会长职务
            $whereTwo = array('f_guild_id'=>$f_guild_id, 'f_title' => 2);//2代表精英职务
            $data= DB::connection('mysql_guild')->table('guild_role')->where($where)->count();
            $dataTwo= DB::connection('mysql_guild')->table('guild_role')->where($whereTwo)->count();

            if ($f_title == 1) {
                if ($data >= 2) {
                    return json_encode(['vice-chairman'=>403]);
                }
            }

            if ($f_title == 2) {
                if ($dataTwo >= 3) {
                    return json_encode(['essence'=>403]);
                }
            }

                $SendGuildSvr = new CDynamicWeb;
                $res = "";
                //return response()->json(['data'=>$f_guild_icon_id]);
                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);
                $SendGuildSvr->cd_sendDynamicUpdateGuildTitle( $f_guild_id ,$f_role_id, $f_title);
        
                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
        }
    }

    public function delMember(Request $request)//请离成员
    {
        if ($request->ajax()) {
            $f_role_id = $request->input('f_role_id');

            $f_guild_id = $request->input('f_guild_id');

            if ($f_role_id != null && $f_guild_id != null) {
                $SendGuildSvr = new CDynamicWeb;
                $res = "";
                //return response()->json(['data'=>$f_guild_icon_id]);
                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);
                $SendGuildSvr->cd_sendDynamicDelGuildTitle( $f_guild_id ,$f_role_id);
        
                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
           }
        }
    }
}
