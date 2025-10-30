<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruang;

class RuangSeeder extends Seeder
{
    public function run()
    {
        $rooms = ['A204','A205','A209','A210','B301','B302','B303','Lab Jaringan','Lab Komputer 1','Lab Komputer 2','AULA'];
        foreach ($rooms as $r) Ruang::create(['nama'=>$r]);
    }
}
