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
                'picture' => 'kantinP1.jpg',
                'toko_id' => 'carnival@gmail.com',
                'nama_toko' => 'Carnival',
                'tutup' => 0,
                'kantin_id' => 3,
            ], [
                'picture' => 'kantinP2.jpg',
                'toko_id' => 'japanesefood@gmail.com',
                'nama_toko' => 'Japanese Food',
                'tutup' => 0,
                'kantin_id' => 3,
            ], [
                'picture' => 'kantinP3.png',
                'toko_id' => 'depotkita@gmail.com',
                'nama_toko' => 'Depot Kita',
                'tutup' => 0,
                'kantin_id' => 3,
            ], [
                'picture' => 'kantinP4.png',
                'toko_id' => 'depotmapan@gmail.com',
                'nama_toko' => 'Depot Mapan',
                'tutup' => 0,
                'kantin_id' => 3,
            ], [
                'picture' => 'kantinP5.png',
                'toko_id' => 'kuenyonya@gmail.com',
                'nama_toko' => 'Kue Nyonya',
                'tutup' => 0,
                'kantin_id' => 3,
            ], [
                'picture' => 'kantinP6.png',
                'toko_id' => 'sotoayamjago@gmail.com',
                'nama_toko' => 'Soto Ayam Jago',
                'tutup' => 0,
                'kantin_id' => 3,
            ]
        ];

        DB::table('pe_toko')->insert($toko);
    }
}
