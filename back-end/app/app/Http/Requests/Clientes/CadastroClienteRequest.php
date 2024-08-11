<?php

namespace App\Http\Requests\Clientes;

use App\Http\Requests\BaseRequest;

class CadastroClienteRequest extends BaseRequest
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
            'nome'  => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required', 'string', 'email', 'unique:clientes,email'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'  => 'O nome é obrigatório.',
            'nome.string'    => 'O nome deve ser um texto.',
            'nome.min'       => 'O nome deve ter no mínimo 3 caracteres.',
            'nome.max'       => 'O nome deve ter no máximo 50 caracteres.',

            'email.required' => 'O email é obrigatório.',
            'email.string'   => 'O email deve ser um texto.',
            'email.email'    => 'O email deve ser um endereço de email válido.',
            'email.unique'   => 'Este email já está cadastrado.',
        ];
    }
}
