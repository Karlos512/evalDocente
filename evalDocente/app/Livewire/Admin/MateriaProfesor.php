<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ProfesoresModel;
use App\Models\SemestreModel;
use App\Models\GruposModel;
use App\Models\MateriasModel;
use App\Models\AsignarModel;

class MateriaProfesor extends Component
{
    public $teachers,$subjects,$semesters,$groups;
    public $teacher_id = '';
    public $subject_id = '';
    public $semester_id = '';
    public $group_id = '';

    public function render()
    {
        $this->teachers = ProfesoresModel::query()->where('is_active', 1)->get();
        $this->subjects = MateriasModel::query()->get();
        $this->semesters = SemestreModel::query()->get();
        $this->groups = GruposModel::query()->get();

        return view('livewire.admin.materia-profesor');
    }

    public function save()
    {
        $this->validate([
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'semester_id' => 'required',
            'group_id' => 'required'
        ]);

        // dd($this->teacher_id);
        AsignarModel::create([
            'teacher_id' => $this->teacher_id,
            'subject_id' => $this->subject_id,
            'semester_id' => $this->semester_id,
            'group_id' => $this->group_id
        ]);

        session()->flash('status', 'Relación creada correctamente.');
        return $this->redirect('/admin/asignar', navigate: true);
    }

}