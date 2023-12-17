<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'picture' => '/123@gmail.com.jpg',
                'email' => '123@gmail.com',
                'nama' => 'Sukri Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'picture' => '/Niko@gmail.com.jpeg',
                'email' => 'Niko@gmail.com',
                'nama' => 'Niko Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'picture' => '/Nicho@gmail.com.jpg',
                'email' => 'Nicho@gmail.com',
                'nama' => 'Nicho Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'picture' => '/Yesto@gmail.com.jpeg',
                'email' => 'Yesto@gmail.com',
                'nama' => 'Yesto Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'picture' => '/Daniel@gmail.com.jpg',
                'email' => 'Daniel@gmail.com',
                'nama' => 'Daniel Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'picture' => '/Ryan@gmail.com.jpg',
                'email' => 'Ryan@gmail.com',
                'nama' => 'Ryan Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'picture' => '/234@gmail.com.jpg',
                'email' => '234@gmail.com',
                'nama' => 'Sukri Kantin',
                'no_telepon' => '089456612658',
                'password' => Hash::make('234'),
                'status_user' => 2,
            ],
            [
                'picture' => '/345@gmail.com.jpg',
                'email' => '345@gmail.com',
                'nama' => 'Sukri Admin',
                'no_telepon' => '089456612658',
                'password' => Hash::make('345'),
                'status_user' => 3,
            ],
            [
                'picture' => '/carnival@gmail.com.jpg',
                'email' => 'carnival@gmail.com',
                'nama' => 'Carnival',
                'no_telepon' => '089458752658',
                'password' => Hash::make('carnival'),
                'status_user' => 2,
            ],[
                'picture' => '/japanesefood@gmail.com.jpg',
                'email' => 'japanesefood@gmail.com',
                'nama' => 'Japanese Food',
                'no_telepon' => '089452852658',
                'password' => Hash::make('japanesefood'),
                'status_user' => 2,
            ],[
                'picture' => '/depotkita@gmail.com.jpg',
                'email' => 'depotkita@gmail.com',
                'nama' => 'Depot Kita',
                'no_telepon' => '0875433277736',
                'password' => Hash::make('depotkita'),
                'status_user' => 2,
            ],[
                'picture' => '/depotmapan@gmail.com.jpg',
                'email' => 'depotmapan@gmail.com',
                'nama' => 'Depot Mapan',
                'no_telepon' => '08754323156788',
                'password' => Hash::make('depotmapan'),
                'status_user' => 2,
            ],[
                'picture' => '/kuenyonya@gmail.com.jpg',
                'email' => 'kuenyonya@gmail.com',
                'nama' => 'Kue Nyonya',
                'no_telepon' => '08754332252636',
                'password' => Hash::make('kuenyonya'),
                'status_user' => 2,
            ],[
                'picture' => '/sotoayamjago@gmail.com.jpg',
                'email' => 'sotoayamjago@gmail.com',
                'nama' => 'Soto Ayam Jago',
                'no_telepon' => '0813697045945',
                'password' => Hash::make('sotoayamjago'),
                'status_user' => 2,
            ],[
                'picture' => '/ndokee@gmail.com.jpg',
                'email' => 'ndokee@gmail.com',
                'nama' => 'Ndokee',
                'no_telepon' => '096947433432',
                'password' => Hash::make('ndokee'),
                'status_user' => 2,
            ],    [
                'picture' => '/kedaihong@gmail.com.jpg',
                'email' => 'kedaihong@gmail.com',
                'nama' => 'Kedai Hong',
                'no_telepon' => '081234567890',
                'password' => Hash::make('kedaihong'),
                'status_user' => 2,
            ],
            [
                'picture' => '/depotmie55@gmail.com.jpg',
                'email' => 'depotmie55@gmail.com',
                'nama' => 'Depot Mie 55',
                'no_telepon' => '085678901234',
                'password' => Hash::make('depotmie55'),
                'status_user' => 2,
            ],
            [
                'picture' => '/ayampinarak@gmail.com.jpg',
                'email' => 'ayampinarak@gmail.com',
                'nama' => 'Ayam Pinarak',
                'no_telepon' => '087654321098',
                'password' => Hash::make('ayampinarak'),
                'status_user' => 2,
            ],
            [
                'picture' => '/pokpok@gmail.com.jpg',
                'email' => 'pokpok@gmail.com',
                'nama' => 'Pokpok',
                'no_telepon' => '089012345678',
                'password' => Hash::make('pokpok'),
                'status_user' => 2,
            ],
            [
                'picture' => '/chattime@gmail.com.jpg',
                'email' => 'chattime@gmail.com',
                'nama' => 'Chattime',
                'no_telepon' => '081234567890',
                'password' => Hash::make('chattime'),
                'status_user' => 2,
            ],
            [
                'picture' => '/starbucks@gmail.com.jpg',
                'email' => 'starbucks@gmail.com',
                'nama' => 'Starbucks',
                'no_telepon' => '085678901234',
                'password' => Hash::make('starbucks'),
                'status_user' => 2,
            ],
            [
                'picture' => '/mieremaja@gmail.com.jpg',
                'email' => 'mieremaja@gmail.com',
                'nama' => 'Mie Remaja',
                'no_telepon' => '056746747232',
                'password' => Hash::make('mieremaja'),
                'status_user' => 2,
            ],
            [
                'picture' => '/kopte@gmail.com.jpg',
                'email' => 'kopte@gmail.com',
                'nama' => 'Kopte Tarik',
                'no_telepon' => '081356763234',
                'password' => Hash::make('kopte'),
                'status_user' => 2,
            ],
            [
                'picture' => '/sambalapi@gmail.com.jpg',
                'email' => 'sambalapi@gmail.com',
                'nama' => 'Sambal Api',
                'no_telepon' => '01624575473',
                'password' => Hash::make('sambalapi'),
                'status_user' => 2,
            ],
            [
                'picture' => '/kxkresto@gmail.com.jpg',
                'email' => 'kxkresto@gmail.com',
                'nama' => 'KxK Resto',
                'no_telepon' => '085678901234',
                'password' => Hash::make('kxkresto'),
                'status_user' => 2,
            ],
            [
                'picture' => '/excelso@gmail.com.jpg',
                'email' => 'excelso@gmail.com',
                'nama' => 'Excelso',
                'no_telepon' => '08319523485',
                'password' => Hash::make('excelso'),
                'status_user' => 2,
            ],
            [
                'picture' => '/dcrepes@gmail.com.jpg',
                'email' => 'dcrepes@gmail.com',
                'nama' => 'D`crepes',
                'no_telepon' => '08319523485',
                'password' => Hash::make('dcrepes'),
                'status_user' => 2,
            ],
            [
                'picture' => '/baksosapiasli@gmail.com.jpg',
                'email' => 'baksosapiasli@gmail.com',
                'nama' => 'Bakso Sapi Asli 2',
                'no_telepon' => '01982385723',
                'password' => Hash::make('baksosapiasli'),
                'status_user' => 2,
            ],
            [
                'picture' => '/markittop@gmail.com.jpg',
                'email' => 'markittop@gmail.com',
                'nama' => 'Markit ~ Top',
                'no_telepon' => '0145932852',
                'password' => Hash::make('markittop'),
                'status_user' => 2,
            ],
            [
                'picture' => '/berkatkatering@gmail.com.jpg',
                'email' => 'berkatkatering@gmail.com',
                'nama' => 'Berkat Katering',
                'no_telepon' => '01803546823',
                'password' => Hash::make('berkatkatering'),
                'status_user' => 2,
            ],
        ];

        DB::table('users')->insert($users);
    }
}