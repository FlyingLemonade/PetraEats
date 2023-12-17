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
            ], [
                'picture' => 'kantinP7.jpg',
                'toko_id' => 'ndokee@gmail.com',
                'nama_toko' => 'Ndokee',
                'tutup' => 0,
                'kantin_id' => 3,
            ], [
                'picture' => 'kantinW1.jpg',
                'toko_id' => 'kedaihong@gmail.com',
                'nama_toko' => 'Kedai Hong',
                'tutup' => 0,
                'kantin_id' => 1,
            ], [
                'picture' => 'kantinW2.jpg',
                'toko_id' => 'depotmie55@gmail.com',
                'nama_toko' => 'Depot Mie 55',
                'tutup' => 0,
                'kantin_id' => 1,
            ], [
                'picture' => 'kantinW3.jpg',
                'toko_id' => 'ayampinarak@gmail.com',
                'nama_toko' => 'Ayam Pinarak',
                'tutup' => 0,
                'kantin_id' => 1,
            ], [
                'picture' => 'kantinW4.png',
                'toko_id' => 'pokpok@gmail.com',
                'nama_toko' => 'Pokpok',
                'tutup' => 0,
                'kantin_id' => 1,
            ], [
                'picture' => 'kantinW5.jpg',
                'toko_id' => 'chattime@gmail.com',
                'nama_toko' => 'Chattime',
                'tutup' => 0,
                'kantin_id' => 1,
            ], [
                'picture' => 'kantinW6.png',
                'toko_id' => 'starbucks@gmail.com',
                'nama_toko' => 'Starbucks',
                'tutup' => 0,
                'kantin_id' => 1,
            ], [
                'picture' => 'kantinQ1.jpg',
                'toko_id' => 'mieremaja@gmail.com',
                'nama_toko' => 'Mie Remaja',
                'tutup' => 0,
                'kantin_id' => 4,
            ], [
                'picture' => 'kantinQ2.jpg',
                'toko_id' => 'kopte@gmail.com',
                'nama_toko' => 'Kopte Tarik',
                'tutup' => 0,
                'kantin_id' => 4,
            ], [
                'picture' => 'kantinQ3.jpg',
                'toko_id' => 'sambalapi@gmail.com',
                'nama_toko' => 'Sambal Api',
                'tutup' => 0,
                'kantin_id' => 4,
            ], [
                'picture' => 'kantinQ4.png',
                'toko_id' => 'kxkresto@gmail.com',
                'nama_toko' => 'KxK Resto',
                'tutup' => 0,
                'kantin_id' => 4,
            ], [
                'picture' => 'kantinQ5.jpg',
                'toko_id' => 'excelso@gmail.com',
                'nama_toko' => 'Excelso',
                'tutup' => 0,
                'kantin_id' => 4,
            ],[
                'picture' => 'kantinT1.jpg',
                'toko_id' => 'dcrepes@gmail.com',
                'nama_toko' => 'D`crepes',
                'tutup' => 0,
                'kantin_id' => 2,
            ], [
                'picture' => 'kantinT2.jpg',
                'toko_id' => 'baksosapiasli@gmail.com',
                'nama_toko' => 'Bakso Sapi Asli 2',
                'tutup' => 0,
                'kantin_id' => 2,
            ], [
                'picture' => 'kantinT3.png',
                'toko_id' => 'markittop@gmail.com',
                'nama_toko' => 'Markit ~ Top',
                'tutup' => 0,
                'kantin_id' => 2,
            ], [
                'picture' => 'kantinT4.png',
                'toko_id' => 'berkatkatering@gmail.com',
                'nama_toko' => 'Berkat Katering',
                'tutup' => 0,
                'kantin_id' => 2,
            ]
            
        ];

        DB::table('pe_toko')->insert($toko);
    }
}