<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $orders = [
            [
                //1
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 42000,
                'deskripsi' => 'Empal Asin, Ayam Pedes',
                'email_user' => '123@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //2
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 60000,
                'deskripsi' => 'Ayam Pedes Semua',
                'email_user' => '123@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //3
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 18000,
                'deskripsi' => '',
                'email_user' => '123@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //4
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 20000,
                'deskripsi' => '',
                'email_user' => 'Ryan@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //5
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 38000,
                'deskripsi' => '',
                'email_user' => 'Ryan@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //6
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 18000,
                'deskripsi' => '',
                'email_user' => 'Niko@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //7
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 22000,
                'deskripsi' => '',
                'email_user' => 'Niko@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //8
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 18000,
                'deskripsi' => 'Nasi Banyak',
                'email_user' => '123@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //9
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 22000,
                'deskripsi' => '',
                'email_user' => 'Daniel@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //10
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 40000,
                'deskripsi' => 'Pedes semua',
                'email_user' => 'Daniel@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //11
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 18000,
                'deskripsi' => '',
                'email_user' => 'Yesto@gmail.com',
                'email_toko' => 'carnival@gmail.com',
                //12
            ], [
                'tanggal' => now(),
                'status_pesanan' => 1,
                'nominal' => 42000,
                'deskripsi' => '',
                'email_user' => 'Yesto@gmail.com',
                'email_toko' => 'carnival@gmail.com',

            ],
        ];

        DB::table('pe_order')->insert($orders);
    }
}
