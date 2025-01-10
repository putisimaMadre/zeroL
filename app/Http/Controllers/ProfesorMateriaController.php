<?php

namespace App\Http\Controllers;

use App\Models\ProfesorMateria;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorMateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesorMateria = ProfesorMateria::find(1);
        //$materia = Materia::find(1);
        $profesor = Profesor::find(1);

        //return $profesor->materias;
        
        //dd($materia->profesor());
        //return $datosPersonales->profesor;
        return $profesor->datosPersonales;
        //$materias = $profesor->materias;
        //dd($materias);
        //return $profesor->materias();
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
        $profesorMateria = ProfesorMateria::create($request->all());
        return $profesorMateria;
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfesorMateria $profesorMateria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfesorMateria $profesorMateria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfesorMateria $profesorMateria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfesorMateria $profesorMateria)
    {
        //
    }
}
