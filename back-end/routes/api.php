<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\UnidadesSaudeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;


Route::apiResource('usuarios', UsuarioController::class);

Route::apiResource('consultas', ConsultaController::class);

Route::apiResource('unidades-saude', UnidadesSaudeController::class);

Route::apiResource('transporte', TransporteController::class);

