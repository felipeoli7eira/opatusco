<?php

namespace App\Services\Consulta;

use App\Http\Utils\ResponseFormatHandler;
use App\Http\Utils\ResponseHandle;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ClienteRepository;
use App\Repositories\ConsultaRepository;
use App\Repositories\PetRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class ConsultaService
{
    public static function all(): JsonResponse
    {
        try {
            $response = ClienteRepository::all();
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro na operação', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendResponse(message: 'Listagem de clientes', responseData: $response->all());
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

            $consulta = ConsultaRepository::loadModel();

            $consulta = $consulta->where('cliente_id', $data['cliente_id'])
                ->whereYear('data', date('Y', strtotime($data['data'])))
                ->whereMonth('data', date('m', strtotime($data['data'])))
                ->whereDay('data', date('d', strtotime($data['data'])))
                ->where('periodo', $data['periodo'])
                ->where('status', 'solicitada');

            if ($consulta->exists()) {
                throw new Exception('Consulta no mesmo período já agendada', 400);
            }

            $create = ConsultaRepository::create($data);
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
