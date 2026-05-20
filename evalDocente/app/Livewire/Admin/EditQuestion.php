<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\QuestionsModel;

class EditQuestion extends Component
{
    public $id;
    public $question_text;
    public $categoria;

    public $categorias = [
        'NIVEL DE ENSEÑANZA',
        'NIVEL DE EXIGENCIA',
        'NIVEL DE CUMPLIMIENTO',
        'ACTUACIÓN DOCENTE',
        'MATERIAL DIDÁCTICO'
    ];

    public function mount($id)
    {
        $question = QuestionsModel::findOrFail($id);

        $this->id = $question->id;
        $this->question_text = $question->question_text;
        $this->categoria = $question->category;
    }

    public function update()
    {
        $this->validate([
            'question_text' => 'required|min:3',
            'categoria' => 'required',
        ]);

        QuestionsModel::findOrFail($this->id)
            ->update([
                'question_text' => $this->question_text,
                'category' => $this->categoria,
            ]);

        session()->flash('message', 'Pregunta actualizada');

        return redirect()->route('lista-preguntas');
    }

    public function render()
    {
        return view('livewire.admin.edit-question');
    }
}