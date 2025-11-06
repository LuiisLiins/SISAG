<?php

namespace App\Http\Controllers;

use App\Http\Services\PacienteServices;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    private PacienteServices $pacienteServices;

    public function __construct(PacienteServices $pacienteServices)
    {
        $this->pacienteServices = $pacienteServices;
    }

    public function index()
    {
        return $this->pacienteServices->listarTodos();
    }

    public function store(Request $request)
    {
        return $this->pacienteServices->criarPaciente($request->all());
    }

    public function show($id)
    {
        return $this->pacienteServices->buscarPorId($id);
    }

    public function update(Request $request, $id)
    {
        return $this->pacienteServices->atualizar($id, $request->all());
    }

    public function destroy($id)
    {
        $this->pacienteServices->deletar($id);
        return response()->noContent();
    }
}
