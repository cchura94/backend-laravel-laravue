<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aulas = Aula::all();
        return response()->json($aulas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required",
        ]);

        $aula = new Aula();
        $aula->nombre = $request->nombre;
        $aula->ubicacion = $request->ubicacion;
        $aula->capacidad = $request->capacidad;
        $aula->save();

        return response()->json([
            "mensaje" => "Aula registrada"
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
        $aula = Aula::find($id);
        return response()->json($aula, 200);
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
        $request->validate([
            "nombre" => "required",
        ]);

        $aula = Aula::find($id);
        $aula->nombre = $request->nombre;
        $aula->ubicacion = $request->ubicacion;
        $aula->capacidad = $request->capacidad;
        $aula->save();

        return response()->json([
            "mensaje" => "Aula modificada"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aula = Aula::find($id);
        $aula->delete();
        
        return response()->json([
            "mensaje" => "Aula eliminada"
        ], 200);
    }
}
