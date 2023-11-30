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
        DB::table('pe_toko')->insert([
            'toko_id' => '234@gmail.com',
            'nama_toko' => 'Depot NikoHoc',
            'tutup' => 0,
            'kantin_id' => 3,
        ]);
    }
}
