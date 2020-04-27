<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Advert\CDynamicWebController as CDynamicWeb;

class GameUserController extends Controller
{
    public function gameUserList(Request $request)
    {

        $limit = $request->get('limit');
        //$limit= '0,1';
        $data =  DB::select("select * from 
        (d_account.t_account_guest inner join d_player.t_player on  d_account.t_account_guest.f_account_id <<4 |1 = d_player.t_player.f_role_id)
        inner join d_player.t_personal on d_account.t_account_guest.f_account_id <<4 |1 = d_player.t_personal.f_role_id ");
        $total =  DB::select("select count(*) as dd from d_account.t_account_guest limit {$limit}");
        $total = $total[0]->dd;

        return response()->json(['code' => 0, 'total' => $total, 'status' => 200, 'data' => $data]);
    }

    public function queryUser(Request $request)
    {
        if ($request->ajax()) {
            $f_role_id = $request->input('f_role_id'); //角色ID
            $f_account_id = $request->input('f_account_id'); //帐户ID


            if ($f_account_id != null) {
                $f_account_id = $f_account_id << 4 | 1; //帐号id左移4位或1等于角色id

                $f_nick_name =  DB::connection('mysql_player')->table('player')->where('f_role_id', $f_account_id)->value('f_nick_name');

                if ($f_nick_name != null) {
                    return response()->json(['status' => 200, 'f_nick_name' => $f_nick_name, 'f_role_id' => $f_account_id]);
                } else {
                    return response()->json(['status' => 403]);
                }
            }

            if ($f_role_id != null) {
                //根据角色ID查询出玩家昵称
                $f_nick_name =  DB::connection('mysql_player')->table('player')->where('f_role_id', $f_role_id)->value('f_nick_name');

                if ($f_nick_name != null) {
                    return response()->json(['status' => 200, 'f_nick_name' => $f_nick_name, 'f_role_id' => $f_role_id]);
                } else {
                    return response()->json(['status' => 403]);
                }
            } else {
                return response()->json(['status' => 403]);
            }
        }
    }

    public function resetPhone(Request $request)//重置玩家 手机号       
    {
        if ($request->ajax()) {
            $f_role_id = $request->input('f_role_id');
            if ($f_role_id != null ) {
                $SendGuildSvr = new CDynamicWeb;
                $res = "";
                //return response()->json(['data'=>$f_guild_icon_id]);
                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);
                $SendGuildSvr->cd_sendDynamicResetPhone($f_role_id);
        
                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
            }else{
                return response()->json(['status' => 403]);
            }
        }
    }
}
