<?php

use App\Http\Controllers\DepartamentoController;
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
    Route::get('/departamento/{id}', 'show');
    Route::get('/departamentos', 'index');
    Route::post('/departamento', 'store');
});
