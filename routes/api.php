<?php

use App\Http\Controllers\clientesController;
use App\Http\Controllers\loginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/lista_clientes',[clientesController::class,'listar_clientes'])->middleware('auth:api');
Route::post('/guarda_clientes',[clientesController::class,'guardar_clientes']);//->middleware('auth:sanctum');
Route::delete('/guarda_clientes',[clientesController::class,'borra_clientes']);//->middleware('auth:sanctum');
//Mensaje para verificar diferente versions
//Mensaje para verificar que nuestra app ya esta funcionando.

Route::post('/login',[loginController::class,'login']);
Route::post('/logout',[loginController::class,'salir'])->middleware('auth:api');;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
