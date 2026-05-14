<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\GruposModel;

class NewGroup extends Component
{
    public $name = '';


    public function saveGroup()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        GruposModel::create([
            'name' => $this->name,
        ]);

        session()->flash('status', 'Grupo registrado con éxito.');

        $this->reset('name');

        return $this->redirect('/admin/nuevo-grupo', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.new-group');
    }
}