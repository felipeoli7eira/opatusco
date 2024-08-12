<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\PetTipo;

abstract class PetTipoRepository extends AbstractRepository
{
    protected static string $model = PetTipo::class;
}
