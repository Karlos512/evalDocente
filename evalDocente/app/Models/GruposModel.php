<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gruposmodel extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
    ];



    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}