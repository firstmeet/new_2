<?php

if (!function_exists('__t')){
    function __t($code,$lang='en')
    {
        if (session('lang')){
            $lang=session('lang');
        }
        return app(\App\Translate::class)->where([['code','=',$code],['lang','=',$lang]])->first(['cont']);
    }
}
