<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $fillable = [
        "nombre",
        "telefono",
        "edad"
    ];

    public function profesorMateria(){
        return $this->hasMany("App\Models\ProfesorMateria", "idProfesor", "id");
    }
}
