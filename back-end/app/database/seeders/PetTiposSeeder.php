<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetTiposSeeder extends Seeder
{
    private array $tiposPet = [
        'Cachorro',
        'Gato',
        'Pássaro',
        'Coelho',
        'Hamster',
        'Cobra',
        'Tartaruga'
    ];

    public function run(): void
    {
        foreach ($this->tiposPet as $tipoPet) {
            DB::table('pettipos')->insert([
                'nome'       => $tipoPet,
                'created_at' => now()
            ]);
        }
    }
}
