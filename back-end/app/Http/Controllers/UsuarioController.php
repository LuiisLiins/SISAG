<?php

namespace App\Http\Controllers;

use App\Http\Services\UsuarioServices;
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
}
