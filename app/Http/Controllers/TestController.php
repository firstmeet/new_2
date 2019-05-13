<?php

namespace App\Http\Controllers;

use App\Emailtitles;
use App\Service\word;
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
		return view('test');
		
		//$rs->UPDATE_TIME;
       // $word=new word();
        //$word->htmlToWord();
//		var_dump(\App\Invite::where("invitee_id",1200)->first());exit;
//        $email_cont=Emailtitles::getone('invite_sign',session('lang','en'));
//
//        $file=file_get_contents("https://www.elevateunited.cn/".$email_cont->body);
//        dd($file);
//        return view('email.index',['url'=>'http://www.baidu.com']);
    }

  
}
