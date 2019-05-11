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
        $sign=Sign::where('user_id',auth()->user()->id)->latest()->first();

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
        return view('user/company_information');
    }

    public function investor_information()
    {
        $user=auth()->user();
        return view('user/investor_information',['email'=>$user->username,'member_id'=>$user->id+1000000]);
    }
    
    public function payment_information()
    {
        $sign=Sign::where('user_id',auth()->user()->id)->latest()->first();

        $money=number_format(1400*$sign['number']);
        $member_id=auth()->user()->id+1000000;
        return view('user/payment_information',compact('money','member_id'));
    }
    public function home()
    {
        return view('user/index');
    }

}
