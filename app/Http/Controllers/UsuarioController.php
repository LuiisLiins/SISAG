<?php

namespace App\Http\Controllers;

use App\Http\Services\UsuarioServices;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsuarioController extends Controller
{
    private UsuarioServices $usuarioServices;

    public function __construct(UsuarioServices $usuarioServices)
    {
        $this->usuarioServices = $usuarioServices;
    }

    public function index()
    {
        return $this->usuarioServices->listarTodos();
    }

    public function store(Request $request)
    {
        return $this->usuarioServices->criarUsuario($request->all());
    }

    public function show($id)
    {
        return $this->usuarioServices->buscarPorId($id);
    }

    public function update(Request $request, $id)
    {
        return $this->usuarioServices->atualizar($id, $request->all());
    }

    public function destroy($id)
    {
        $this->usuarioServices->deletar($id);
        return response()->noContent();
    }

    public function login(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string',
            'senha' => 'required|string',
        ]);

        $usuario = $this->usuarioServices->autenticar(
            $request->input('cpf'),
            $request->input('senha')
        );

        if ($usuario) {
            // Carrega o relacionamento com a unidade de saúde
            $usuario->load('unidadeSaude');

            return response()->json([
                'success' => true,
                'message' => 'Login realizado com sucesso',
                'usuario' => $usuario
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'CPF ou senha incorretos'
        ], 401);
    }

    public function getUnidadeSaude($id)
    {
        $usuario = $this->usuarioServices->buscarPorId($id);

        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'Usuário não encontrado'
            ], 404);
        }

        $unidadeSaude = $usuario->unidadeSaude;

        if ($unidadeSaude) {

            $usuario_unidade_saude = Usuario::where('unidade_saude_id', $unidadeSaude->id)->get();
            return response()->json([
                'success' => true,
                'usuarios' => $usuario_unidade_saude
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Usuário não está associado a nenhuma unidade de saúde'
            ], 404);
        }
    }
}
