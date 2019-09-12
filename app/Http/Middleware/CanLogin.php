<?php

namespace App\Http\Middleware;

use Closure;

class CanLogin
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
//        return $next($request);
        $ip=$request->ip();
        $data=geoip($ip);
        dd($data);
        if ($data['iso_code']=='CN'){
            return $next($request);
        }else{
            return redirect()->to('/home_index');
        }
    }
}
