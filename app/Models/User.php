<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasFactory;


    public function rol() {
        return $this->belongsTo(Role::class);  //belongs To= pertenece a
    }

    public function clinica() {
        return $this->belongsTo(Clinica::class);  //belongs To= pertenece a
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'email',
        'email_verified_at',
        'password',
        'telefono',
        'clinica_id',
        'role_id',
        'activo',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime'
    ];
}
