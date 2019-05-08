<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HelloSignController extends Controller
{
    public function index()
    {
        $user_email=User::find(session('user_id'),['username']);

    }
}
