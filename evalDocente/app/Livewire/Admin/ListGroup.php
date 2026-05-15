<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\GruposModel;

class ListGroup extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.list-group', [
            'grupos' => GruposModel::paginate(10),
        ]);
    }



    public function delete($id)
    {
        $grupo = GruposModel::findOrFail($id);

        $grupo->delete();

        session()->flash('message', 'Grupo eliminado correctamente');
    }
}