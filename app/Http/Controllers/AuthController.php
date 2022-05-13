<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // login
    public function login(Request $request)
    {
        // validar
        $request->validate([
            "email" => "required|email|string",
            "password" => "required|string"
        ]);
        // verificar las credenciales
        $credentials = request(["email", "password"]);
        if(!Auth::attempt($credentials)){
            return response()->json([
                "mensaje" => "No Autorizado",
                "error" => true
            ], 401);
        }
        // generar token
        $user = $request->user();
        $tokenResult = $user->createToken("mi_token_login");
        $token = $tokenResult->plainTextToken;
        // reponder token
        return response()->json([
            "access_token" => $token,
            "token_type" => "Bearer",
            "usuario" => $user
        ], 200);
    }

    // registro
    public function registro(Request $request)
    {
        // validar
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|string|unique:users",
            "password" => "required|string",
            "c_password" => "required|same:password"
        ]);
        // guardar
        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
        // opcional generar token
        $tokenResult = $usuario->createToken("mi_token");
        $token = $tokenResult->plainTextToken;

        // responder        
        return response()->json([
            "mensaje" => "Registro correcto",
            "acces_token" => $token
        ], 201);
    }

    // perfil
    public function perfil(Request $request)
    {
        // return $request->user();
        // return Auth::user();
        $user = auth()->user();
        return response()->json($user, 200);        
    }

    // logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            "mensaje" => "Logout"
        ]);
    }
}
