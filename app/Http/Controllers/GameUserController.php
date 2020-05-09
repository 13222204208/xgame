<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Player;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Advert\CDynamicWebController as CDynamicWeb;

class GameUserController extends Controller
{
    public function gameUserList(Request $request)
    {
        $page=$_GET['page'];
        $limit = $request->get('limit');
        $limits = ($page-1)*$limit.",".$limit;//分页
        //二库三表联合查询
       $data =  DB::select("select * from 
        (d_account.t_account_guest inner join d_player.t_player on  d_account.t_account_guest.f_account_id <<4 |1 = d_player.t_player.f_role_id)
        inner join d_player.t_personal on d_account.t_account_guest.f_account_id <<4 |1 = d_player.t_personal.f_role_id limit {$limits}");
        $total =  DB::select("select count(*) as dd from d_player.t_personal");
        $total = $total[0]->dd;
/*         $array = ['code' => 0, 'total' => $total, 'status' => 200, 'limit' => $limit,'data' => $data];
        return $array; */
 
        return response()->json(['code' => 0, 'total' => $total, 'status' => 200, 'limit' => $limit,'data' => $data]); 
     
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

    public function resetPhone(Request $request) //重置玩家 手机号       
    {
        if ($request->ajax()) {
            $f_role_id = $request->input('f_role_id');
            if ($f_role_id != null) {
                $SendGuildSvr = new CDynamicWeb;
                $res = "";
                //return response()->json(['data'=>$f_guild_icon_id]);
                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);
                $SendGuildSvr->cd_sendDynamicResetPhone($f_role_id);

                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
            } else {
                return response()->json(['status' => 403]);
            }
        }
    }

    public function resetPassword(Request $request) //重置密码
    {
        if ($request->ajax()) {
            $f_account_id = intval($request->input('f_role_id')) >> 4;
            if ($f_account_id != null) {
                $hashpwd = password_hash(123456, PASSWORD_DEFAULT);
                $data =  DB::connection('mysql_account')->table('account_guest')->where('f_account_id', $f_account_id)->update([
                    'f_passworld' => $hashpwd
                ]);

                if ($data == 1) {
                    return response()->json(['status' => 200]);
                }
            } else {
                return response()->json(['status' => 403]);
            }
        }
    }

    public function resetDepot(Request $request) //重置玩家仓库密码
    {
        if ($request->ajax()) {
            $f_role_id = $request->input('f_role_id');
            // return response()->json(['status' => $f_role_id]);
            if ($f_role_id != null) {
                $SendGuildSvr = new CDynamicWeb;
                $res = "";
                //return response()->json(['data'=>$f_guild_icon_id]);
                $SendGuildSvr->connect(config('connect.ip'), config('connect.port'), $res);
                $SendGuildSvr->cd_sendDynamicResetDepot($f_role_id);

                if (!$SendGuildSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
            } else {
                return response()->json(['status' => 403]);
            }
        }
    }

    public function controlRole(Request $request) //开启帐号算法
    {
        if ($request->ajax()) {
            $f_role_id = $request->input('f_role_id');
            $role = $request->input('role');
             return response()->json(['status' => $role]);
            if ($f_role_id != null) {
                $SendSvr = new CDynamicWeb;
                $res = "";
                //return response()->json(['data'=>$f_guild_icon_id]);
                $SendSvr->connect(config('connect.ip'), config('connect.port'), $res);
                $SendSvr->cd_sendDynamicControlRole($f_role_id ,$role);

                if (!$SendSvr->waitCallback()) {
                    echo 'timeout';
                    die();
                }
            } else {
                return response()->json(['status' => 403]);
            }
        }
    }

    public function accountStatus(Request $request)//帐号封禁状态
    {
        if ($request->ajax()) {
            $f_account_id = intval($request->input('f_role_id')) >> 4;
            $f_freeze_to_time = $request->input('f_freeze_to_time');
            if ($f_account_id != null) {
                if ($f_freeze_to_time =="forever") {
                    $f_freeze_to_time = 999;
                }elseif ($f_freeze_to_time == "relieve") {
                    $data =  DB::connection('mysql_account')->table('account_guest')->where('f_account_id', $f_account_id)->update([
                        'f_freeze_to_time' => 0
                    ]);

                    if ($data == 1) {
                        return response()->json(['status' => 200]);
                    } else {
                        return response()->json(['status' => 403]);
                    }
                }

                $f_freeze_to_time =intval(time()) + intval($f_freeze_to_time) * 24 * 60 * 60 ;
                $data =  DB::connection('mysql_account')->table('account_guest')->where('f_account_id', $f_account_id)->update([
                    'f_freeze_to_time' => $f_freeze_to_time
                ]);

                if ($data == 1) {
                    return response()->json(['status' => 200]);
                }
            } else {
                return response()->json(['status' => 403]);
            }
        }
    }
}
