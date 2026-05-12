<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Login extends Component
{

    public
    $usuario,
    $password;

    public function render()
    {
        return view('livewire.admin.login');
    }

    // public function submitForm(Request $request)
    // {
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
        dd('entrando a method');
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

            return redirect()->intended(route('evaluacion'));
        }

        return redirect(route('/'))->with('error', 'Credenciales incorrectas');
    }
}