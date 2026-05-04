<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\questionsmodel;
use App\Models\profesoresmodel;


class Questions extends Component
{
    public $position=1, $current ,$size=30;
    public $preguntas, $pregunta_detalle,$pregunta,$categoria;

    public function render()
    {

        $this->preguntas = questionsmodel::query()->get();

        $this->size = sizeof($this->preguntas);

        if ($this->size > 0) {

            if ($this->position == 1) {
                $this->pregunta_detalle = $this->preguntas[0];
            }else{
                $this->pregunta_detalle = $this->preguntas[$this->position];
            }

            $this->pregunta = $this->pregunta_detalle['question_text'];
            $this->categoria = $this->pregunta_detalle['category'];
            $current = $this->position + 1;
        }else{
            // $current = 0;
            // $nota = [];
        }

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