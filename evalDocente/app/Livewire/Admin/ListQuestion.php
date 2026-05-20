<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\QuestionsModel;


class ListQuestion extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $preguntas = QuestionsModel::select('id', 'question_text', 'category')->paginate(10);
        $preguntas = QuestionsModel::select('id', 'question_text', 'category')
        ->where(function ($query) {
            $query->where('question_text', 'like', '%' . $this->search . '%')
                  ->orWhere('category', 'like', '%' . $this->search . '%');
        })
        //->latest('id') // Opcional: para mostrar primero las más recientes
        ->paginate(10);

        return view('livewire.admin.list-question', [
            'preguntas' => $preguntas]);
    }


     public function delete($id)
    {
        $pregunta = QuestionsModel::findOrFail($id);

        $pregunta->delete();

        session()->flash('message', 'Pregunta eliminada correctamente');
    }

    public function editQuestion($id)
    {
        return redirect()->route('edita-pregunta', $id);
    }

}