<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GameUserController extends Controller
{

    public function gameUserList(Request $request)
    {   

        $limit= $request->get('limit');
        //$limit= '0,1';
        $data=  DB::select("select * from 
        (d_account.t_account_guest inner join d_player.t_player on  d_account.t_account_guest.f_account_id <<4 |1 = d_player.t_player.f_role_id)
        inner join d_player.t_personal on d_account.t_account_guest.f_account_id <<4 |1 = d_player.t_personal.f_role_id ");
        $total=  DB::select("select count(*) as dd from d_account.t_account_guest limit {$limit}");
        $total= $total[0]->dd;
     
        return response()->json(['code' => 0,'total'=>$total, 'status' => 200 ,'data' =>$data]);

    }

}
