<?php

namespace App\Services\Usuario;

use App\Http\Utils\ResponseFormatHandler;
use App\Http\Utils\ResponseHandle;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\ClienteRepository;
use App\Repositories\UsuarioRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

abstract class UsuarioService
{
    public static function all(): JsonResponse
    {
        try {
            $response = UsuarioRepository::all();
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro na operação', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendResponse(message: 'Listagem', responseData: $response->all());
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
            $created = UsuarioRepository::create($data);
        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro na operação', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendResponse(message: 'Sucesso', responseData: $created->toArray(), httpCode: 201);
    }

    public static function auth(array $data): JsonResponse
    {
        try {
            $model = UsuarioRepository::loadModel()->where('email', $data['email'])->first();

            $senhaValida = Hash::check($data['senha'], $model->senha);

            if (!$senhaValida) {
                throw new Exception('Credenciais incorretas', Response::HTTP_BAD_REQUEST);
            }

            $model->tokens()->delete();

            $token = $model->createToken($model->email)->plainTextToken;

        } catch (Throwable $throwable) {
            return ResponseHandle::sendError('Erro na operação', ['thMessage' => $throwable->getMessage()]);
        }

        return ResponseHandle::sendResponse(
            message: 'Sucesso',
            responseData: [
                'token' => $token,
                ...$model->toArray()
            ]
        );
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
