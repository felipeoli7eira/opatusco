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
        return ConsultaService::all();
    }

    public function create()
    {
    }

    public function store(AgendamentoConsultaRequest $request): JsonResponse
    {
        return ConsultaService::create($request->all());
    }

    public function show(int $consultaId)
    {
        return ConsultaService::find($consultaId);
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, int $resourceId)
    {
        return ConsultaService::update($request->all(), $resourceId);
    }

    public function destroy(string $id)
    {
    }
}
