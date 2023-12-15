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
            'picture' => 'carnival6.jpeg',
            'nama_menu' => 'French Fries',
            'deskripsi' => 'Kentang goreng dengan bumbu dan saos pilihan',
            'harga' => 16000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'picture' => 'carnival5.jpg',
            'nama_menu' => 'Mushroom Crispy Jumbo',
            'deskripsi' => 'Jamur goreng dengan bumbu dan saos pilihan',
            'harga' => 14000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'picture' => 'carnival8.jpg',
            'nama_menu' => 'Tahu Crispy',
            'deskripsi' => 'Tahu goreng dengan bumbu dan saos pilihan',
            'harga' => 12000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'picture' => 'carnival7.jpg',
            'nama_menu' => 'Kulit Ayam Crispy',
            'deskripsi' => 'Kulit ayam crispy ditaburi bumbu pilihan',
            'harga' => 14000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'picture' => 'carnival4.jpg',
            'nama_menu' => 'Curly Fries',
            'deskripsi' => 'Kentang curly dengan bumbu dan saos pilihan',
            'harga' => 16000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'picture' => 'carnival3.jpg',
            'nama_menu' => 'Chicken Crispy',
            'deskripsi' => 'Potongan ayam goreng crispy ditaburi bumbu lezat',
            'harga' => 17000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'picture' => 'carnival1.jpg',
            'nama_menu' => 'Fish Ball',
            'deskripsi' => 'Bola ikan, isi 10',
            'harga' => 16000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
        ], [
            'picture' => 'carnival2.jpg',
            'nama_menu' => 'Shrimp Ball',
            'deskripsi' => 'Bola udang, isi 8',
            'harga' => 16000,
            'toko_id' => 'carnival@gmail.com',
            'kantin_id' => 3,
            // end menu carnival
        ],     [
            // start menu japanesefood
            'picture' => 'japanesefood1.jpg',
            'nama_menu' => 'Nasi Goreng Original',
            'deskripsi' => 'Nasi goreng dengan bumbu original',
            'harga' => 18000,
            'toko_id' => 'japanesefood@gmail.com',
            'kantin_id' => 3,
        ],     [
            'picture' => 'japanesefood2.jpg',
            'nama_menu' => 'Nasi Goreng Hongkong',
            'deskripsi' => 'Nasi goreng ala Hongkong',
            'harga' => 20000,
            'toko_id' => 'japanesefood@gmail.com',
            'kantin_id' => 3,
        ],     [
            'picture' => 'japanesefood3.jpg',
            'nama_menu' => 'Teriyaki',
            'deskripsi' => 'Ayam atau daging panggang dengan saus teriyaki',
            'harga' => 25000,
            'toko_id' => 'japanesefood@gmail.com',
            'kantin_id' => 3,
        ],     [
            'picture' => 'japanesefood4.jpg',
            'nama_menu' => 'Yakiniku',
            'deskripsi' => 'Daging panggang ala Jepang',
            'harga' => 28000,
            'toko_id' => 'japanesefood@gmail.com',
            'kantin_id' => 3,
        ],     [
            'picture' => 'japanesefood5.jpg',
            'nama_menu' => 'Yakisoba',
            'deskripsi' => 'Mie panggang dengan sayuran dan daging',
            'harga' => 22000,
            'toko_id' => 'japanesefood@gmail.com',
            'kantin_id' => 3,
        ],     [
            'picture' => 'japanesefood6.jpeg',
            'nama_menu' => 'Chicken Katsu',
            'deskripsi' => 'Ayam goreng tepung khas Jepang',
            'harga' => 20000,
            'toko_id' => 'japanesefood@gmail.com',
            'kantin_id' => 3,
        ],     [
            'picture' => 'japanesefood7.jpg',
            'nama_menu' => 'Beef Bowl',
            'deskripsi' => 'Donburi dengan daging sapi',
            'harga' => 23000,
            'toko_id' => 'japanesefood@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'japanesefood8.jpg',
            'nama_menu' => 'Sushi',
            'deskripsi' => 'Seleksi sushi yang lezat',
            'harga' => 30000,
            'toko_id' => 'japanesefood@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'japanesefood9.jpg',
            'nama_menu' => 'Ramen',
            'deskripsi' => 'Mie Jepang dalam kuah lezat',
            'harga' => 25000,
            'toko_id' => 'japanesefood@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'japanesefood10.jpg',
            'nama_menu' => 'Chicken Karaage',
            'deskripsi' => 'Ayam goreng ala Jepang',
            'harga' => 22000,
            'toko_id' => 'japanesefood@gmail.com',
            'kantin_id' => 3,
            // end japanese food
        ],
        [
            //start depot kita
            'picture' => 'depotkita1.jpg',
            'nama_menu' => 'Nasi Ayam Goreng',
            'deskripsi' => 'Nasi dengan ayam goreng spesial',
            'harga' => 18000,
            'toko_id' => 'depotkita@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotkita2.jpg',
            'nama_menu' => 'Nasi Fu Yung Hai',
            'deskripsi' => 'Nasi dengan telur fu yung hai',
            'harga' => 22000,
            'toko_id' => 'depotkita@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotkita3.jpg',
            'nama_menu' => 'Nasi Koloke',
            'deskripsi' => 'Nasi dengan campuran kol dan bakso',
            'harga' => 20000,
            'toko_id' => 'depotkita@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotkita4.jpg',
            'nama_menu' => 'Nasi Campur',
            'deskripsi' => 'Nasi dengan berbagai macam lauk',
            'harga' => 25000,
            'toko_id' => 'depotkita@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotkita5.jpg',
            'nama_menu' => 'Nasi Ayam Geprek',
            'deskripsi' => 'Nasi dengan ayam geprek yang pedas',
            'harga' => 21000,
            'toko_id' => 'depotkita@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotkita6.jpg',
            'nama_menu' => 'Es Soda Gembira',
            'deskripsi' => 'Minuman segar dengan soda dan sirup',
            'harga' => 8000,
            'toko_id' => 'depotkita@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotkita8.jpg',
            'nama_menu' => 'Milo',
            'deskripsi' => 'Minuman coklat bubuk Milo',
            'harga' => 10000,
            'toko_id' => 'depotkita@gmail.com',
            'kantin_id' => 3,
            // end depot kita
        ],
        [
            // start depot mapan
            'picture' => 'depotmapan1.jpg',
            'nama_menu' => 'Nasi Goreng Telur',
            'deskripsi' => 'Nasi goreng dengan telur',
            'harga' => 15000,
            'toko_id' => 'depotmapan@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotmapan2.jpg',
            'nama_menu' => 'Nasi Campur',
            'deskripsi' => 'Nasi dengan berbagai macam lauk',
            'harga' => 18000,
            'toko_id' => 'depotmapan@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotmapan3.jpg',
            'nama_menu' => 'Nasi Ayam Koloke',
            'deskripsi' => 'Nasi dengan ayam dan koloke',
            'harga' => 20000,
            'toko_id' => 'depotmapan@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotmapan4.jpg',
            'nama_menu' => 'Nasi Capcay',
            'deskripsi' => 'Nasi dengan campuran sayuran dan daging',
            'harga' => 22000,
            'toko_id' => 'depotmapan@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotmapan5.jpg',
            'nama_menu' => 'Es Teh',
            'deskripsi' => 'Minuman teh dingin',
            'harga' => 5000,
            'toko_id' => 'depotmapan@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'depotmapan6.jpg',
            'nama_menu' => 'Es Jeruk',
            'deskripsi' => 'Minuman jeruk segar',
            'harga' => 6000,
            'toko_id' => 'depotmapan@gmail.com',
            'kantin_id' => 3,
            //end depot mapan
        ],
        [
            //start kuenyonya
            'picture' => 'kuenyonya1.jpg',
            'nama_menu' => 'Lemper',
            'deskripsi' => '4pcs Makanan tradisional berisi ketan dan daging',
            'harga' => 12000,
            'toko_id' => 'kuenyonya@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'kuenyonya2.jpg',
            'nama_menu' => 'Kue Nyonya',
            'deskripsi' => '2pcs Kue tradisional khas Nyonya',
            'harga' => 10000,
            'toko_id' => 'kuenyonya@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'kuenyonya3.jpg',
            'nama_menu' => 'Kue Ambon',
            'deskripsi' => '3pcs Kue tradisional khas Ambon',
            'harga' => 15000,
            'toko_id' => 'kuenyonya@gmail.com',
            'kantin_id' => 3,
            //end kuenyonya
        ],
        [
            // start sotoayamjago
            'picture' => 'sotoayamjago1.jpg',
            'nama_menu' => 'Soto Ayam Telur',
            'deskripsi' => 'Soto ayam dengan tambahan telur',
            'harga' => 12000,
            'toko_id' => 'sotoayamjago@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'sotoayamjago2.jpg',
            'nama_menu' => 'Soto Ayam Spesial',
            'deskripsi' => 'Soto ayam spesial dengan bumbu istimewa',
            'harga' => 15000,
            'toko_id' => 'sotoayamjago@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'sotoayamjago3.jpeg',
            'nama_menu' => 'Soto Ayam Jago',
            'deskripsi' => 'Soto ayam khas dengan cita rasa yang unik',
            'harga' => 18000,
            'toko_id' => 'sotoayamjago@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'sotoayamjago4.jpg',
            'nama_menu' => 'Soto Ayam',
            'deskripsi' => 'Soto ayam dengan kuah yang lezat',
            'harga' => 13000,
            'toko_id' => 'sotoayamjago@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'sotoayamjago5.jpg',
            'nama_menu' => 'Soto Ayam Campur',
            'deskripsi' => 'Soto ayam dengan campuran berbagai bahan',
            'harga' => 16000,
            'toko_id' => 'sotoayamjago@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'sotoayamjago6.jpg',
            'nama_menu' => 'Nasi Putih',
            'deskripsi' => 'Nasi putih yang lembut',
            'harga' => 5000,
            'toko_id' => 'sotoayamjago@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'sotoayamjago7.jpg',
            'nama_menu' => 'Lontong',
            'deskripsi' => 'Lontong sebagai pelengkap hidangan',
            'harga' => 3000,
            'toko_id' => 'sotoayamjago@gmail.com',
            'kantin_id' => 3,
        ],
        [
            'picture' => 'sotoayamjago8.jpg',
            'nama_menu' => 'Es Teh Manis',
            'deskripsi' => 'Minuman teh manis yang segar',
            'harga' => 6000,
            'toko_id' => 'sotoayamjago@gmail.com',
            'kantin_id' => 3,
            // end soto ayam jago
        ],
    ];
        DB::table('pe_menu')->insert($foods);
    }
}
