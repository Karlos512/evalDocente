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

    public function suspender($id)
    {
        $profesor = ProfesoresModel::findOrFail($id);
        $profesor->update(['is_active' => 0 ]);

        session()->flash('message', 'Profesor Suspendido');

        return redirect()->route('lista-profesores');
    }

    public function render()
    {
        return view('livewire.admin.list-profesor', [
            'profesores' => ProfesoresModel::where('is_active', '1')->paginate(10),
        ]);
    }
}