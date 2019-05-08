<?php

namespace App\Http\Middleware;

use Closure;

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
        if (session('user_id')){
            return $next($request);
        }else{
            return response()->json(['data'=>0,'status'=>1,'message'=>trans('auth.')]);
        }

    }
}
