<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $toko = [
            [
                'toko_id' => 'carnival@gmail.com',
                'nama_toko' => 'Carnival',
                'tutup' => 0,
                'kantin_id' => 3,
            ], [
                'toko_id' => 'japanesefood@gmail.com',
                'nama_toko' => 'Japanese Food',
                'tutup' => 0,
                'kantin_id' => 3,
            ], [
                'toko_id' => 'depotkita@gmail.com',
                'nama_toko' => 'Depot Kita',
                'tutup' => 0,
                'kantin_id' => 3,
            ]
        ];

        DB::table('pe_toko')->insert($toko);
    }
}
