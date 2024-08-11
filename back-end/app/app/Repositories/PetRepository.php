<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Pet;

abstract class PetRepository extends AbstractRepository
{
    protected static string $model = Pet::class;
}
