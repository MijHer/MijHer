<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicacion = Publicacion::all();
        return response()->json($publicacion, 200);
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

            "titulo" => "required|unique:publicacions",
            "tipo" => "required",
            "nivel" => "required",
            "descripcion" => "required",
            "requerimientos" => "required",
            "salario" => "required",
            "ubicacion" => "required",
            "estado" => "required"
            
        ]);

        $publicacion = new Publicacion;
        $publicacion->titulo = $request->titulo;
        $publicacion->tipo = $request->tipo;
        $publicacion->nivel = $request->nivel;
        $publicacion->descripcion = $request->descripcion;
        $publicacion->requerimientos = $request->requerimientos;
        $publicacion->salario = $request->salario;
        $publicacion->ubicacion = $request->ubicacion;
        $publicacion->estado = $request->estado;
        $publicacion->empresa_id = $request->empresa_id;
        $publicacion->categoria_id = $request->categoria_id;
        $publicacion->persona_id = $request->persona_id;
        $publicacion->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Publicacion registrada",
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
        $publicacion = Publicacion::FindOrFail($id);
        return response()->json([
            "status" => 1,
            "data" => $publicacion,
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
        $publicacion = Publicacion::FindOrFail($id);
        $publicacion->titulo = $request->titulo;
        $publicacion->tipo = $request->tipo;
        $publicacion->nivel = $request->nivel;
        $publicacion->descripcion = $request->descripcion;
        $publicacion->requerimientos = $request->requerimientos;
        $publicacion->salario = $request->salario;
        $publicacion->ubicacion = $request->ubicacion;
        $publicacion->estado = $request->estado;
        $publicacion->empresa_id = $request->empresa_id;
        $publicacion->categoria_id = $request->categoria_id;
        $publicacion->persona_id = $request->persona_id;
        $publicacion->save();
        return response()->json([
            "status" => 1,
            "mensaje" => "Publicacion Atualizada",
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
        $publicacion = Publicacion::FindOrFail($id);
        $publicacion->delete();
      
        return response()->json([
            "status" => 1,
            "mensaje" => "Publicacion Eliminda",
            "error" => false
        ], 200);
    }
}
