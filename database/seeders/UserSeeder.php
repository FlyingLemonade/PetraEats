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
                'email' => '123@gmail.com',
                'nama' => 'Sukri Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'email' => 'Niko@gmail.com',
                'nama' => 'Niko Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'email' => 'Nicho@gmail.com',
                'nama' => 'Nicho Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'email' => 'Yesto@gmail.com',
                'nama' => 'Yesto Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'email' => 'Daniel@gmail.com',
                'nama' => 'Daniel Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'email' => 'Ryan@gmail.com',
                'nama' => 'Ryan Mahasiswa',
                'no_telepon' => '089456612658',
                'password' => Hash::make('123'),
                'status_user' => 1,
            ], [
                'email' => '234@gmail.com',
                'nama' => 'Sukri Kantin',
                'no_telepon' => '089456612658',
                'password' => Hash::make('234'),
                'status_user' => 2,
            ],
            [
                'email' => '345@gmail.com',
                'nama' => 'Sukri Admin',
                'no_telepon' => '089456612658',
                'password' => Hash::make('345'),
                'status_user' => 3,
            ]
        ];

        DB::table('users')->insert($users);
    }
}
