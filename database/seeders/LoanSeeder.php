<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('loans')->insert([
            [
                'id' => 1,
                'user_npm' => '5520123057',
                'loan_at' => now(),
                'return_at' => now(),
            ]
        ]);
    }
}
