<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClientsLossController extends Controller
{
    public function checkClientsLoss(Request $request)
    {
        $page=$_GET['page'];
        $limit = $request->get('limit');
        $limits = ($page-1)*$limit.",".$limit;//分页
        //二库三表联合查询
       $data =  DB::select("select * from 
        (d_account.t_account_guest  JOIN d_player.t_player on  d_account.t_account_guest.f_account_id <<4 |1 = d_player.t_player.f_role_id)
        LEFT OUTER JOIN d_player.t_personal on d_account.t_account_guest.f_account_id <<4 |1 = d_player.t_personal.f_role_id limit {$limits}");
        $total =  DB::select("select count(*) as dd from d_player.t_personal");
        $total = $total[0]->dd;
/*         $array = ['code' => 0, 'total' => $total, 'status' => 200, 'limit' => $limit,'data' => $data];
        return $array; */
 
        return response()->json(['code' => 0, 'total' => $total, 'status' => 200, 'limit' => $limit,'data' => $data]); 
    }
}
