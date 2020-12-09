<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;

    public function suscripciones() {
        return $this->hasMany(Suscripcione::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 plan tiene muchas suscripciones
     }
}
