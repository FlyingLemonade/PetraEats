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
            // start menu carnival
            'nama_menu' => 'French Fries',
            'deskripsi' => 'Kentang goreng dengan bumbu dan saos pilihan',
            'harga' => 16000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'nama_menu' => 'Mushroom Crispy Jumbo',
            'deskripsi' => 'Jamur goreng dengan bumbu dan saos pilihan',
            'harga' => 14000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'nama_menu' => 'Tahu Crispy',
            'deskripsi' => 'Tahu goreng dengan bumbu dan saos pilihan',
            'harga' => 12000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'nama_menu' => 'Kulit Ayam Crispy',
            'deskripsi' => 'Kulit ayam crispy ditaburi bumbu pilihan',
            'harga' => 14000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'nama_menu' => 'Curly Fries',
            'deskripsi' => 'Kentang curly dengan bumbu dan saos pilihan',
            'harga' => 16000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'nama_menu' => 'Chicken Crispy',
            'deskripsi' => 'Potongan ayam goreng crispy ditaburi bumbu lezat',
            'harga' => 17000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'nama_menu' => 'Fish Ball',
            'deskripsi' => 'Bola ikan, isi 10',
            'harga' => 16000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'nama_menu' => 'Shrimp Ball',
            'deskripsi' => 'Bola udang, isi 8',
            'harga' => 16000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
            // end menu carnival
        ]];
        DB::table('pe_menu')->insert($foods);
    }
}
