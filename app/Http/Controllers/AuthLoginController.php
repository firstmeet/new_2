<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
             return back()->with('msg',__t('incorrect_password'));
         }else{
             if ($user->signmaster==1){
                 auth()->login($user,$request->get('remember'));
                 return view('user.list');
             }
             if ($user->current_status==0){
                 return back()->with('msg',__t('no_login_pri'));
//                 return $this->message('',1,trans('auth.failed_policy'));
             }else{
                 auth()->login($user,$request->get('remember'));
                 return view('user.index');
             }
         }
    }
    public function logout()
    {
        \auth()->logout();
    }
}
