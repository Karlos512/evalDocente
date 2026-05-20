<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GruposModel;

class ListGroup extends Component
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
        // $grupos = GruposModel::paginate(10);

        $grupos = GruposModel::select('id', 'name') // O las columnas que tenga tu tabla
        ->where('name', 'like', '%' . $this->search . '%')
        //->latest('id') // Muestra los últimos creados primero
        ->paginate(10);

        return view('livewire.admin.list-group', [
            'grupos' => $grupos
        ]);
    }



    public function delete($id)
    {
        $grupo = GruposModel::findOrFail($id);

        $grupo->delete();

        session()->flash('message', 'Grupo eliminado correctamente');
    }

    public function editGroup($id)
    {
        return redirect()->route('edita-grupo', $id);
    }
}