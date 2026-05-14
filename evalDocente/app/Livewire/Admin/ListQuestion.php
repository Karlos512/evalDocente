<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\QuestionsModel;


class ListQuestion extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.list-question', [
            'preguntas' => QuestionsModel::select('id', 'question_text', 'category')->paginate(10)]);
    }


     public function delete($id)
    {
        $pregunta = QuestionsModel::findOrFail($id);

        $pregunta->delete();

        session()->flash('message', 'Pregunta eliminada correctamente');
    }

    public function editQuestion($id)
    {
        return redirect()->route('edita-Pregunta', $id);
    }

}





