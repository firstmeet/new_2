<?php

namespace App\Http\Controllers;

use App\Emailtitles;
use App\Invite;
use App\Mail\SendPdfMail;
use App\MailLog;
use App\Service\pdf;
use App\Service\word;
use App\Service\zip;
use App\Sign;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
  
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {

//        $email_cont=Emailtitles::getone('invite_sign','hk');
//        $file=file_get_contents("https://www.elevateunited.cn/".$email_cont->body);
//        $file=str_replace('{url}',"https://www.elev8united.com/user/index",$file);
////        MailLog::create(['email'=>$request->get('email')]);
//        Mail::to('exiao@chinabridgegroup.com')->queue(new \App\Mail\SendEmail($file,$email_cont->title));
//		return view('test');
//        $mail_arr=['871609160@qq.com'];
//        $invite=Invite::whereIn('invitees',$mail_arr)->get(['id','invitees','invitee_id']);
//        foreach ($invite as $key=>$value){
//
//           $dest=$this->download($invite->id,$invite->invitee_id);
//           dd($dest);
//        }
        Mail::to('871609160@qq.com')->sendNow(new SendPdfMail('11','111',public_path('1.pdf')));
//        $send=Mail::to('871609160@qq.com')->send(new SendPdfMail('11','111',public_path('1.pdf')));
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
    public function send_mail_pdf()
    {
        $mail_arr=['871609160@qq.com'];
        $sign=Sign::whereIn('username',$mail_arr)->get();
        dd($sign);
    }
    public function download($invite_id,$invitee_id)
    {
//        dd($request->get('invite_id'));
        $signs=Sign::where('invite_id',$invite_id)->get();
        $user_data=DB::table('id',$invite_id)->first(['languagepreference']);

        $un_water_files=[];
        if ($user_data->languagepreference=='hk'){
            $un_water_files=array_merge($un_water_files,[storage_path('4_hk.pdf'),storage_path('5_hk.pdf')]);
        }else{
            $un_water_files=array_merge($un_water_files,[storage_path('4.pdf'),storage_path('5.pdf')]);
        }

        foreach ($signs as $key=>$value){
            if ($value['signature_request_id']){
                $uploads_dir=storage_path('uploads/'.$value['signature_request_id'].'.pdf');
                if (file_exists($uploads_dir)){
                    array_push($un_water_files,$uploads_dir);
                }else{
                    $down=$this->client->getFiles($value['signature_request_id'],$uploads_dir,'pdf');

                    if ($down){
                        array_push($un_water_files,$uploads_dir);
                    }
                }

            }
        }
        $pdf=new pdf();
        $water_files=[];
//          dd($un_water_files);
        if (!empty($un_water_files)){
            foreach ($un_water_files as $value){
                $path=storage_path('uploads/'.uniqid().'.pdf');

                $pdf->watermark($value,$path);

                array_push($water_files,$path);
            }
        }
        $zip=new zip();
        $zip_dest=storage_path(('uploads/'.uniqid().'.zip'));
        $zip->zipFiles($zip_dest,$water_files);

        return $zip_dest;



//        return response()->download($zip_dest,'Offering.zip');
    }

  
}
