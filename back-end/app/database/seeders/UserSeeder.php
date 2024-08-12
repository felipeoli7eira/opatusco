<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nome'          => 'Recepcionista',
            'email'         => 'recepcionista@opatusco.com',
            'senha'         => Hash::make('recepcionista'),
            'medico'        => false,
            'recepcionista' => true,
            'created_at'    => now()
        ]);

        DB::table('users')->insert([
            'nome'          => 'Dr. Patusco',
            'email'         => 'drpatusco@opatusco.com',
            'senha'         => Hash::make('drpatusco'),
            'medico'        => true,
            'recepcionista' => false,
            'created_at'    => now()
        ]);
    }
}
