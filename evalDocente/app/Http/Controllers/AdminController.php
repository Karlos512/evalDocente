<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function nuevoAlumno(){
        return view('admin.nuevo-alumno');
    }

    public function asignar(){
        return view('admin.asignaciones');
    }

    public function nuevaMateria(){
        return view('admin.nueva-materia');
    }

    public function listaMaterias(){
        return view('admin.lista-materias');
    }

    public function nuevaPregunta(){
        return view('admin.nueva-pregunta');
    }

    public function listaAlumnos(){
        return view('admin.lista-alumnos');
    }

    public function editaAlumno($id)
    {
        return view('admin.edita-alumno', compact('id'));
    }
}