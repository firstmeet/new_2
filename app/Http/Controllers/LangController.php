<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function lang(Request $request)
    {
        App::setLocale(\request('lang'));
        Session::put('lang',request('lang'));
        return response()->json(['code'=>1,'msg'=>__t('15423548318740')]);
    }
}
