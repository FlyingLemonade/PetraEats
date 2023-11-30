<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $foods = [[
            'nama_menu' => 'Ayam Penyet',
            'deskripsi' => 'Ayam dipenyet level pedas 1 2 3',
            'harga' => 20000,
            'toko_id' => '234@gmail.com',
            'kantin_id' => 1,
        ], [
            'nama_menu' => 'Ayam KungPao',
            'deskripsi' => 'Ayam Manis',
            'harga' => 18000,
            'toko_id' => '234@gmail.com',
            'kantin_id' => 1,
        ], [
            'nama_menu' => 'Empal Goreng',
            'deskripsi' => 'Asin atau Manis Tulis di catatan!',
            'harga' => 22000,
            'toko_id' => '234@gmail.com',
            'kantin_id' => 1,
        ]];
        DB::table('pe_menu')->insert($foods);
    }
}
