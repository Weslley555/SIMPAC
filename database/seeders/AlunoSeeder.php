<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlunoSeeder extends Seeder
{
    public function run()
    {
        DB::table('alunos')->insert([
            [
                'nome' => 'Aluno 1',
                'matricula' => 'aluno001',
                'email' => 'aluno1@example.com',
                'senha' => Hash::make('password'),
            ],
            [
                'nome' => 'Aluno 2',
                'matricula' => 'aluno002',
                'email' => 'aluno2@example.com',
                'senha' => Hash::make('password'),
            ],
        ]);
    }
}