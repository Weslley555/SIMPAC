<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrabalhoSeeder extends Seeder
{
    public function run()
    {
        DB::table('trabalhos')->insert([
            [
                'responsavel_id' => 1,
                'titulo' => 'Trabalho 1',
                'descricao' => 'Descrição do Trabalho 1',
                'modelo_avaliativo' => 'Modelo 1',
                'arquivo' => 'trabalho1.pdf',
            ],
            [
                'responsavel_id' => 2,
                'titulo' => 'Trabalho 2',
                'descricao' => 'Descrição do Trabalho 2',
                'modelo_avaliativo' => 'Modelo 2',
                'arquivo' => 'trabalho2.pdf',
            ],
            [
                'responsavel_id' => 2,
                'titulo' => 'Trabalho 3',
                'descricao' => 'Descrição do Trabalho 3',
                'modelo_avaliativo' => 'Modelo 2',
                'arquivo' => 'trabalho2.pdf',
            ],
        ]);
    }
}