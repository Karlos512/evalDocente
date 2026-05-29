<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\User;


class ListStudent extends Component
{
    use WithPagination;
    use WithPagination;

    public $archivoCsv;
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

    public function updatedArchivoCsv()
    {
        $this->validate([
            'archivoCsv' => 'required|mimes:csv,txt|max:10240',
        ]);

        $path = $this->archivoCsv->getRealPath();
        $filas = array_map('str_getcsv', file($path));

        $encabezados = array_shift($filas);

        $insertados = 0;

        try {
            foreach ($filas as $fila) {
                if (count($fila) < 2) continue;

                User::create([
                    'username' => $fila[0],
                    'email' => $fila[1],
                    'password' => isset($fila[2]) ? Hash::make($fila[2]) : Hash::make('sedu2026'),
                    'role' => 2,
                    'matricula' => $fila[2],
                    'semester_id' => $fila[3],
                    'group_id' => $fila[4]
                ]);
                $insertados++;
            }

            session()->flash('csv_success', "¡Éxito! Se importaron {$insertados} alumnos correctamente.");
        } catch (\Exception $e) {
            session()->flash('csv_error', "Error al procesar el archivo: " . $e->getMessage());
        }

        $this->cleanInstance();
    }

}