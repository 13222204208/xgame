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

    public function getQuestion(Request $request ,$tid)
    {
        $limit= $request->get('limit');
        $data= DB::table('customerservice_config')->where('f_type',$tid)->paginate($limit);
        return $data;
    }

    public function addQAnswer(Request $request)
    {
        if ($request->ajax()) {
            $f_type = $request->input('f_type');
            $f_answer = $request->input('f_answer');
            $f_question = $request->input('f_question');

            $id= DB::table('customerservice_config')->insertGetId([
                'f_type'=>$f_type,
                'f_answer'=>$f_answer,
                'f_question'=>$f_question
            ]);

            if ($id) {
                return response()->json(['status'=>200,'id'=>$id]);
            }else{
                return response()->json(['status'=>403]);
            }
        }
    }

    public function delQuestion(Request $request)//删除问题
    {
        $id= $request->id;
        $state= DB::table('customerservice_config')->where('f_id',$id)->delete();
        if ($state) {
            return response()->json(['status'=>200,'id'=>$id]);
        }else{
            return response()->json(['status'=>403]);
        }
    }

    public function delQType(Request $request)//删除一个问题类型
    {
        $type= $request->type;
        $state= DB::table('customerservice_config')->where('f_type','=',$type)->delete();
        $status = DB::table('customerservice_tag')->where('f_type',$type)->delete();
        if ($status) {
            return response()->json(['status'=>200]);
        }else{
            return response()->json(['status'=>403]);
        }
    }

    public function updateQuestion(Request $request)
    {
        if ($request->ajax()) {
            $f_id = $request->input('f_id');
            $f_question = $request->input('f_question');
            $f_answer = $request->input('f_answer');

            $state= DB::table('customerservice_config')->where('f_id',$f_id)->update([
                'f_question'=>$f_question,
                'f_answer'=>$f_answer
            ]);


            if ($state) {
                return response()->json(['status'=>200]);
            }else{
                return response()->json(['status'=>403]);
            }

        }
    }
}
