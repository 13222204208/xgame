<?php

namespace App\Http\Controllers\game;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TaskManagementController extends Controller
{
    public function taskRequirement(Request $request)
    {
        if ($request->ajax()) {
            $f_bottom_point= $request->input('req');
            $num = $request->input('num');

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
}
