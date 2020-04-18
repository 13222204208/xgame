<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvertController extends Controller
{
    public function advertImg(Request $request)
    {

        $file = $request->file('file');
        $url_path = 'D:\phpstudy_pro\WWW\game\public\uploads\advertImg'; //广告图片目录
        $rule = ['jpg', 'png', 'gif', 'jpeg'];
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();
            $tmpName = $file->getFileName();
            $realPath = $file->getRealPath();
            $entension = $file->getClientOriginalExtension();
            if (!in_array($entension, $rule)) {
                return '图片格式为jpg,png,gif,jpeg';
            }
            $newName = md5(date("Y-m-d H:i:s") . $clientName) . "." . $entension;
            $path = $file->move($url_path, $newName);
            $url_path= "http://192.168.1.104/uploads/advertImg";
            $namePath = $url_path . '/' . $newName;
           
        
            
            
            
            $flag = DB::table('notice_config')->insertGetId([
                'f_title'=> 'aa',
                'f_text' => 'tests',
                'f_view_type' => '2',
                'f_ok_jump' => 'www.baidu.com',
                'f_img_url' => $namePath, //保存广告图片地址到数据库
                'f_opentime' => 1587686400,
                'f_closetime' => 1587686400,     
                'f_weight' => 1,
                'f_enable' => 1
            ]); 
            //DB::table('notice_config')->update()
            
            if ($flag == true) {
                return response()->json(['code' => 0, 'status' => 200]);
            } else {
                return response()->json(['code' => 4, 'status' => 403]);
            }
        } else {
            return response()->json(['code' => 4, 'status' => 403]);
        }
    }

    public function editAdvert(Request $request)
    {
        //编辑广告图片
        $limit = $request->get('limit'); //前端Layui 传过来分页标准
        $data = Advert::paginate($limit);
        //$data = Advert::all();
        //$count = Advert::count('id');
        return $data;
        // return response()->json(['code'=>0 ,'count'=>$count,'data'=>$data]);
    }

    public function delAdvert(Request $request)
    {
        $id = $request->id;
        $advert = Advert::find($id);
        $done = $advert->delete();
        if ($done == true) {
            return response()->json(['status' => 200]);
        }
    }
}
