<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("listar_carrera");
        // $data = ["status" =>  200, "data" =>  Carrera::all()];
        return response()->json(Carrera::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize("crear_carrera");

        // validar
        $request->validate([
            "nombre" => "required"
        ]);
        // guardar
        /*
        $carrera = new Carrera();
        $carrera->nombre = $request->nombre;
        $carrera->detalle = $request->detalle;
        $carrera->save();
        */
        Carrera::create([
            "nombre" =>$request->nombre,
            "detalle" =>$request->detalle
        ]);

        // Carrera::create($request->all());
        return response()->json([
            "mensaje" => "Carrera registrado correctamente"
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
        $this->authorize("mostrar_carrera");

        $carrera = Carrera::findOrFail($id);
        $carrera->materias;
        return response()->json($carrera, 200);
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
        // validar
        $request->validate([
            "nombre" => "required"
        ]);
        // modificar
        
        $carrera = Carrera::findOrFail($id);
        $carrera->nombre = $request->nombre;
        $carrera->detalle = $request->detalle;
        $carrera->save();
        
        return response()->json([
            "mensaje" => "Carrera modificado correctamente"
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
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();

        return response()->json([
            "mensaje" => "Carrera eliminada correctamente"
        ], 200);
    }
}
