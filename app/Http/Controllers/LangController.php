<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function lang(Request $request)
    {
        App::setLocale(\request('lang'));
        request()->session()->put('lang',request('lang'));
        return response()->json(['code'=>1,'msg'=>'修改成功']);
    }
}
