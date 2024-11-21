<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AvaliadorSeeder extends Seeder
{
    public function run()
    {
        DB::table('avaliadores')->insert([
            [
                'nome' => 'Avaliador 1',
                'email' => 'avaliador1@example.com',
                'senha' => Hash::make('password'),
                'area_de_atuacao' => 'Área 1',
            ],
            [
                'nome' => 'Avaliador 2',
                'email' => 'avaliador2@example.com',
                'senha' => Hash::make('password'),
                'area_de_atuacao' => 'Área 2',
            ],
        ]);
    }
}