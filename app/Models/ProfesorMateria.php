<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfesorMateria extends Model
{
    protected $fillable = [
        "idProfesor",
        "idMateria"
    ];

    public function materias(){
        return $this->belongsTo("App\Models\Materia", "idMateria", "id");
    }

    public function profesor(){
        return $this->belongsTo("App\Models\Profesor", "idProfesor", "id");
    }
}
