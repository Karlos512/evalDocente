<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\GruposModel;

class EditGroup extends Component
{
    public $id;
    public $name;

    public function render()
    {
        return view('livewire.admin.edit-group');
    }

    public function mount($id)
    {
        $grupo = GruposModel::findOrFail($id);

        $this->id = $grupo->id;
        $this->name = $grupo->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        GruposModel::findOrFail($this->id)
            ->update([
                'name' => $this->name,
            ]);

        session()->flash('message', 'Grupo actualizado');

        return redirect()->route('lista-grupos');
    }

}

