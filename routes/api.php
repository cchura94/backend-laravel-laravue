<?php

use App\Http\Controllers\AuthController;
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
    
    // recursos api
    Route::apiResource("persona", PersonaController::class);
});


/*
Route::middleware("auth:sanctum")->group(function(){
    // recursos api
    Route::apiResource("persona", PersonaController::class);
});
*/