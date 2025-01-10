<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnoMateria extends Model
{
    protected $fillable = [
        "idAlumno",
        "idMaterias"
    ];

    public function alumno(){
        return $this->belongsTo("App\Models\Alumno", "idAlumno", "id");
    }

    public function materia(){
        return $this->belongsTo("App\Models\Materia", "idMateria", "id");
    }
}
