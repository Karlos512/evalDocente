<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user';

    protected $fillable = [
        'id',
        'username',
        'email',
        'password',
        'role',
        'semester_id',
		'group_id'
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function semester()
    {
        // Un usuario pertenece a un semestre
        return $this->belongsTo(SemestreModel::class, 'semester_id');
    }

    public function group()
    {
        // Un usuario pertenece a un grupo
        return $this->belongsTo(GruposModel::class, 'group_id');
    }
}