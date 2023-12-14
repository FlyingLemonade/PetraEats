<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KantinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $canteens = [
            [
                'kantin_id' => 1,
                'nama_kantin' => 'Kantin W',
            ], [
                'kantin_id' => 2,
                'nama_kantin' => 'Kantin T',
            ], [
                'kantin_id' => 3,
                'nama_kantin' => 'Kantin P',
            ], [
                'kantin_id' => 4,
                'nama_kantin' => 'Kantin Q',
            ]
        ];
        DB::table('pe_kantin')->insert($canteens);
    }
}
