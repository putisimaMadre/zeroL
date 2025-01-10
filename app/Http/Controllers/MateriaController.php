<?php

namespace App\Http\Controllers;

use App\Models\AlumnoMateria;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();
        return $materias;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materia = Materia::create($request->all());
        return $materia->http_response_code;
    }

    public function busquedaGradoGrupoTurno(Request $request)
    {
        $materias = DB::table('materias')
            //->select(['grado', 'grupo'])
            ->where('grado', $request->grado)
            ->where('grupo', $request->grupo)
            ->where('turno', $request->turno)
            ->get();
        
        /*$alumnos = DB::table('alumnos')
            ->select(['id', 'nombres'])
            ->where('grado', $asignatura->grado)
            ->where('grupo', $asignatura->grupo)
            ->get();*/
//        return $alumnos;
        
        foreach ($materias as $materia) {
            $alumnoMaterias = new AlumnoMateria();
            //$aa = new AlumnoActividad;
            $alumnoMaterias->idMateria = $materia->id;
            $alumnoMaterias->idAlumno = $request->id;
            /*$aa->idAlumno = $alumno->id;
            $aa->idActividad = $request->id;
            $aa->calificacion = 0;
            $aa->comentario = "";
            $aa->status = 1;*/
            $alumnoMaterias->save();
        }
        return $materias;
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        //
    }
}
