<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AlunoSeeder::class,
            TrabalhoSeeder::class,
            AvaliadorSeeder::class,
            AdminSeeder::class,
        ]);
    }
}