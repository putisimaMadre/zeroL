<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\AlumnoMateria;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumno = Alumno::all();
        return $alumno;
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
        $alumno = Alumno::create($request->all());
        
        $materias = DB::table("materias")
            ->where("grado", $request->grado)
            ->where("grupo", $request->grupo)
            ->where("turno", $request->turno)
            ->get();
            /*$materias = DB::table("materias")
            ->where("grado", 1)
            ->where("grupo", "c")
            ->where("turno", "matutino")
            ->get();

            echo($materias->isEmpty());*/

        $alumnos = DB::table("alumnos")
            ->where("grado", $request->grado)
            ->where("grupo", $request->grupo)
            ->where("turno", $request->turno)
            ->get();
        //Para los que ya estan
        foreach($alumnos as $alumno){
            foreach($materias as $materia){
                $alumnoMateria = new AlumnoMateria();
                $alumnoMateria->idAlumno = $alumno->id; 
                $alumnoMateria->idMateria = $materia->id;
                $existenAlumnosMaterias = DB::table("alumno_materias")
                    ->where("idAlumno", $alumno->id)
                    ->where("idMateria", $materia->id)
                    ->get();
                    if($existenAlumnosMaterias->isEmpty()){
                        $alumnoMateria->save();
                    }
            }
        }

        return $alumno;
    }

    public function alumnoBybusquedaGradoGrupoTurno(Request $request){
        $alumnos = DB::table('alumnos')
            //->select(['grado', 'grupo'])
            ->where('grado', $request->grado)
            ->where('grupo', $request->grupo)
            ->where('turno', $request->turno)
            ->get();
            //dd(json_encode($alumnos));
        return $alumnos;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);
        return $alumno;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
