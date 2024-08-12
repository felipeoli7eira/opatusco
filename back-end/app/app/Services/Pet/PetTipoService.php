<?php

namespace App\Services\Pet;

use App\Http\Utils\ResponseFormatHandler;
use App\Http\Utils\ResponseHandle;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ClienteRepository;
use App\Repositories\PetRepository;
use App\Repositories\PetTipoRepository;
use Illuminate\Database\Eloquent\Model;
use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class PetTipoService
{
    public static function all(): JsonResponse
    {
        try {
            $response = PetTipoRepository::all()->toArray();
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendResponse(responseData: $response);
    }

    public static function find(int $clienteId): JsonResponse
    {
        try {
            $response = ClienteRepository::find($clienteId);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro na operação', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendResponse(message: 'Listagem de clientes', responseData: $response);
    }

    public static function create(array $data): JsonResponse
    {
        try {
            $create = PetRepository::create($data);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro na operação', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendResponse(message: 'Sucesso', responseData: $create->toArray(), httpCode: 201);
    }

    // public function update(array $data, string $userUuid): JsonResponse
    // {
    // }

    // public function delete(string $userUuid): JsonResponse
    // {
    // }

    // public function readOne(string $uuid): JsonResponse
    // {
    // }

    // public function login(array $credentials): JsonResponse
    // {
    // }

    // public function logout(): JsonResponse
    // {
    // }
}
