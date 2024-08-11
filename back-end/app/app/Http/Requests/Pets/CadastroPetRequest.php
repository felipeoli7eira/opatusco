<?php

namespace App\Http\Requests\Pets;

use App\Http\Requests\BaseRequest;

class CadastroPetRequest extends BaseRequest
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
            'nome'        => ['required', 'string', 'max:255'],
            'idade_mes'   => ['required', 'integer', 'min:1', 'max:12'],
            'idade_ano'   => ['required', 'integer', 'min:1'],
            'pettipo_id'  => ['required', 'exists:pettipos,id'],
            'cliente_id'  => ['required', 'exists:clientes,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'        => 'O nome do pet é obrigatório.',
            'nome.string'          => 'O nome do pet deve ser um texto.',
            'nome.max'             => 'O nome do pet deve ter no máximo 255 caracteres.',

            'idade_mes.required'       => 'O mês de idade do pet é obrigatória.',
            'idade_mes.integer'        => 'O mês de idade do pet deve ser um número inteiro.',
            'idade_mes.min'            => 'O mês de idade do pet deve ser um valor positivo entre 1 e 12.',

            'idade_ano.required'       => 'O ano de idade do pet é obrigatória.',
            'idade_ano.integer'        => 'O ano de idade do pet deve ser um número inteiro.',
            'idade_ano.min'            => 'O ano de idade do pet deve ser um valor positivo maior ou igual a 1.',

            'pettipo_id.required'  => 'O tipo do pet é obrigatório.',
            'pettipo_id.exists'    => 'O tipo de pet selecionado é inválido.',

            'cliente_id.required'  => 'O cliente associado ao pet é obrigatório.',
            'cliente_id.exists'    => 'O cliente selecionado é inválido.',
        ];
    }

    protected function passedValidation(): void
    {
        $this->replace([
            'nome'       => $this->nome,
            'idade_mes'  => intval($this->idade_mes),
            'idade_ano'  => intval($this->idade_ano),
            'pettipo_id' => intval($this->pettipo_id),
            'cliente_id' => intval($this->cliente_id)
        ]);
    }
}
