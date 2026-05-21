<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\AsignarModel;
use App\Models\questionsmodel;
use App\Models\profesoresmodel;
use App\Models\materiasmodel;
use App\Models\answermodel;


class Questions extends Component
{
    public $position=1, $current ,$size=30;
    public $preguntas, $pregunta_detalle,$pregunta,$categoria;

    public $asignaciones;
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

    public function guardarRespuesta($score)
    {

        // answermodel::create([
        //     'user_id'     => Auth::id(),
        //     'teacher_id'  => $asignacionActual->teacher_id, // Tomados de tu asignación activa
        //     'subject_id'  => $asignacionActual->subject_id,
        //     'question_id' => $preguntaActual->id,
        //     'score'       => $score,                        // El valor del emoji presionado (1 al 5)
        //     'comment'     => null,
        //     'created_at'  => now(),
        // ]);


        if ($this->indicePregunta < count($this->preguntas) - 1) {
            $this->indicePregunta++;
        } else {
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
        return view('livewire.user.questions'); //->with(compact('current'))
    }


}