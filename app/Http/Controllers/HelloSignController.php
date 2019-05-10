<?php

namespace App\Http\Controllers;

use App\Service\pdf;
use Illuminate\Http\Request;

class HelloSignController extends Controller
{
    public function index(Request $request)
    {
//        $money=new money();
//        echo  $money->umoney(10000);
//        url('/',true);
       $pdf=new pdf();

       $page=$request->get('page',1);
        $pdf->watermark(storage_path($page.'.pdf'));
//       $arr=['Elevate Affiliate Note','Subscription Booklet-Elevate United'];
//       $pdf->show(storage_path($page.'.wa.pdf'),$arr[$page-1]);
//      $this->dispatch(new SendEmail('871609160@qq.com',$email_cont));
//        Mail::send('email.index',['cont'=>'123123'],function($message){
//            $message->to('871609160@qq.com');
//        });
//        $email_cont=Emailtitles::getone('invite_sign',session('lang','en'));
//        $file=file_get_contents("https://www.elevateunited.cn/".$email_cont->body);
//        $file=str_replace('{url}',url('/user/index'),$file);
//        Mail::to('871609160@qq.com')->queue(new \App\Mail\SendEmail($file,$email_cont->title));
    }
}
