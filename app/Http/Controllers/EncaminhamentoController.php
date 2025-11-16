<?php

namespace App\Http\Controllers;

use App\Http\Services\EncaminhamentoServices;
use Illuminate\Http\Request;

class EncaminhamentoController extends Controller
{
    private EncaminhamentoServices $encaminhamentoServices;

    public function __construct(EncaminhamentoServices $encaminhamentoServices)
    {
        $this->encaminhamentoServices = $encaminhamentoServices;
    }

    public function index()
    {
        return $this->encaminhamentoServices->listarTodos();
    }

    public function store(Request $request)
    {
        return $this->encaminhamentoServices->criarEncaminhamento($request->all());
    }

    public function show($id)
    {
        return $this->encaminhamentoServices->buscarPorId($id);
    }

    public function update(Request $request, $id)
    {
        return $this->encaminhamentoServices->atualizar($id, $request->all());
    }

    public function destroy($id)
    {
        $this->encaminhamentoServices->deletar($id);
        return response()->noContent();
    }
}
