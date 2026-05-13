<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;


class ListStudent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.list-student', [
            'alumnos' => User::select('id', 'username', 'email', 'semester_id', 'group_id', 'matricula')->where('role', 'alumno')->paginate(10),
        ]);
    }

}





