<?php

use App\Http\Controllers\ComunaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicipioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('comunas', ComunaController::class)->except(['show']);

Route::resource('departamentos', DepartamentoController::class)->except(['show']);

Route::resource('municipios', MunicipioController::class)->except(['show']);

Route::resource('paises', PaisController::class);
