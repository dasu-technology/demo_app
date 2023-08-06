<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(DepartamentoController::class)->group(function () {
    Route::get('/departamento','index');
    Route::get('/departamento/{id}','show');
    Route::post('/departamento','store');
    Route::put('departamento/{id}','update');
    Route::delete('departamento/{id}','destroy');
});

Route::controller(EmpleadoController::class)->group(function () {
    Route::get('/empleado','index');
    Route::get('/empleado/{id}','show');
    Route::post('/empleado','store');
    Route::put('empleado/{id}','update');
    Route::delete('empleado/{id}','destroy');
});

