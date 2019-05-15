<?php

namespace App\Http\Controllers;

use App\Emailtitles;
use App\MailLog;
use App\Service\word;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
  
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $email_cont=Emailtitles::getone('invite_sign','hk');
        $file=file_get_contents("https://www.elevateunited.cn/".$email_cont->body);
        $file=str_replace('{url}',"https://www.elev8united.com/user/index",$file);
//        MailLog::create(['email'=>$request->get('email')]);
        Mail::to('evat0514@gmail.com')->queue(new \App\Mail\SendEmail($file,$email_cont->title));
//		return view('test');
		
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
