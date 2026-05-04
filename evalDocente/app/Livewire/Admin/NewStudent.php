<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\semestremodel;
use App\Models\gruposmodel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class NewStudent extends Component
{
    public
    $name="",
    $email="",
    $password="",
    $grupo="",
    $semestre="";

    public $semesters,$groups;

    public function render()
    {
        $this->semesters = semestremodel::query()->get();
        $this->groups = gruposmodel::query()->get();
        return view('livewire.admin.new-student');
    }

    public function saveStudent(){

        $this->validate([
            'name' => 'required',
            'email' =>'required',
            'password' => 'required',
            'semestre'=>'required',
            'grupo'=>'required',
        ]);


        $user = User::create([
            'username' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 2,
            'semester_id' => $this->semestre,
            'group_id' => $this->grupo

            // 'apellido_paterno' => $this->paterno,
            // 'apellido_materno' => $this->materno,
            // 'telefono' => $this->telefono,
            // 'cp' => $this->cp,
            // 'estado' => $this->estado,
        ]);

        session()->flash('status', 'Alumno registrado con éxito.');
        return $this->redirect('/nuevo-alumno', navigate: true);
    }
}