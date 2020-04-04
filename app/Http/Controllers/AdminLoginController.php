<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->ajax()) {
            $username= $request->input('username');//登陆的用户名
            $password= $request->input('password');//登陆的密码

            $data= User::where('username', '=' ,$username)->get();
            $data= $data[0];
            //return response()->json(['status' => 200,'pswd'=>decrypt($data['password'])]);

            if ($username == $data['username'] && $password == decrypt($data['password'])) {
                //存储用户名到session
                session(['username' => $username]);
                return response()->json(['status' => 200]);
            }else {
                return response()->json(['status' => 403]);
            }

        } else{
            return response()->json(['status' => 403]);
        }

    }
}
