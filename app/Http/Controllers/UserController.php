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
//        echo 1;
        return $this->message(User::find(session('user_id')));
    }
}
