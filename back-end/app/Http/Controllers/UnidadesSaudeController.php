<?php

namespace App\Http\Controllers;

use App\Http\Services\UnidadesSaudeServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UnidadesSaudeController extends Controller
{
    private UnidadesSaudeServices $unidadesSaudeServices;

    public function __construct(UnidadesSaudeServices $unidadesSaudeServices)
    {
        $this->unidadesSaudeServices = $unidadesSaudeServices;
    }

    public function index()
    {
        return $this->unidadesSaudeServices->listarTodos();
    }

    public function store(Request $request)
    {
        return $this->unidadesSaudeServices->criarunidadesSaude($request->all());
    }

    public function show($id)
    {
        return $this->unidadesSaudeServices->buscarPorId($id);
    }

    public function update(Request $request, $id)
    {
        return $this->unidadesSaudeServices->atualizar($id, $request->all());
    }

    public function destroy($id)
    {
        $this->unidadesSaudeServices->deletar($id);
        return response()->noContent();
    }
}
