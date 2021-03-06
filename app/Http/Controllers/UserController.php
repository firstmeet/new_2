<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
use App\Sign;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResource;
    public function __construct()
    {
       // ee(Session::get());
    }

    public function index()
    {
        $sign=Sign::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();

        if ($sign&&$sign->status==1){
            \Illuminate\Support\Facades\Session::flash("error",__t('signed'));
            return redirect('user/list');
        }
        // phpinfo();
        // return $this->message(User::find(session('user_id')));
        // return redirect('/user/list');
        return view('user/index');
    }

    public function list()
    {
        return view('user/list');
    }

    public function sign()
    {
        return view('user/sign');
    }

    public function signinfo()
    {
        return view('user/signinfo');
    }

    public function company_information()
    {
        $url=\request()->url();
        $sign_info=Sign::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        if ($sign_info['status']==1&&!strpos($url,"/user/list")){
            return redirect('/user/list');
        }
        return view('user/company_information');
    }

    public function investor_information()
    {
        $url=\request()->url();
        $sign_info=Sign::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        if ($sign_info['status']==1&&!strpos($url,"/user/list")){
            return redirect('/user/list');
        }
        $user=auth()->user();
        return view('user/investor_information',['email'=>$user->username,'member_id'=>$user->id+1000000]);
    }
    
    public function payment_information()
    {
//        $url=\request()->url();
//        $sign_info=Sign::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
//        if ($sign_info['status']==1&&!strpos($url,"/user/list")){
//            return redirect('/user/list');
//        }
        $sign=Sign::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();

        $money=number_format(1400*$sign['number']);
        $member_id=auth()->user()->id+1000000;
        return view('user/payment_information',compact('money','member_id'));
    }

    public function personal_information()
    {
        $url=\request()->url();
        $sign_info=Sign::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        if ($sign_info['status']==1&&!strpos($url,"/user/list")){
            return redirect('/user/list');
        }
        $user=auth()->user();
        return view('user/personal_information',['email'=>$user->username,'member_id'=>$user->id+1000000]);

    }

    public function home()
    {
        $url=\request()->url();
        $sign_info=Sign::where('user_id',auth()->user()->id)->orderBy('id','desc')->first();
        if ($sign_info['status']==1&&!strpos($url,"/user/list")){
            return redirect('/user/list');
        }
        return view('user/index');
    }

}
