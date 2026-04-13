<?php

namespace App\Livewire\User;

use Livewire\Component;

class Questions extends Component
{
    public $position=0, $current ,$size=30;

    public function render()
    {

            $this->current=$this->position+1;

        return view('livewire.user.questions'); //->with(compact('current'))
    }

    public function saveScore($profesorID, $questionId, $score){
        // dd('El clic llegó correctamente al servidor');
        //guardar pregunta respuesta
        $this->incrementar();
    }

    public function incrementar(){
        // $this->size = sizeof($this->recientes);

        $this->position++;
        if ($this->position >= $this->size) {
            $this->position = 0;
        }

        // dd('El clic llegó correctamente al servidor incrementar '.$this->position);
    }
}