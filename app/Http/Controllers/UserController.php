<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
use App\User;
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
        return view('user/investor_information');
    }
    
    public function payment_information()
    {
        return view('user/payment_information');
    }

}
