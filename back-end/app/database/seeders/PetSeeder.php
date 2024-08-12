<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pets')->insert([
            'nome'       => 'Caramelo',
            'idade_mes'  => 4,
            'idade_ano'  => 1,
            'pettipo_id' => 1, // Cachorro
            'cliente_id' => 1, // Felipe Oliveira
            'created_at' => now()
        ]);

        DB::table('pets')->insert([
            'nome'       => 'Tortuguita',
            'idade_mes'  => 2,
            'idade_ano'  => 3,
            'pettipo_id' => 6, // Tartaruga
            'cliente_id' => 1, // Felipe Oliveira
            'created_at' => now()
        ]);
    }
}
