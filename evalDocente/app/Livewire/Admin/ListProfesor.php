<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProfesoresModel;

class ListProfesor extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $profesor = ProfesoresModel::findOrFail($id);

        $profesor->delete();

        session()->flash('message', 'Profesor eliminado correctamente');
    }

    public function render()
    {
        return view('livewire.admin.list-profesor', [
            'profesores' => ProfesoresModel::paginate(10),
        ]);
    }
}