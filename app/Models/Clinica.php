<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    use HasFactory;


    protected $fillable = [
      'nombre',
      'email',
      'pais'
      ];

    public function suscripciones() {
        return $this->hasMany(Suscripcione::class); // has many = tiene muchos(as)
     }

     public function users() {
        return $this->hasMany(User::class); // has many = tiene muchos(as)
     }

     
}
