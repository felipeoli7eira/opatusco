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
            $response = ConsultaRepository::loadModel()->with(['cliente', 'pet', 'medico'])->get();
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro na operação', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendResponse(message: 'Sucesso', responseData: $response->toArray());
    }

    public static function find(int $consultaId): JsonResponse
    {
        try {
            $response = ConsultaRepository::loadModel()
                ->with(['cliente', 'pet', 'medico'])
                ->where('id', $consultaId)
                ->get()
                ->first();
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendResponse(message: 'Sucesso', responseData: $response);
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

    public static function update(array $data, int $resourceId): JsonResponse
    {
        try {
            $consulta = ConsultaRepository::loadModel()->findOrFail($resourceId);
            $consulta->update($data);
            $updatedConsulta = $consulta->fresh();
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendResponse(message: 'Sucesso', responseData: $updatedConsulta, httpCode: 201);
    }

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
