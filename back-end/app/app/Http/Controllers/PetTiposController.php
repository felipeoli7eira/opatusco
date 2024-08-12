<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pets\CadastroPetRequest;
use App\Http\Requests\PetTipos\ListagemPetTiposRequest;
use App\Services\Cliente\ClienteService;
use App\Services\Pet\PetService;
use App\Services\Pet\PetTipoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class PetTiposController extends Controller
{
    public function index(ListagemPetTiposRequest $request)
    {
        return PetTipoService::all();
    }

    public function create()
    {
    }

    public function store(CadastroPetRequest $request): JsonResponse
    {
        return PetService::create($request->all());
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
