<?php

namespace App\Http\Services;

use App\Models\Consulta;
use Illuminate\Database\Eloquent\Collection;

class ConsultaServices
{
    /**
     * Retorna todos os usuários
     */
    public function listarTodos(): Collection
    {
        return Consulta::all();
    }

    /**
     * Cria um novo usuário
     */
    public function criarConsulta(array $dados): Consulta
    {
        return Consulta::create($dados);
    }

    /**
     * Busca um usuário por ID
     */
    public function buscarPorId(int $id): Consulta
    {
        return Consulta::findOrFail($id);
    }

    /**
     * Atualiza um usuário
     */
    public function atualizar(int $id, array $dados): Consulta
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->update($dados);
        return $consulta;
    }

    /**
     * Remove um usuário
     */
    public function deletar(int $id): void
    {
        Consulta::destroy($id);
    }
}

