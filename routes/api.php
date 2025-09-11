<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\PuestoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 Route::apiResource('departamento', DepartamentoController::class);
 Route::apiResource('puesto', PuestoController::class);
