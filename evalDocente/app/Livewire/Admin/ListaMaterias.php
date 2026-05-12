<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\materiasmodel;

class ListaMaterias extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.lista-materias', [
            'materias' => materiasmodel::paginate(10),
        ]);
    }
}