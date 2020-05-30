<?php

namespace App\Http\Controllers\Game;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    public function createQtype(Request $request)
    {
        if ($request->ajax()) {
            $f_title = $request->input('f_title');
            $id= DB::table('customerservice_tag')->insertGetId([
                'f_title'=>$f_title
            ]);

            if ($id) {
                return response()->json(['status'=>200,'id'=>$id]);
            }else{
                return response()->json(['status'=>403]);
            }
        }
    }

    public function getQtype()
    {
        $data= DB::table('customerservice_tag')->select('f_type','f_title')->get();
        return $data;
    }
}
