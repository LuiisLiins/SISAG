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
        'usuario:id,nome,telefone,cpf,email',
        'unidadeAgendamento:id,nome,endereco',
        'transporte:id,motorista,placa_veiculo,horario_saida,data_saida,tipo_veiculo,observacoes'
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
            'precisa_transporte' => $encaminhamento->precisa_transporte,
            'horario' => $encaminhamento->horario,
            'medico_agendado' => $encaminhamento->medico_agendado,
            'transporte_id' => $encaminhamento->transporte_id,
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
            'unidade_agendamento' => [
                'id' => $encaminhamento->unidadeAgendamento->id ?? null,
                'nome' => $encaminhamento->unidadeAgendamento->nome ?? null,
                'endereco' => $encaminhamento->unidadeAgendamento->endereco ?? null
            ],
            'transporte' => [
                'id' => $encaminhamento->transporte->id ?? null,
                'motorista' => $encaminhamento->transporte->motorista ?? null,
                'placa_veiculo' => $encaminhamento->transporte->placa_veiculo ?? null,
                'horario_saida' => $encaminhamento->transporte->horario_saida ?? null,
                'data_saida' => $encaminhamento->transporte->data_saida ?? null,
                'tipo_veiculo' => $encaminhamento->transporte->tipo_veiculo ?? null,
                'observacoes' => $encaminhamento->transporte->observacoes ?? null,
            ]
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
            'status'          => 'Pendente',
            'medico'          => $dados['medico'] ?? null,
            'precisa_transporte' => $dados['precisa_transporte'] ?? false,
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
        // Mapeia os campos do frontend para os campos do banco
        $dadosMapeados = [];

        if (isset($dados['dt_agendamento'])) {
            $dadosMapeados['dt_agendamento'] = $dados['dt_agendamento'];
        }

        if (isset($dados['horario_atendimento'])) {
            $dadosMapeados['horario'] = $dados['horario_atendimento'];
        }

        if (isset($dados['medico_atendimento'])) {
            $dadosMapeados['medico_agendado'] = $dados['medico_atendimento'];
        }

        if (isset($dados['endereco_atendimento'])) {
            $dadosMapeados['endereco'] = $dados['endereco_atendimento'];
        }

        if (isset($dados['status'])) {
            $dadosMapeados['status'] = $dados['status'];
        }

        if (isset($dados['unidade_agendamento_id'])) {
            $dadosMapeados['unidade_agendamento_id'] = $dados['unidade_agendamento_id'];
        }

                if (isset($dados['transporte_id'])) {
            $dadosMapeados['transporte_id'] = $dados['transporte_id'];
        }

        // Adiciona outros campos que vêm com o nome correto
        foreach ($dados as $key => $value) {
            if (!isset($dadosMapeados[$key]) && in_array($key, [
                'usuario_id', 'unidade_id', 'dt_solicitacao',
                'nivel_urgencia', 'observacoes', 'especialidade',
                'telefone', 'medico', 'precisa_transporte', 'transporte_id'
            ])) {
                $dadosMapeados[$key] = $value;
            }
        }

        $encaminhamento = Encaminhamento::findOrFail($id);
        $encaminhamento->update($dadosMapeados);

        // Recarrega o modelo do banco e os relacionamentos
        $encaminhamento->refresh();
        $encaminhamento->load(['unidade', 'usuario', 'unidadeAgendamento', 'transporte']);

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
