<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\materiasmodel;

class ListaMaterias extends Component
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
        $materias =  materiasmodel::paginate(10);

        $materias = materiasmodel::select('id', 'name') // O las columnas que tenga tu tabla
        ->where('name', 'like', '%' . $this->search . '%')
        //->latest('id') // Muestra los últimos creados primero
        ->paginate(10);

        return view('livewire.admin.lista-materias', [
            'materias' => $materias
        ]);
    }

    public function delete($id)
    {
        $materia = materiasmodel::findOrFail($id);

        $materia->delete();

        session()->flash('message', 'Materia eliminada correctamente');
    }
}