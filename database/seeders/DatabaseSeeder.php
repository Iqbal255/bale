<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DosenSeeder::class,
            MataKuliahSeeder::class,
            RuangSeeder::class,
            ShiftSeeder::class,
            JadwalSeeder::class,
        ]);
    }
}
