<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TestController extends Controller
{
  
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
//		var_dump(\App\Invite::where("invitee_id",1200)->first());exit;

        return view('email.index',['url'=>'http://www.baidu.com']);
    }

  
}
