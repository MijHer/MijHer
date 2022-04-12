<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rubro;
use Illuminate\Http\Request;

class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubro = Rubro::all();
        return response()->json($rubro, 200);
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
            "nombre" => "required|unique:rubros",
            "estado" => "required"
        ]);

        $rubro = new Rubro;

        $rubro->nombre = $request->nombre;
        $rubro->detalle = $request->detalle;
        $rubro->estado = $request->estado;
        $rubro->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Rubreo creado",
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
        $rubro = Rubro::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $rubro,
            "error" => false,
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
        $rubro = Rubro::FindOrFail($id);

        $rubro->nombre = $request->nombre;
        $rubro->detalle = $request->detalle;
        $rubro->estado = $request->estado;
        $rubro->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Rubreo editado",
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
        $rubro = Rubro::FindOrFail($id);
        $rubro->delete();
        return response()->json([
            "status" => 1,
            "mensaje" => "Rubro eliminado",
            "error" => false
        ], 200);
    }
}
