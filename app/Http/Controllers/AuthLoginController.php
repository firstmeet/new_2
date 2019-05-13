<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
use App\Invite;
use App\Sign;
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
         if(!Session::get('lang')){
		 	Session::put('lang','en');
		}
		 
         if (!$user){
             return back()->with('msg',__t('incorrect_password'));
         }else{
			 
		 	 $has_invite=\App\Invite::where("invitee_id",$user->id)->first();

			 
//			 if(!$has_invite) return back()->with('msg',__t('incorrect_password'));
             if ($user->is_signmaster==1){



                 auth()->login($user,$request->get('remember'));
                 $sign=Sign::where('user_id',auth()->user()->id)->latest()->first();
                 if ($sign&&$sign->status==1){
                     Session::put('sign_status',1);
                     return redirect('user/list');
                 }
                 return redirect('user/index');

             }
             if ($user->current_status==0){
//
                 return back()->with('msg',__t('no_login_pri'));
//                 return $this->message('',1,trans('auth.failed_policy'));
             }else{
                 //是否被邀请
                 $find=Invite::where('invitees',$email)->first();

                 if(!$find){
                     return back()->with('msg',__t('no_login_pri'));
                 }else{
                     auth()->login($user,$request->get('remember'));
                     $sign_status=Sign::where('user_id',$user->id)->latest()->first();
                     Session::put('sign_status',$sign_status['is_signed']);
                     if ($sign&&$sign->status==1){
                         return redirect('user/list');
                     }
                     return redirect('/user/index');
                 }
               ;
             }
         }
    }
    public function logout()
    {
        \auth()->logout();
    }
}
