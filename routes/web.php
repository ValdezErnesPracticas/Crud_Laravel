<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\PuestoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('departamento', DepartamentoController::class);
Route::resource('puesto', PuestoController::class);
