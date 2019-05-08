<?php

namespace App\Http\Controllers;

use App\Http\ApiResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResource;
    public function index()
    {
        return $this->message(User::find(session('user_id')));
    }

    public function home()
    {
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

    public function toinvite()
    {
        return view('user/toinvite');
    }
}
