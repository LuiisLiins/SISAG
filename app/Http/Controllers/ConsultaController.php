<?php

namespace App\Http\Controllers;

use App\Http\Services\ConsultaServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConsultaController extends Controller
{
    private ConsultaServices $consultaServices;

    public function __construct(ConsultaServices $consultaServices)
    {
        $this->consultaServices = $consultaServices;
    }

    public function index()
    {
        return $this->consultaServices->listarTodos();
    }

    public function store(Request $request)
    {
        return $this->consultaServices->criarconsulta($request->all());
    }

    public function show($id)
    {
        return $this->consultaServices->buscarPorId($id);
    }

    public function update(Request $request, $id)
    {
        return $this->consultaServices->atualizar($id, $request->all());
    }

    public function destroy($id)
    {
        $this->consultaServices->deletar($id);
        return response()->noContent();
    }
}
