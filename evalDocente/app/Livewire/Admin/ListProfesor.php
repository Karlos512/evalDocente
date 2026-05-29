<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\ProfesoresModel;

class ListProfesor extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $archivoCsv;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $profesor = ProfesoresModel::findOrFail($id);

        $profesor->delete();

        session()->flash('message', 'Profesor eliminado correctamente');
    }

    public function suspender($id)
    {
        $profesor = ProfesoresModel::findOrFail($id);
        $profesor->update(['is_active' => 0 ]);

        session()->flash('message', 'Profesor Suspendido');

        return redirect()->route('lista-profesores');
    }

    public function editarProfesor($id)
    {
        return redirect()->route('edita-profesor', $id);
    }

    public function render()
    {
        // $profesores = ProfesoresModel::where('is_active', '1')->paginate(10);

        $profesores = ProfesoresModel::where('is_active', '1')
        ->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        // ->latest('id')
        ->paginate(10);

        return view('livewire.admin.list-profesor', [
            'profesores' => $profesores
        ]);
    }

    public function updatedArchivoCsv()
    {
        $this->validate([
            'archivoCsv' => 'required|mimes:csv,txt|max:10240',
        ]);

        $path = $this->archivoCsv->getRealPath();
        $filas = array_map('str_getcsv', file($path));
        array_shift($filas); // Quitar encabezados

        $insertados = 0;

        try {
            foreach ($filas as $fila) {
                if (count($fila) < 1) continue;

                ProfesoresModel::create([
                    'name'       => $fila[0],
                    'is_active' => $fila[1] ?? 1,
                ]);
                $insertados++;
            }
            session()->flash('csv_success', "¡Éxito! Se importaron {$insertados} profesores correctamente.");
        } catch (\Exception $e) {
            session()->flash('csv_error', "Error al procesar los profesores: " . $e->getMessage());
        }
    }
}
