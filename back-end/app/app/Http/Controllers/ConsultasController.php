<?php

namespace App\Http\Controllers;

use App\Http\Requests\Consultas\AgendamentoConsultaRequest;
use App\Services\Cliente\ClienteService;
use App\Services\Consulta\ConsultaService;
use App\Services\Pet\PetService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ConsultasController extends Controller
{
    public function index(Request $request)
    {
        return ClienteService::all();
    }

    public function create()
    {
    }

    public function store(AgendamentoConsultaRequest $request): JsonResponse
    {
        return ConsultaService::create($request->all());
    }

    public function show(int $clienteId)
    {
        return ClienteService::find($clienteId);
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
