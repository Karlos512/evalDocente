<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('welcome', function () {
    return view('user.welcome');
});

//USER ROUTES

Route::get('/',[UserController::class,'LoginView'])->name('/');

Route::get('evaluacion',[UserController::class,'TestView'])->middleware('auth')->name('evaluacion');

Route::get('welcome',[UserController::class,'WelcomeView'])->middleware('auth')->name('welcome');

// Route::get('gracias',[UserController::class,'ThanksView'])->middleware('auth')->name('gracias');

Route::get('gracias',[UserController::class,'ThanksView'])->name('gracias');

Route::get('logout',[UserController::class,'logout'])->name('logout');


//ADMIN ROUTES
Route::get('/admin/nuevo-alumno',[AdminController::class,'nuevoAlumno'])->middleware('auth')->name('nuevo-alumno');

Route::get('/admin/nueva-materia',[AdminController::class,'nuevaMateria'])->middleware('auth')->name('nueva-materia');

Route::get('/admin/asignar',[AdminController::class,'asignar'])->middleware('auth')->name('asignar');

Route::get('/admin/lista-materias',[AdminController::class,'listaMaterias'])->middleware('auth')->name('lista-materias');

