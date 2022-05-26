<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PersonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// AUTH SANCTUM
Route::group(["prefix" => "/v1/auth"], function(){
    Route::post("/login", [AuthController::class, "login"]);
    Route::post("/registro", [AuthController::class, "registro"]);

    Route::group(["middleware" => "auth:sanctum"], function(){
        Route::get("/perfil", [AuthController::class, "perfil"]);
        Route::post("/logout", [AuthController::class, "logout"]);
    });
});

//  
Route::group(["middleware" => "auth:sanctum"], function(){

    // asignacion materias
    Route::post("persona/{id}/asignacion-materias", [PersonaController::class, "asignarMaterias"]);
    
    Route::post("gestion/{id}/cambiar-gestion", [GestionController::class, "cambiarGestion"]);
    // recursos api
    Route::apiResource("gestion", GestionController::class);
    Route::apiResource("materia", MateriaController::class);
    Route::apiResource("carrera", CarreraController::class);
    Route::apiResource("persona", PersonaController::class);
});


/*
Route::middleware("auth:sanctum")->group(function(){
    // recursos api
    Route::apiResource("persona", PersonaController::class);
});
*/

Route::get("/no-autorizado", function(){
    return response()->json(["mensaje" => "Debe iniciar sesion"]);
})->name("login");