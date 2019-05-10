<?php

namespace App\Http\Controllers;

use App\Emailtitles;
use App\Http\ApiResource;
use App\Http\Requests\InviteRequest;
use App\Invite;
use App\MailLog;
use App\Sign;
use App\User;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
{
    use ApiResource;
    public function store(InviteRequest $request)
    {
         $sign=Sign::where('user_id',auth()->user()->id)->first();
         if ($sign&&auth()->user()->is_signmaster){
             if (!$sign->status){
                return $this->message('',1,__t('15573953538039'));
             }
             $invitee_status=User::where([['username','=',$request->get('email')]])->first();
             if (!$invitee_status){
                 return $this->message('',1,__t('15573954427957'));
             }else{
                if (Sign::where('user_id',$invitee_status->id)->first()){
                 return $this->message('',1,__t('15574592917626'));
             }
                 if ($invitee_status->current_status!=1){
                     return $this->message('',1,__t('15573954033523'));
                 }
             }
         }else{
             return $this->message('',1,__t('15573953538039'));
         }
         $data=[
             'inviter_id'=>auth()->user()->id,
             'invitees'=>$request->get('email'),
             'invitee_id'=>$invitee_status->id
         ];
         $create=Invite::create($data);
         if ($create){
             $data_sign=[
                 'title'=>'11123123',
                 'user_id'=>$invitee_status->id,
                 'status'=>0,
                 'signature_id'=>'',
                 'username'=>$invitee_status->username
             ];
             Sign::create($data_sign);
             $email_cont=Emailtitles::getone('invite_sign',session('lang','en'));
             $file=file_get_contents("https://www.elevateunited.cn/".$email_cont->body);
             $file=str_replace('{url}',url('/user/index'),$file);
             MailLog::create(['email'=>$request->get('email')]);
             Mail::to($request->get('email'))->queue(new \App\Mail\SendEmail($file,$email_cont->title));
             return $this->message('',0,__t('15423548318740'));
         }

    }
    public function index()
    {
        $data=Invite::with(['signs'=>function($query){
            $query->select(['user_id','status']);
        }])->where('inviter_id',auth()->user()->id)->get();
        return $this->message($data,0);
    }
    public function list()
    {
        return view('manage.list');
    }

    public function toinvite()
    {
        return view('manage.toinvite');
    }
}
