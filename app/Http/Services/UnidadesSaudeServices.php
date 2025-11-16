<?php

namespace App\Http\Services;

use App\Models\UnidadesSaude;
use Illuminate\Database\Eloquent\Collection;

class UnidadesSaudeServices
{
    /**
     * Retorna todos os usuários
     */
    public function listarTodos(): Collection
    {
        return UnidadesSaude::all();
    }

    /**
     * Cria um novo usuário
     */
    public function criarUnidadesSaude(array $dados): UnidadesSaude
    {
        return UnidadesSaude::create($dados);
    }

    /**
     * Busca um usuário por ID
     */
    public function buscarPorId(int $id): UnidadesSaude
    {
        return UnidadesSaude::findOrFail($id);
    }

    /**
     * Atualiza um usuário
     */
    public function atualizar(int $id, array $dados): UnidadesSaude
    {
        $unidadesSaude = UnidadesSaude::findOrFail($id);
        $unidadesSaude->update($dados);
        return $unidadesSaude;
    }

    /**
     * Remove um usuário
     */
    public function deletar(int $id): void
    {
        UnidadesSaude::destroy($id);
    }
}

