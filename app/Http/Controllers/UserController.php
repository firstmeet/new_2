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

    public function invite(Request $request)
    {

        $email=$request->get('email');

    }
}
