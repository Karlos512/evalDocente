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

}