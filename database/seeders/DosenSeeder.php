<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run()
    {
        $names = [
            'Dr. Latifah Wulandari, S.E., M.M.',
            'Armansyah Sarusu, S.Sos., M.M.',
            'Dr. Yudhy, M.Ag',
            'Dadang Dimyati, S.S., M.M.',
            'Riyadh Ahsanul Arifin, M.Pd.',
            'Nova Indrayana Yusman, M.Kom.',
            'Iin, M.Kom.',
            'Haekal Pirous, S.T., M.A.B.',
            'Tedi Budiman, S.Si., M.Kom.',
            'Faisal Rakhman, S.E., M.M.'
        ];

        foreach ($names as $n) {
            Dosen::create(['nama'=>$n]);
        }
    }
}
