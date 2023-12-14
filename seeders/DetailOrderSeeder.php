<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $details = [
            [
                'order_id' => 1,
                'menu_id' => 1,
                'jumlah_pesanan' => 1,
                'subtotal' => 20000,
            ],
            [
                'order_id' => 1,
                'menu_id' => 3,
                'jumlah_pesanan' => 1,
                'subtotal' => 22000,
            ],
            [
                'order_id' => 2,
                'menu_id' => 1,
                'jumlah_pesanan' => 3,
                'subtotal' => 60000,
            ],
            [
                'order_id' => 3,
                'menu_id' => 2,
                'jumlah_pesanan' => 1,
                'subtotal' => 18000,
            ],
            [
                'order_id' => 4,
                'menu_id' => 1,
                'jumlah_pesanan' => 1,
                'subtotal' => 20000,
            ],
            [
                'order_id' => 5,
                'menu_id' => 1,
                'jumlah_pesanan' => 1,
                'subtotal' => 20000,
            ],
            [
                'order_id' => 5,
                'menu_id' => 2,
                'jumlah_pesanan' => 1,
                'subtotal' => 18000,
            ],
            [
                'order_id' => 6,
                'menu_id' => 2,
                'jumlah_pesanan' => 1,
                'subtotal' => 18000,
            ],
            [
                'order_id' => 7,
                'menu_id' => 3,
                'jumlah_pesanan' => 1,
                'subtotal' => 22000,
            ],
            [
                'order_id' => 8,
                'menu_id' => 3,
                'jumlah_pesanan' => 1,
                'subtotal' => 18000,
            ],
            [
                'order_id' => 9,
                'menu_id' => 3,
                'jumlah_pesanan' => 1,
                'subtotal' => 22000,
            ],
            [
                'order_id' => 10,
                'menu_id' => 1,
                'jumlah_pesanan' => 2,
                'subtotal' => 40000,
            ],
            [
                'order_id' => 11,
                'menu_id' => 2,
                'jumlah_pesanan' => 1,
                'subtotal' => 18000,
            ],
            [
                'order_id' => 12,
                'menu_id' => 1,
                'jumlah_pesanan' => 1,
                'subtotal' => 20000,
            ],
            [
                'order_id' => 12,
                'menu_id' => 3,
                'jumlah_pesanan' => 1,
                'subtotal' => 22000,
            ],
        ];
        DB::table('pe_detail_order')->insert($details);
    }
}
