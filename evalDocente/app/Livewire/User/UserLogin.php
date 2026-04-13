<?php

namespace App\Livewire\User;

use Livewire\Component;

class UserLogin extends Component
{
    public function render()
    {
        return view('livewire.user.user-login');
    }

    public function submitForm(Request $request)
    {
        dd('entrando');
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