<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", "=", $request->email)->first();
        if(isset($user->id)){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    "status" => 1,
                    "mensaje" => "Usuario logueado",
                    "user" => $user,
                    "error" => false,
                    "access_token" => $token
                ], 200);
            }else{
                return response()->json([
                    "status" => 0,
                    "mensaje" => "La contraseña es incorrecta",
                    "error" => true
                ], 404);
            }
        }else{
            return response()->json([
                "status" => 0,
                "mensaje" => "Credenciales incorrectas",
                "error" => true
            ], 404);
        }
    }

    public function registro(Request $request)
    {
        // validar
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);

        // guardar
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->persona_id = $request->persona_id;
        $user->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Usuario registrado",
            "error" => false
        ], 200);

    }

    public function perfil()
    {

    }

    public function logout()
    {

    }
}
