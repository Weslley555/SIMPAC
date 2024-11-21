<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            [
                'nome' => 'Admin 1',
                'email' => 'admin1@example.com',
                'senha' => Hash::make('password'),
            ],
            [
                'nome' => 'Admin 2',
                'email' => 'admin2@example.com',
                'senha' => Hash::make('password'),
            ],
        ]);
    }
}