<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Power;
use App\User;

class UserManageController extends Controller
{
    public function addRole(Request $request)
    {
        if ($request->ajax()) {
            $role= $request->role;//角色
            $powername= $request->powername;//权限名称

            $power= new Power();
            $power->role= $role;//插入角色到权限表
            $power->power= $powername;
            $power->status= 1;//权限状态默认为开启
            $done= $power->save();//保存数据到权限表
           
            if ($done == true) {
                return response()->json(['status' => 200]);
            }else {
                return response()->json(['status' => 403]);
            }

        }else{
            return response()->json(['status' => 403]);
        }
        
    }


    public function addNewuser(Request $request)
    {
        if ($request->ajax()) {
            $role= $request->role;//用户的角色
            $username= $request->username;//用户的名称
            $password= $request->password;//用户密码
            $repassword= $request->repassword;//重复用户名密码
            if ($password != $repassword) {
                return response()->json(['status' => 404]);
            }

            $user= new User();
            $user->role= $role;
            $user->username= $username;
            $user->password= encrypt($password);
            $user->power= "little";
            $done= $user->save();
            if ($done == true) {
                return response()->json(['status' => 200]);
            }else {
                return response()->json(['status' => 403]);
            }
        }else{
            return response()->json(['status' => 403]);
        }
    }
}
