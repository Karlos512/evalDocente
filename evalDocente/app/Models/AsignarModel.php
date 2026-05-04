<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignarmodel extends Model
{
    use HasFactory;
    protected $table = 'assignments';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'teacher_id',
        'subject_id',
        'semester_id',
        'group_id',
    ];



    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}