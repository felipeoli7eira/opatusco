<?php

namespace App\Http\Requests\Consultas;

use App\Http\Requests\BaseRequest;

class AgendamentoConsultaRequest extends BaseRequest
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
            'data'       => ['required', 'date_format:Y-m-d H:i:s'],
            'periodo'    => ['required', 'in:am,pm'],
            'sintomas'   => ['required', 'string', 'max:255', 'min:3'],
            'medico_id'  => ['required', 'exists:users,id'],
            'cliente_id' => ['required', 'exists:clientes,id'],
            'pet_id'     => ['required', 'exists:pets,id']
        ];
    }

    public function messages(): array
    {
        return [
            'data.required'       => 'A data da consulta é obrigatória.',
            'data.date_format'    => 'A data deve estar no formato válido: ano-mês-dia hora:minuto:segundo.',

            'periodo.required'    => 'O período da consulta é obrigatório.',
            'periodo.in'          => 'O período deve ser "am" ou "pm".',

            'sintomas.required'   => 'Os sintomas são obrigatórios.',
            'sintomas.string'     => 'Os sintomas devem ser uma string.',
            'sintomas.min'        => 'Descreva os sintomas com mais informações',
            'sintomas.string'     => 'Os sintomas devem ser informados em um limite de 255 caracteres',

            'medico_id.required'  => 'O médico responsável pela consulta é obrigatório.',
            'medico_id.exists'    => 'O médico selecionado é inválido.',

            'cliente_id.required' => 'O cliente associado à consulta é obrigatório.',
            'cliente_id.exists'   => 'O cliente informado não existe na base. Realize cadastro',

            'pet_id.required'     => 'O pet associado à consulta é obrigatório.',
            'pet_id.exists'       => 'O pet selecionado não tem cadastro na base. Realize cadastro.',
        ];
    }

    protected function passedValidation(): void
    {
        $this->replace([
            'data'       => $this->data,
            'periodo'    => $this->periodo,
            'sintomas'   => $this->sintomas,
            'medico_id'  => intval($this->medico_id),
            'cliente_id' => intval($this->cliente_id),
            'pet_id'     => intval($this->pet_id),
            'status'     => 'solicitada',
        ]);
    }
}
