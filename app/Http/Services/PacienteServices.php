<?php

namespace App\Http\Services;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Collection;

class PacienteServices
{
    /**
     * Retorna todos os pacientes
     */
    public function listarTodos(): Collection
    {
        return Paciente::all();
    }

    /**
     * Cria um novo paciente
     */
    public function criarPaciente(array $dados): Paciente
    {
        return Paciente::create($dados);
    }

    /**
     * Busca um paciente por ID
     */
    public function buscarPorId(int $id): Paciente
    {
        return Paciente::findOrFail($id);
    }

    /**
     * Atualiza um paciente
     */
    public function atualizar(int $id, array $dados): Paciente
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->update($dados);
        return $paciente;
    }

    /**
     * Remove um paciente
     */
    public function deletar(int $id): void
    {
        Paciente::destroy($id);
    }
}
