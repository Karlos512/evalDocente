<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\materiasmodel;

class NewMateria extends Component
{
    public $name = '';

    public function render()
    {
        return view('livewire.admin.new-materia');
    }

    public function saveMateria()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        marteriasmodel::create([
            'name' => $this->name,
        ]);

        session()->flash('status', 'Materia registrada con éxito.');

        $this->reset('name');

        return $this->redirect('/nueva-materia', navigate: true);
    }
}