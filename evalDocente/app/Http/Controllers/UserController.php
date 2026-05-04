<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function LoginView(){
        return view('user.login');
    }

    public function WelcomeView(){
        return view('user.welcome');
    }

    public function TestView(){
        return view('user.test');
    }

    public function ThanksView(){
        return view('livewire.user.thanks');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('/'));
    }
}