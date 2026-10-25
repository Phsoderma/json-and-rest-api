<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['id' => 1, 'first_name' => 'Dean', 'last_name' => 'Wijaya'],
            ['id' => 2, 'first_name' => 'Tubagus', 'last_name' => 'Danial'],
            ['id' => 3, 'first_name' => 'Elsa', 'last_name' => 'Rizki'],
            ['id' => 4, 'first_name' => 'Dion', 'last_name' => 'Halim'],
            ['id' => 5, 'first_name' => 'Inaaya', 'last_name' => 'Nadira'],
        ];

        foreach ($customers as $customer) {
            DB::table('customers')->updateOrInsert(
                ['id' => $customer['id']],
                [
                    'first_name' => $customer['first_name'],
                    'last_name' => $customer['last_name'],
                ]
            );
        }
    }
}


