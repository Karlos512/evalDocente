<?php

namespace App\Livewire\User;

use Livewire\Component;

class Welcome extends Component
{
    public $aceptaTerminos = false;
    public $aceptaPrivacidad = false;

    public function comenzar()
    {
        if ($this->aceptaTerminos && $this->aceptaPrivacidad) {
            return redirect()->route('evaluacion');
        }

        session()->flash('error', 'Debes aceptar los términos y el aviso de privacidad.');
    }

    public function render()
    {
        return view('livewire.user.welcome');
    }
}
