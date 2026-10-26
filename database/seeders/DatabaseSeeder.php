<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil UserSeeder yang sudah Anda buat dengan benar tadi
        $this->call([
            UserSeeder::class,
        ]);
    }
}
