<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        "id",
        "nombre",
        "grado",
        "grupo",
        "turno",
        "concatenado"
    ];

    public function profesorMateria(){
        return $this->hasMany("App\Models\ProfesorMateria", "idMateria", "id");
    }

    public function alumnoMateria(){
        return $this->hasMany("App\Models\AlumnoMateria", "idMateria", "id");
    }
}
