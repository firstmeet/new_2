<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dd(__trans('cart_1'));
//        return view('home');
    }

    public function welcome()
    {
        return view('index');
    }

    public function lang(Request $request)
    {
        App::setLocale(\request('lang'));
        request()->session()->put('lang',request('lang'));
        return response()->json(['code'=>1,'msg'=>'修改成功']);
    }
}
