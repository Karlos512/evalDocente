<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function LoginView(){
        return view('user.login');
    }

    public function TestView(){
        return view('user.test');
    }
}