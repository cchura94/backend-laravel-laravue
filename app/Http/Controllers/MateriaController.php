<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::get();

        return response()->json($materias, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validacion 
        $request->validate([
            "nombre" => "required",
            "sigla" => "unique:materias",
            "carrera_id" => "required"
        ]);

        $materia = new Materia();
        $materia->nombre = $request->nombre;
        $materia->sigla = $request->sigla;
        $materia->carrera_id = $request->carrera_id;
        $materia->save();   

        return response()->json([
            "mensaje" => "materia registrada correctamente"
        ], 201);     
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia = Materia::find($id);

        return response()->json($materia, 200);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validacion 
        $request->validate([
            "nombre" => "required",
            "sigla" => "unique:materias,sigla,$id",
            "carrera_id" => "required"
        ]);

        $materia = Materia::find($id);
        $materia->nombre = $request->nombre;
        $materia->sigla = $request->sigla;
        $materia->carrera_id = $request->carrera_id;
        $materia->save();   

        return response()->json([
            "mensaje" => "materia modificada correctamente"
        ], 201);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia = Materia::find($id);
        $materia->delete();

        return response()->json([
            "mensaje" => "materia eliminada correctamente"
        ], 201);   
    }
}
