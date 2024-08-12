<?php

namespace App\Http\Requests\PetTipos;

use App\Http\Requests\BaseRequest;

class ListagemPetTiposRequest extends BaseRequest
{
    protected $stopOnFirstFailure = true;

    #[\Override]
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function messages(): array
    {
        return [];
    }
}
