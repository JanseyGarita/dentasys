<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcione extends Model
{
    use HasFactory;


    protected $fillable = [
        'clinica_id',
        'plane_id',
    ];


    public function clinica() {
        return $this->belongsTo(Clinica::class);  //belongs To= pertenece a
    }

    public function plan() {
        return $this->belongsTo(Plane::class);  //belongs To= pertenece a
    }
}
