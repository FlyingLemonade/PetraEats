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
            ]
        ];

        DB::table('users')->insert($users);
    }
}
