<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
use App\Http\Requests\InviteRequest;
use App\Invite;
use App\Sign;
use App\User;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    use ApiResource;
    public function store(InviteRequest $request)
    {
         $sign=Sign::where('user_id',auth()->user()->id)->first();
         if ($sign){
             if (!$sign->status){
                return $this->message('',1,trans('auth.no_signer_perm'));
             }
             $invitee_status=User::where([['username','=',$request->get('email')]])->first();

             if (Sign::where('user_id',$invitee_status->id)->first()){
                 return $this->message('',1,trans('auth.signed'));
             }
             if (!$invitee_status){
                 return $this->message('',1,trans('auth.no_invitee'));
             }else{
                 if ($invitee_status->current_status!=1){
                     return $this->message('',1,trans('auth.invitee_no_buy'));
                 }
             }
         }else{
             return $this->message('',1,trans('auth.no_signer_perm'));
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
             return $this->message('',0,trans('auth.invite_success'));
         }

    }
    public function index()
    {
        $data=Invite::with(['signs'=>function($query){
            $query->select(['user_id','status']);
        }])->where('inviter_id',auth()->user()->id)->get();
        return $this->message($data,0);
    }
}
