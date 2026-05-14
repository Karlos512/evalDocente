<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\AsignarModel;
use App\Models\questionsmodel;
use App\Models\profesoresmodel;
use App\Models\materiasmodel;


class Questions extends Component
{
    public $position=1, $current ,$size=30;
    public $preguntas, $pregunta_detalle,$pregunta,$categoria;

    public $asignaciones; // Materias y profesores del alumno
    // public $preguntas;    // Lista de preguntas de la base de datos
    public $indiceAsignacion = 0; // Para saber qué profesor estamos evaluando
    public $indicePregunta = 0;   // Para saber en qué pregunta vamos

    public function mount()
    {
        $user = auth()->user();

        $this->asignaciones = AsignarModel::where('semester_id', $user->semester_id)
            ->where('group_id', $user->group_id)
            ->with(['profesor', 'materia']) // Usando relaciones del modelo
            ->get();

        $this->preguntas = questionsmodel::all();
    }

    public function guardarRespuesta($valor)
    {
        // Aquí guardarías la respuesta en una tabla 'resultados'
        // Resultado::create([...]);

        // Lógica para avanzar
        if ($this->indicePregunta < count($this->preguntas) - 1) {
            $this->indicePregunta++;
        } else {
            // Si terminó las preguntas de este profesor, pasamos al siguiente
            if ($this->indiceAsignacion < count($this->asignaciones) - 1) {
                $this->indiceAsignacion++;
                $this->indicePregunta = 0; // Reiniciamos preguntas para el nuevo profe
            } else {
                return redirect()->route('gracias'); // Finalizó todo
            }
        }
    }

    public function render()
    {

        // $this->preguntas = questionsmodel::query()->get();

        // $this->size = sizeof($this->preguntas);

        // if ($this->size > 0) {

        //     if ($this->position == 1) {
        //         $this->pregunta_detalle = $this->preguntas[0];
        //     }else{
        //         $this->pregunta_detalle = $this->preguntas[$this->position];
        //     }

        //     $this->pregunta = $this->pregunta_detalle['question_text'];
        //     $this->categoria = $this->pregunta_detalle['category'];
        //     $current = $this->position + 1;
        // }else{
        //     // $current = 0;
        //     // $nota = [];
        // }

        // $this->current=$this->position+1;


        return view('livewire.user.questions'); //->with(compact('current'))
    }

    // public function saveScore($profesorID, $questionId, $score){
    //     //guardar pregunta respuesta
    //     $this->incrementar();
    // }

    // public function incrementar(){
    //     $this->position++;
    //     if ($this->position >= $this->size) {
    //         $this->position = 0;
    //     }
    // }

}