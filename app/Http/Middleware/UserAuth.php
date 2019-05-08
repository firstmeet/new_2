<?php

namespace App\Http\Middleware;

use Closure;
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
        if (session('user_id')){
            return $next($request);
        }else{
            return response()->json(['data'=>0,'status'=>1,'message'=>trans('auth.please_login')]);
        }

    }
}
