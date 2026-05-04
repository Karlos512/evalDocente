<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesoresmodel extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'is_active'
    ];



    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}