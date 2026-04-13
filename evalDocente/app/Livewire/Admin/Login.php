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

    public function submitForm(Request $request)
    {
        $credentials =[
            $this->usuario,
            $this->password
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('lista-post'));
        }else{
            return redirect(route('/'));
        }
    }
}