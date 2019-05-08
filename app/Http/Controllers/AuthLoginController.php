<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
use App\User;
use Illuminate\Http\Request;

class AuthLoginController extends Controller
{
    use ApiResource;
    public function getLogin()
    {
        return view('auth.login');
    }

    public function Login(Request $request)
    {
         $email=$request->get('email');
         $password=$request->get('password');
         $user=User::where([['username','=',$email],['pwd','=',md5($password)]])->first();
         if (!$user){
             return $this->message('',1,trans('auth.failed'));
         }else{
             if ($user->status==1){
                 session('user_id',$user->id);
                 return $this->message('',0,trans('auth.success_login'));
             }
             if ($user->current_status==0){
                 return $this->message('',1,trans('auth.failed_policy'));
             }else{
                 session('user_id',$user->id);
                 return $this->message('',0,trans('auth.success_login'));
             }
         }
    }
}
