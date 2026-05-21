<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answermodel extends Model
{
    use HasFactory;
    protected $table = 'evaluations';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'user_id',
        'teacher_id',
        'subject_id',
        'question_id',
        'question',
        'score',
        'comment',
    ];



    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    public function pregunta()
    {
        return $this->belongsTo(QuestionsModel::class, 'question_id');
    }
}