<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\QuestionsModel;


class ListQuestion extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $archivoCsv;
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

    public function updatedArchivoCsv()
    {
        $this->validate([
            'archivoCsv' => 'required|mimes:csv,txt|max:10240',
        ]);

        $path = $this->archivoCsv->getRealPath();
        $filas = array_map('str_getcsv', file($path));
        array_shift($filas);

        $insertados = 0;

        try {
            foreach ($filas as $fila) {
                if (count($fila) < 1) continue;

                QuestionsModel::create([
                    'question_text' => $fila[0],
                    'category'      => $fila[1],
                ]);
                $insertados++;
            }
            session()->flash('csv_success', "¡Éxito! Se agregaron {$insertados} preguntas al banco.");
        } catch (\Exception $e) {
            session()->flash('csv_error', "Error al procesar las preguntas: " . $e->getMessage());
        }
    }

}
