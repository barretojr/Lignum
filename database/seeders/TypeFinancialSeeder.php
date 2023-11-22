<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeFinancialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Typefinantial::factory()->create([
            'description' => 'Entrada',
         ]);

         \App\Models\Typefinantial::factory()->create([
            'description' => 'Saida',
         ]);

         \App\Models\Typefinantial::factory()->create([
            'description' => 'A Receber',
         ]);

         \App\Models\Typefinantial::factory()->create([
            'description' => 'A Pagar',
         ]);
    }
}
