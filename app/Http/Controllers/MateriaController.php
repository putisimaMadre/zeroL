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
        
        $materias = DB::table("materias")
            ->where("grado", $request->grado)
            ->where("grupo", $request->grupo)
            ->where("turno", $request->turno)
            ->get();

        $alumnos = DB::table("alumnos")
            ->where("grado", $request->grado)
            ->where("grupo", $request->grupo)
            ->where("turno", $request->turno)
            ->get();
            
        //Para los que ya estan
        foreach($materias as $materia){
            foreach($alumnos as $alumno){
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
        return $materia;
    }

    /** 
     * Se le tiene que enviar una model de Alumno 
     * id
     * grado 
     * grupo 
     * turno
    */
    public function busquedaGradoGrupoTurno(Request $request)
    {
        $materias = DB::table('materias')   // 1, a
            //->select(['grado', 'grupo'])
            ->where('grado', $request->grado)
            ->where('grupo', $request->grupo)
            ->where('turno', $request->turno)
            ->get();

            foreach ($materias as $materia) {
                $alumnoMaterias = new AlumnoMateria();
                $alumnoMaterias->idAlumno = $request->id;
                $alumnoMaterias->idMateria = $materia->id;
                $alumnoMateria = AlumnoMateria::where("idMateria", $materia->id)
                ->where("idAlumno", $request->id)->get();
              echo($alumnoMateria)  ;
            //echo(empty($alumnoMateria));
            /*if($alumnoMateria->count()){
                $alumnoMaterias->save();
                return $materia->id;
                //echo($alumnoMaterias);
            }*/
            //Guarda el id del alumno y la materia en la tabla de alumnoMaterias
            //$alumnoMaterias->save();
        } //======>for
        //return $alumnoMaterias;
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
