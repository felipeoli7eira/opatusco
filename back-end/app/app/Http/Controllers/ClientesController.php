<?php

namespace App\Http\Controllers;

use App\Http\Requests\Clientes\CadastroClienteRequest;
use App\Services\Cliente\ClienteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ClientesController extends Controller
{
    public function index(Request $request)
    {
        return ClienteService::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(CadastroClienteRequest $request): JsonResponse
    {
        return ClienteService::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(int $clienteId)
    {
        return ClienteService::find($clienteId);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
