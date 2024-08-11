<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Consulta;
use App\Models\Pet;

abstract class ConsultaRepository extends AbstractRepository
{
    protected static string $model = Consulta::class;
}
