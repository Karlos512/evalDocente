<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\materiasmodel;

class ListaMaterias extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.lista-materias', [
            'materias' => materiasmodel::paginate(10),
        ]);
    }

    public function delete($id)
    {
        $materia = materiasmodel::findOrFail($id);

        $materia->delete();

        session()->flash('message', 'Materia eliminada correctamente');
    }
}