<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;


class ListStudent extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $alumnos = User::where('role', 'alumno')
            ->with(['semester', 'group'])
            ->where(function ($query) {
                $query->where('username', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest('id')
            ->paginate(10);

        return view('livewire.admin.list-student', [
            'alumnos' => $alumnos
        ]);
    }

    public function delete($id)
    {
        $alumno = User::findOrFail($id);

        $alumno->delete();

        session()->flash('message', 'Alumno eliminada correctamente');
    }

    public function edit($id)
    {
        return redirect()->route('edita-alumno', $id);
    }

}