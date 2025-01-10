<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        "nombres",
        "apellidos",
        "edad",
        "grado",
        "grupo",
        "turno"
    ];

    public function alumnoMateria(){
        return $this->hasMany("App\Models\AlumnoMateria", "idMateria", "id");
    }
}
