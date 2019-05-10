<?php

namespace App\Http\Controllers;

use App\Emailtitles;
use App\Jobs\SendEmail;
use App\Service\pdf;
use App\Service\zip;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Mpdf\Mpdf;

class HelloSignController extends Controller
{
    public function index(Request $request)
    {
       $pdf=new pdf();
       $page=$request->get('page',1);
       $pdf->show(storage_path($page.'.wa.pdf'));
//      $this->dispatch(new SendEmail('871609160@qq.com',$email_cont));
//        Mail::send('email.index',['cont'=>'123123'],function($message){
//            $message->to('871609160@qq.com');
//        });
//        $email_cont=Emailtitles::getone('invite_sign',session('lang','en'));
//        $file=file_get_contents("https://www.elevateunited.cn/".$email_cont->body);
//        $file=str_replace('{url}',url('/user/index'),$file);
    }
}
