<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\QuestionsModel;


class NewQuestion extends Component
{
    public
    $pregunta="",
    $categoria="";

    public $categorias = [
        'NIVEL DE ENSEÑANZA',
        'NIVEL DE EXIGENCIA',
        'NIVEL DE CUMPLIMIENTO',
        'ACTUACIÓN DOCENTE',
        'MATERIAL DIDÁCTICO'
    ];

    public function saveQuestion(){

        $this->validate([
            'pregunta' => 'required',
            'categoria' =>'required',
        ]);


        $user = QuestionsModel::create([
            'question_text' => $this->pregunta,
            'category' => $this->categoria,
        ]);

        session()->flash('status', 'Pregunta registrada con éxito.');
        return $this->redirect('/admin/nueva-pregunta', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.new-question');
    }
}