<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questionsmodel extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'question_text',
        'category'
    ];



    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}