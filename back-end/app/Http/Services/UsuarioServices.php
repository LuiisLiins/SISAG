<?php

namespace App\Http\Services;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;

class UsuarioServices
{
    /**
     * Retorna todos os usuários
     */
    public function listarTodos(): Collection
    {
        return Usuario::all();
    }

    /**
     * Cria um novo usuário
     */
    public function criarUsuario(array $dados): Usuario
    {
        return Usuario::create($dados);
    }

    /**
     * Busca um usuário por ID
     */
    public function buscarPorId(int $id): Usuario
    {
        return Usuario::findOrFail($id);
    }

    /**
     * Atualiza um usuário
     */
    public function atualizar(int $id, array $dados): Usuario
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($dados);
        return $usuario;
    }

    /**
     * Remove um usuário
     */
    public function deletar(int $id): void
    {
        Usuario::destroy($id);
    }

    /**
     * Autentica um usuário por CPF e senha
     */
    public function autenticar(string $cpf, string $senha): ?Usuario
    {
        // Remove formatação do CPF (deixa só números)
        $cpfLimpo = preg_replace('/\D/', '', $cpf);
        
        // Busca usuário pelo CPF
        $usuario = Usuario::where('cpf', $cpfLimpo)->first();
        
        // Verifica se encontrou o usuário e se a senha está correta
        if ($usuario && $usuario->senha === $senha) {
            return $usuario;
        }
        
        return null;
    }
}

