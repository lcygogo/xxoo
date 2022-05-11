<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ApiController extends Controller
{
    public function register(Request  $request){
        $data = $request->all();
        $data['password'] =Crypt::encrypt($data['password']);
        $user = User::create($data);
       if ($user){
           $res =[
               'status' => 0,
               'message' => '注册成功',
           ];
       }else{
           $res =[
               'status' => 1,
               'message' => '注册失败',
           ];
       }
       return $res;
    }

    public function login(Request  $request){
        $data = $request->all();
        $login =  User::where('username',$data['username'])->first();
        if ($login){
            $res =[
                'status' => 0,
                'message' => '登录成功',
            ];
        }else{
            $res =[
                'status' => 1,
                'message' => '登录失败',
            ];
        }
        return $res;
    }
}
