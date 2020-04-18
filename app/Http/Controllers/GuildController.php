<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuildController extends Controller
{
    public function guildInfo()
    {
/*         $data[0] = ['id'=>1 ,'username'=>'yang','sex'=>'男'];
        $data[1] = ['id'=>2 ,'username'=>'meng','sex'=>'女'];
        
        return response()->json(['code'=>0 ,'count'=>2,'data'=> $data ]); */
        $tid= DB::table('notice_config')->where('f_id',1)->first();

        return response()->json(['code' => 0, 'data' => $tid]);
    }
}
