<?php

namespace App\Http\Services;

use App\Models\Encaminhamento;
use App\Models\Usuario;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class EncaminhamentoServices
{
    /**
     * Retorna todos os encaminhamentos
     */
    // public function listarTodos(): Collection
    // {
    //     return Encaminhamento::with(['unidade'])->get();
    // }

    public function listarTodos()
{
    return Encaminhamento::with([
        'unidade:id,nome,endereco',
        'usuario:id,nome,telefone,cpf,email'
    ])
    ->get()
    ->map(function ($encaminhamento) {
        return [
            'id' => $encaminhamento->id,
            'especialidade' => $encaminhamento->especialidade,
            'medico' => $encaminhamento->medico,
            'data_solicitacao' => $encaminhamento->dt_solicitacao,
            'telefone' => $encaminhamento->telefone,
            'data_agendamento' => $encaminhamento->dt_agendamento,
            'nivel_urgencia' => $encaminhamento->nivel_urgencia,
            'status' => $encaminhamento->status,
            'observacoes' => $encaminhamento->observacoes,
            'unidade' => [
                'id' => $encaminhamento->unidade->id ?? null,
                'nome' => $encaminhamento->unidade->nome ?? null,
                'endereco' => $encaminhamento->unidade->endereco ?? null
            ],
            'usuario' => [
                'id' => $encaminhamento->usuario->id ?? null,
                'nome' => $encaminhamento->usuario->nome ?? null,
                'cpf' => $encaminhamento->usuario->cpf ?? null,
                'telefone' => $encaminhamento->usuario->telefone ?? null,
                'email' => $encaminhamento->usuario->email ?? null,
            ],
        ];
    });
}


    /**
     * Cria um novo encaminhamento
     */
    public function criarEncaminhamento(array $dados): Encaminhamento
    {
        $usuario = Usuario::findornew($dados['usuario_id']);

        if (!$usuario) {
            throw new Exception("Usuário não encontrado.");
        }
        $erros = [];

        if (isset($dados['nome_paciente']) && trim($dados['nome_paciente']) !== trim($usuario->nome)) {
            $erros[] = "O nome do paciente não confere.";
        }

        if (isset($dados['nome_mae']) && trim($dados['nome_mae']) !== trim($usuario->nome_mae)) {
            $erros[] = "O nome da mãe não confere.";
        }

        if (isset($dados['data_nascimento']) && $dados['data_nascimento'] !== $usuario->data_nascimento->format('Y-m-d')) {
            $erros[] = "A data de nascimento não confere.";
        }


        // if (isset($dados['telefone']) && trim($dados['telefone']) !== trim($usuario->telefone)) {
        //     $erros[] = "O telefone não confere.";
        // }

        if (!empty($erros)) {
            throw new Exception(implode(" ", $erros));
        }
        $dadosEncaminhamento = [
            'usuario_id'      => $dados['usuario_id'],
            'unidade_id'      => $dados['unidade_id'],
            'especialidade' => $dados['especialidade'],
            'telefone' => $dados['telefone'],
            'dt_solicitacao'  => $dados['dt_solicitacao'] ?? now()->toDateString(),
            'dt_agendamento'  => $dados['dt_agendamento'] ?? null,
            'nivel_urgencia'  => $dados['nivel_urgencia'],
            'observacoes'     => $dados['observacoes'] ?? null,
            'status'          => 'Pendente'
        ];

        return Encaminhamento::create($dadosEncaminhamento);
    }


    /**
     * Busca um encaminhamento por ID
     */
    public function buscarPorId(int $id): Encaminhamento
    {
        return Encaminhamento::with(['unidade', 'usuario', 'especialidade'])->findOrFail($id);
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
