<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class AuthRequestValidate extends BaseRequest
{
    protected $stopOnFirstFailure = true;

    #[\Override]
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'exists:users,email'],
            'senha' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.string'   => 'O campo E-mail está fora do padrões estabelecidos',
            'email.email'    => 'O campo E-mail deve ser um e-mail válido.',
            'email.exists'   => 'E-mail não encontrado',

            'senha.required' => 'O campo Senha é obrigatório.',
            'senha.string'   => 'O campo Senha deve ser um texto.',
            'senha.min'      => 'A senha está fora dos padrões estabelecidos',
            'senha.max'      => 'A senha está fora dos padrões estabelecidos'
        ];
    }
}
