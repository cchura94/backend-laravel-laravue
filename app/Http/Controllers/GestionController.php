<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestiones = Gestion::all();

        return response()->json($gestiones, 200);     
        
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
            "gestion" => "required",
        ]);

        $ges= new Gestion();
        $ges->gestion = $request->gestion;
        $ges->estado = false;
        $ges->detalle = $request->detalle;
        $ges->save();

        return response()->json([
            "mensaje" => "Gestion registrada"
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
        $ges = Gestion::find($id);
        return response()->json($ges, 200); 
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
            "gestion" => "required",
        ]);

        $ges = Gestion::find($id);
        $ges->gestion = $request->gestion;
        $ges->estado = false;
        $ges->detalle = $request->detalle;
        $ges->save();

        return response()->json([
            "mensaje" => "Gestion modificada"
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
        $ges = Gestion::find($id);
        $ges->delete();

        return response()->json([
            "mensaje" => "Gestion eliminada"
        ], 200);
    }

    public function cambiarGestion($id)
    {
        foreach (Gestion::all() as $ges) {
            if($ges->id == $id){
                $ges->estado = true;
            }else{
                $ges->estado = false;
            }
            $ges->save();
        }        
    }
}
