<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ProfesoresModel;

class NewProfesor extends Component
{

    public $name;
    public $is_active = 1;

    protected $rules = [
        'name' => 'required|min:3|max:100|unique:teachers,name', // Reemplaza 'teachers' por el nombre real de tu tabla si cambia
    ];

    protected $messages = [
        'name.required' => 'El nombre del profesor es obligatorio.',
        'name.min' => 'El nombre debe tener al menos 3 caracteres.',
        'name.max' => 'El nombre es demasiado largo.',
        'name.unique' => 'Ya existe un profesor registrado con ese nombre.',
    ];

    public function guardar()
    {
        $this->validate();

        ProfesoresModel::create([
            'name' => $this->name,
            'is_active' => $this->is_active,
        ]);

        session()->flash('status', '¡Profesor registrado exitosamente!');

        return redirect()->route('lista-profesores');
    }

    public function render()
    {
        return view('livewire.admin.new-profesor');
    }
}