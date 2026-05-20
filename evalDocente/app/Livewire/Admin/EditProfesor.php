<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ProfesoresModel;

class EditProfesor extends Component
{
    public $id;
    public $name;

    public function render()
    {
        return view('livewire.admin.edit-profesor');
    }

    public function mount($id)
    {
        $profesor = ProfesoresModel::findOrFail($id);

        $this->id = $profesor->id;
        $this->name = $profesor->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        ProfesoresModel::findOrFail($this->id)
            ->update([
                'name' => $this->name,
            ]);

        session()->flash('message', 'Profesor actualizado');

        return redirect()->route('lista-profesores');
    }
}
