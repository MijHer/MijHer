<?php

use App\Http\Controllers\Api\PublicacionController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\EmpresaController;
use App\Http\Controllers\Api\PersonaController;
use App\Http\Controllers\Api\RubroController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/v1/auth/login", [AuthController::class, "login"]);
Route::post("/v1/auth/registro", [AuthController::class, "registro"]);

Route::middleware('auth:sanctum')->group( function(){
    Route::get("/v1/auth/perfil", [AuthController::class, "perfil"]);
    Route::post("/v1/auth/logout", [AuthController::class, "salir"]);
    
});

Route::apiResource("v1/categoria", CategoriaController::class);
Route::apiResource("v1/empresa", EmpresaController::class);
Route::apiResource("v1/persona", PersonaController::class);
Route::apiResource("v1/rubro", RubroController::class);
Route::apiResource("v1/publicacion", PublicacionController::class);