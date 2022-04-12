<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona = Persona::all();
        return response()->json($persona, 200);
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
            "nombres" => "required|unique:personas",
            "apellidos" => "required|unique:personas",
            "ci_nit" => "required",
            "tel_cel" => "required",
            "direccion" => "required"
        ]);

        $persona = new Persona;
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->ci_nit = $request->ci_nit;
        $persona->tel_cel = $request->tel_cel;
        $persona->direccion = $request->direccion;
        $persona->save();

        return response()->json([
            "status" => 1,
            "mensjae" => "Persona Registrada",
            "error" => false
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
        $persona = Persona::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $persona,
            "error" => false
        ]);
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
        $persona = Persona::FindOrFail($id);
        
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->ci_nit = $request->ci_nit;
        $persona->tel_cel = $request->tel_cel;
        $persona->direccion = $request->direccion;
        $persona->save();

        return response()->json([
            "status" => 1,
            "mensjae" => "Persona Actualizada",
            "error" => false
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
        return response()->json([
            "status" => 1,
            "mensaje" => "Persona eliminada",
            "error" => false
        ], 200);
    }
}
