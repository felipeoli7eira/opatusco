<?php

namespace App\Http\Requests\Usuarios;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class CadastroUsuarioRequest extends BaseRequest
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
            'nome'           => ['required', 'string', 'max:255', 'min:3'],
            'email'          => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'senha'          => ['required' /*, 'confirmed', Password::defaults() */ ],
            'medico'         => ['required_without:recepcionista', 'boolean'],
            'recepcionista'  => ['required_without:medico', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'          => 'O nome do usuário é obrigatório.',
            'nome.string'            => 'O nome do usuário deve ser um texto.',
            'nome.min'               => 'O nome do usuário deve ter no mínimo 3 caracteres.',
            'nome.max'               => 'O nome do usuário deve ter no máximo 255 caracteres.',

            'email.required'         => 'O email é obrigatório.',
            'email.string'           => 'O email deve ser um texto válido.',
            'email.email'            => 'O email deve ser um endereço de email válido.',
            'email.max'              => 'O email deve ter no máximo 255 caracteres.',
            'email.unique'           => 'Esse email já está em uso.',

            'senha.required'      => 'A senha é obrigatória.',
            'senha.confirmed'     => 'A confirmação da senha não coincide.',
            'senha.min'           => 'A senha deve ter no mínimo 8 caracteres.',
            // 'password'               => 'A senha deve conter ao menos uma letra maiúscula, uma letra minúscula, um número e um caractere especial.',

            'medico.required_without'=> 'É necessário marcar o usuário como médico ou recepcionista.',
            'medico.boolean'         => 'O valor do campo médico deve ser verdadeiro ou falso.',

            'recepcionista.required_without'=> 'É necessário marcar o usuário como recepcionista ou médico.',
            'recepcionista.boolean'         => 'O valor do campo recepcionista deve ser verdadeiro ou falso.',
        ];
    }

    protected function passedValidation(): void
    {
        $this->replace([
            'nome'          => $this->nome,
            'email'         => $this->email,
            'password'      => Hash::make($this->password),
            'medico'        => boolval($this->medico),
            'recepcionista' => boolval($this->recepcionista),
        ]);
    }
}
