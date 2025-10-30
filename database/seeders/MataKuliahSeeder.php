<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    public function run()
    {
        $mks = [
            ['kode'=>'IF101','nama'=>'Pemrograman Web'],
            ['kode'=>'IF203','nama'=>'Struktur Data'],
            ['kode'=>'IF205','nama'=>'Basis Data'],
            ['kode'=>'IF207','nama'=>'Rekayasa Perangkat Lunak'],
            ['kode'=>'IF301','nama'=>'Kecerdasan Buatan'],
            ['kode'=>'IF302','nama'=>'Jaringan Komputer'],
            ['kode'=>'IF401','nama'=>'Manajemen Proyek TI'],
            ['kode'=>'IF403','nama'=>'Interaksi Manusia dan Komputer'],
            ['kode'=>'IF405','nama'=>'Pemrograman Mobile'],
            ['kode'=>'IF407','nama'=>'Etika Profesi']
        ];

        foreach ($mks as $m) {
            MataKuliah::create($m);
        }
    }
}
