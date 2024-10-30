<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'usuario' => 'Adm',
            'senha' => bcrypt('1'), // Criptografa a senha para segurança
        ]);
    }
}
