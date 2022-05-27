<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Persona::all();
        // Persona::get();
        // /api/persona?page=1&limit=15&orderby=nombres&q=pablo
        $limite = $request->limit;
        $personas = Persona::orWhere('nombres', 'like', '%'.$request->q.'%')
                ->orWhere('apellidos', 'like', '%'.$request->q.'%')
                ->orWhere('ci_nit', 'like', '%'.$request->q.'%')
                ->orderBy($request->orderby, 'desc')
                ->paginate($limite?$limite:10);
        // DB::select("SELECT * from personas where nombre like % $request->q % orde limit 10");
        
        return response()->json($personas, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validar
        $request->validate([
            "nombres" =>  "required|max:50",
            "apellidos" => "required|max:50",
            "ci_nit" => "unique:personas|max:15"
        ]);       

        // guardar
        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->ci_nit = $request->ci_nit;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->save();

        // responder
        return response()->json([
            "mensaje" => "registro correcto",
            "error" => null,
            "status" => true
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
        $persona = Persona::find($id)
                            ->materias;

        return response()->json($persona, 200);
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
            "nombres" =>  "required|max:50",
            "apellidos" => "required|max:50",
            "ci_nit" => "unique:personas,ci_nit,$id|max:15"
        ]);

        // DB::transaction()
        // modificar
        $persona = Persona::FindOrFail($id);
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->ci_nit = $request->ci_nit;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->save();

        // responder
        return response()->json([
            "mensaje" => "Modificación correcta",
            "error" => null,
            "status" => true
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
        $persona = Persona::FindOrFail($id);
        $persona->delete();

        // responder
        return response()->json([
            "mensaje" => "Eliminación correcta",
            "error" => null,
            "status" => true
        ], 200);
    }

    public function asignarMaterias(Request $request, $id)
    {
        /*
            [1, 6, 3, 8]
        */
        $materias = $request->materias;
        $gestion = $request->gestion;
        $rol = $request->rol;

        $ass=[];
        for ($i=0; $i<count($materias); $i++) {
            $ass[$materias[$i]] = ["gestion_id" => $gestion, "rol" => $rol];
        }

        // return $ass;
        $persona = Persona::find($id);
        $persona->materias()->attach($ass);

        return response()->json([
            "mensaje" => "Asignacion correcta",
            "error" => null,
            "status" => true
        ], 200);
    }
}
