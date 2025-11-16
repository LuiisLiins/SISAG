<?php

namespace App\Http\Services;

use App\Models\Encaminhamento;
use Illuminate\Database\Eloquent\Collection;

class EncaminhamentoServices
{
    /**
     * Retorna todos os encaminhamentos
     */
    public function listarTodos(): Collection
    {
        return Encaminhamento::with(['paciente', 'unidade'])->get();
    }

    /**
     * Cria um novo encaminhamento
     */
    public function criarEncaminhamento(array $dados): Encaminhamento
    {
        return Encaminhamento::create($dados);
    }

    /**
     * Busca um encaminhamento por ID
     */
    public function buscarPorId(int $id): Encaminhamento
    {
        return Encaminhamento::with(['paciente', 'unidade'])->findOrFail($id);
    }

    /**
     * Atualiza um encaminhamento
     */
    public function atualizar(int $id, array $dados): Encaminhamento
    {
        $encaminhamento = Encaminhamento::findOrFail($id);
        $encaminhamento->update($dados);
        return $encaminhamento;
    }

    /**
     * Remove um encaminhamento
     */
    public function deletar(int $id): void
    {
        Encaminhamento::destroy($id);
    }
}
