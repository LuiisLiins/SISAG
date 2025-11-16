<?php

namespace App\Http\Controllers;

use App\Http\Services\TransporteServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransporteController extends Controller
{
    private TransporteServices $transporteServices;

    public function __construct(TransporteServices $transporteServices)
    {
        $this->transporteServices = $transporteServices;
    }

    public function index()
    {
        return $this->transporteServices->listarTodos();
    }

    public function store(Request $request)
    {
        return $this->transporteServices->criartransporte($request->all());
    }

    public function show($id)
    {
        return $this->transporteServices->buscarPorId($id);
    }

    public function update(Request $request, $id)
    {
        return $this->transporteServices->atualizar($id, $request->all());
    }

    public function destroy($id)
    {
        $this->transporteServices->deletar($id);
        return response()->noContent();
    }
}
