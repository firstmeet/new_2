<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd(session('user_id'));
        if ($request->session()->get('lang')){
            App::setLocale($request->session()->get('lang'));
        }

        if (auth()->user()){
            $sign_info=Sign::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
            if ($sign_info['status']==1){
                return redirect('/user/list');
            }
            return $next($request);
        }else{
            return redirect(url('login'));
        }

    }
}
