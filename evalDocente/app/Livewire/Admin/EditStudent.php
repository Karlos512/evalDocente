<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class EditStudent extends Component
{
   
    public $id;
    public $username;
    public $email;
    public $matricula;

    public function mount($id)
    {
        $student = User::findOrFail($id);

        $this->id = $student->id;
        $this->username = $student->username;
        $this->email = $student->email;
        $this->matricula = $student->matricula;
    }

    public function update()
    {
        $this->validate([
            'username' => 'required|min:3',
            'email' => 'required|email',
            'matricula' => 'required',
        ]);

        User::findOrFail($this->id)
            ->update([
                'username' => $this->username,
                'email' => $this->email,
                'matricula' => $this->matricula,
            ]);

        session()->flash('message', 'Alumno actualizado');

        return redirect()->route('lista-alumnos');
    }

    public function render()
    {
        return view('livewire.admin.edit-student');
    }
}
