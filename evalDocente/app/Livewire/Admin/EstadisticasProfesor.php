<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ProfesoresModel;
use App\Models\QuestionsModel;
use App\Models\AnswerModel;

class EstadisticasProfesor extends Component
{

    public $profesores;
    public $profesorSeleccionado = null;
    public $estadisticas = [];
    public $promedioGeneral = 0;
    public $totalEvaluaciones = 0;

    public function mount()
    {
        $this->profesores = ProfesoresModel::where('is_active', '1')->orderBy('name')->get();
    }

    public function updatedProfesorSeleccionado($id)
    {
        if (empty($id)) {
            $this->estadisticas = [];
            $this->promedioGeneral = 0;
            $this->totalEvaluaciones = 0;
            return;
        }

        // 1. Obtener promedios por Categoría cruzando con la tabla de preguntas (questions)
        // Usamos el nombre de la tabla de tu QuestionsModel (asumimos que es 'questions')
        $this->estadisticas = AnswerModel::join('questions', 'evaluations.question_id', '=', 'questions.id') // Asegúrate de que 'answers' sea el nombre real de tu tabla de respuestas
            ->select('questions.category')
            ->selectRaw('AVG(evaluations.score) as promedio') // Tu columna 'score'
            ->selectRaw('COUNT(evaluations.id) as total_preguntas')
            ->where('evaluations.teacher_id', $id)
            ->groupBy('questions.category')
            ->get();

        // 2. Calcular el Promedio General utilizando tu columna 'score'
        $this->promedioGeneral = AnswerModel::where('teacher_id', $id)->avg('score') ?? 0;

        // 3. Contar el total de respuestas individuales obtenidas
        $this->totalEvaluaciones = AnswerModel::where('teacher_id', $id)->count();
    }

    public function render()
    {
        return view('livewire.admin.estadisticas-profesor');
    }
}
