<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypefinantialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserir dados na tabela typefinantial
        DB::table('typefinantial')->insert([
            'description' => 'Entrada',
        ]);

        DB::table('typefinantial')->insert([
            'description' => 'Saida',
        ]);

        DB::table('typefinantial')->insert([
            'description' => 'A Receber',
        ]);

        DB::table('typefinantial')->insert([
            'description' => 'A Sair',
        ]);        
    }
}
