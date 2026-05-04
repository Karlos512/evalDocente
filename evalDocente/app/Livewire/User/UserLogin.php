<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogin extends Component
{
    public $usuario,$password;
    public function render()
    {
        return view('livewire.user.user-login');
    }

    // public function submitForm(Request $request)
    // {
    //     dd('entrando');
    //     $credentials =[
    //         $this->usuario,
    //         $this->password
    //     ];

    //     if(Auth::attempt($credentials)){
    //         $request->session()->regenerate();
    //         return redirect()->intended(route('lista-post'));
    //     }else{
    //         return redirect(route('/'));
    //     }
    // }

    public function submitForm(Request $request){
        $credentials = [
            'username' => $this->usuario,
            'password' => $this->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended(route('nuevo-alumno'));
            }

            return redirect()->intended(route('welcome'));
        }

        return redirect(route('/'))->with('error', 'Credenciales incorrectas');
    }
}