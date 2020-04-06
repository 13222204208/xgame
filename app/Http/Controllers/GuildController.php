<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuildController extends Controller
{
    public function guildInfo()
    {
        $data[0] = ['id'=>1 ,'username'=>'yang','sex'=>'男'];
        $data[1] = ['id'=>2 ,'username'=>'meng','sex'=>'女'];
        
        return response()->json(['code'=>0 ,'count'=>2,'data'=> $data ]);
    }
}
