<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(KantinSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TokoSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(DetailOrderSeeder::class);
    }
}
