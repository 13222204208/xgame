<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->ajax()) {
            $usename= $request->input('username');//登陆的用户名
            $password= encrypt( $request->input('password') );//登陆的密码

            //User::all()


            return $password;
        } 

    }
}
