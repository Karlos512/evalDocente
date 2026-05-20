<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AsignarModel;

class ListAsinaciones extends Component
{
    use WithPagination;

    public $search = '';

    // Resetear la paginación cuando el usuario busca algo
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteAssignment($id)
    {
        $asignacion = AsignarModel::find($id);
        if ($asignacion) {
            $asignacion->delete();
            session()->flash('status', 'Asignación eliminada correctamente.');
        }
    }

    public function render()
    {
        // Buscamos las asignaciones filtrando por el nombre del profesor o de la materia
        $asignaciones = AsignarModel::with(['profesor', 'materia', 'semester', 'group'])
            ->whereHas('profesor', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('materia', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest('id')
            ->paginate(10);

        return view('livewire.admin.list-asinaciones', [
            'asignaciones' => $asignaciones
        ]);
    }

}