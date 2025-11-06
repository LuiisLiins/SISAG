<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\EncaminhamentoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\UnidadesSaudeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;


Route::apiResource('usuarios', UsuarioController::class);

Route::apiResource('consultas', ConsultaController::class);

Route::apiResource('unidades-saude', UnidadesSaudeController::class);

Route::apiResource('transporte', TransporteController::class);

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('listar_usuarios');
    Route::post('/criar', [UsuarioController::class, 'store'])->name('criar_usuario');
    Route::get('/buscar/{id}', [UsuarioController::class, 'show'])->name('mostrar_usuario');
    Route::put('/editar/{id}', [UsuarioController::class, 'update'])->name('atualizar_usuario');
    Route::delete('/deletar/{id}', [UsuarioController::class, 'destroy'])->name('deletar_usuario');
});

Route::prefix('unidades-saude')->group(function () {
    Route::get('/', [UnidadesSaudeController::class, 'index'])->name('listar_unidades_saude');
    Route::post('/criar', [UnidadesSaudeController::class, 'store'])->name('criar_unidade_saude');
    Route::get('/buscar/{id}', [UnidadesSaudeController::class, 'show'])->name('mostrar_unidade_saude');
    Route::put('/editar/{id}', [UnidadesSaudeController::class, 'update'])->name('atualizar_unidade_saude');
    Route::delete('/deletar/{id}', [UnidadesSaudeController::class, 'destroy'])->name('deletar_unidade_saude');
});


Route::prefix('consultas')->group(function () {
    Route::get('/', [ConsultaController::class, 'index']);
    Route::post('/criar', [ConsultaController::class, 'store']);
    Route::get('/buscar/{id}', [ConsultaController::class, 'show']);
    Route::put('/editar/{id}', [ConsultaController::class, 'update']);
    Route::delete('/deletar/{id}', [ConsultaController::class, 'destroy']);
});


Route::prefix('encaminhamentos')->group(function () {
    Route::get('/', [EncaminhamentoController::class, 'index'])->name('listar_encaminhamentos');
    Route::post('/criar', [EncaminhamentoController::class, 'store'])->name('criar_encaminhamento');
    Route::get('/buscar/{id}', [EncaminhamentoController::class, 'show'])->name('mostrar_encaminhamento');
    Route::put('/editar/{id}', [EncaminhamentoController::class, 'update'])->name('atualizar_encaminhamento');
    Route::delete('/deletar/{id}', [EncaminhamentoController::class, 'destroy'])->name('deletar_encaminhamento');
});

Route::prefix('pacientes')->group(function () {
    Route::get('/', [PacienteController::class, 'index']) ->name('listar_pacientes');
    Route::post('/criar', [PacienteController::class, 'store'])->name('criar_paciente');
    Route::get('/buscar/{id}', [PacienteController::class, 'show'])->name('mostrar_paciente');
    Route::put('/editar/{id}', [PacienteController::class, 'update'])->name('atualizar_paciente');
    Route::delete('/deletar/{id}', [PacienteController::class, 'destroy'])->name('deletar_paciente');
});


