<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EdificioController;

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

//ACA LAS RUTAS DE LA API
//METODO GET
Route::get('edificio',[EdificioController::class,'index']);
//la variable que se envia tiene que ser la misma que recibe el controller
Route::get('edificio/{id}',[EdificioController::class,'show']); 
