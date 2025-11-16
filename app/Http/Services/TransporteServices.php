<?php

namespace App\Http\Services;

use App\Models\Transporte;
use Illuminate\Database\Eloquent\Collection;

class TransporteServices
{
    /**
     * Retorna todos os usuários
     */
    public function listarTodos(): Collection
    {
        return Transporte::all();
    }

    /**
     * Cria um novo usuário
     */
    public function criarTransporte(array $dados): Transporte
    {
        return Transporte::create($dados);
    }

    /**
     * Busca um usuário por ID
     */
    public function buscarPorId(int $id): Transporte
    {
        return Transporte::findOrFail($id);
    }

    /**
     * Atualiza um usuário
     */
    public function atualizar(int $id, array $dados): Transporte
    {
        $transporte = Transporte::findOrFail($id);
        $transporte->update($dados);
        return $transporte;
    }

    /**
     * Remove um usuário
     */
    public function deletar(int $id): void
    {
        Transporte::destroy($id);
    }
}

