<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Ruang;
use App\Models\Shift;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        // helper to find ids
        $dosen = Dosen::pluck('id','nama');
        $mk = MataKuliah::pluck('id','kode');
        $ruang = Ruang::pluck('id','nama');
        $shift = Shift::pluck('id','nama');

        $data = [
            ['hari'=>'Senin','mata_kuliah_kode'=>'IF101','dosen'=>'Dr. Latifah Wulandari, S.E., M.M.','ruang'=>'A211','shift'=>'S1 SI','mulai'=>'07:30','selesai'=>'10:00'],
            ['hari'=>'Senin','mata_kuliah_kode'=>'IF203','dosen'=>'Dr. Yudhy, M.Ag','ruang'=>'A204','shift'=>'S1 SI','mulai'=>'09:00','selesai'=>'10:40'],
            ['hari'=>'Senin','mata_kuliah_kode'=>'IF205','dosen'=>'Armansyah Sarusu, S.Sos., M.M.','ruang'=>'A205','shift'=>'S1 BD A','mulai'=>'07:30','selesai'=>'10:00'],
            ['hari'=>'Selasa','mata_kuliah_kode'=>'IF207','dosen'=>'Encep Supriatna, S.E., S.Kom, M.M.','ruang'=>'B303','shift'=>'D3 KA','mulai'=>'07:30','selesai'=>'10:00'],
            ['hari'=>'Selasa','mata_kuliah_kode'=>'IF301','dosen'=>'Riyadh Ahsanul Arifin, M.Pd.','ruang'=>'A210','shift'=>'D3 KA','mulai'=>'14:10','selesai'=>'15:50'],
            ['hari'=>'Selasa','mata_kuliah_kode'=>'IF302','dosen'=>'Nova Indrayana Yusman, M.Kom.','ruang'=>'Lab Jaringan','shift'=>'S1 SI','mulai'=>'14:50','selesai'=>'16:30'],
            ['hari'=>'Rabu','mata_kuliah_kode'=>'IF301','dosen'=>'Iin, M.Kom.','ruang'=>'B301','shift'=>'S1 SI','mulai'=>'08:20','selesai'=>'10:00'],
            ['hari'=>'Rabu','mata_kuliah_kode'=>'IF203','dosen'=>'Haekal Pirous, S.T., M.A.B.','ruang'=>'AULA','shift'=>'S1 SI','mulai'=>'10:10','selesai'=>'11:00'],
            ['hari'=>'Rabu','mata_kuliah_kode'=>'IF205','dosen'=>'Encep Supriatna, S.E., S.Kom, M.M','ruang'=>'B303','shift'=>'S1 SI','mulai'=>'13:00','selesai'=>'15:30'],
            ['hari'=>'Kamis','mata_kuliah_kode'=>'IF401','dosen'=>'Tedi Budiman, S.Si., M.Kom.','ruang'=>'A209','shift'=>'S1 SI','mulai'=>'07:30','selesai'=>'10:00'],
            ['hari'=>'Kamis','mata_kuliah_kode'=>'IF302','dosen'=>'Riyadh Ahsanul Arifin, M.Pd.','ruang'=>'A209','shift'=>'S1 SI','mulai'=>'10:10','selesai'=>'11:50'],
            ['hari'=>'Kamis','mata_kuliah_kode'=>'IF101','dosen'=>'Dr. H. Marlan, M.Eng.Sc.','ruang'=>'A209','shift'=>'S1 SI','mulai'=>'13:00','selesai'=>'14:40'],
            ['hari'=>'Kamis','mata_kuliah_kode'=>'IF101','dosen'=>'Faisal Rakhman, S.E., M.M.','ruang'=>'A209','shift'=>'S1 SI','mulai'=>'15:30','selesai'=>'17:10'],
            ['hari'=>'Jumat','mata_kuliah_kode'=>'IF405','dosen'=>'Kelompok Studi Islam','ruang'=>'','shift'=>'S1 SI','mulai'=>'07:30','selesai'=>'09:00'],
            ['hari'=>'Jumat','mata_kuliah_kode'=>'IF407','dosen'=>'Dr. Sari Kusuma','ruang'=>'D201','shift'=>'S1 BD','mulai'=>'09:20','selesai'=>'11:00'],
        ];

        foreach ($data as $d) {
            // try to find mata kuliah id by kode; fallback: first MK
            $mkId = MataKuliah::where('kode', $d['mata_kuliah_kode'])->first()->id ?? MataKuliah::first()->id;
            $dosenId = Dosen::where('nama',$d['dosen'])->first()->id ?? Dosen::first()->id;
            $ruangId = Ruang::where('nama', $d['ruang'])->first()->id ?? null;
            $shiftId = Shift::where('nama', $d['shift'])->first()->id ?? null;

            Jadwal::create([
                'hari'=>$d['hari'],
                'mata_kuliah_id'=>$mkId,
                'dosen_id'=>$dosenId,
                'ruang_id'=>$ruangId,
                'shift_id'=>$shiftId,
                'waktu_mulai'=>$d['mulai'],
                'waktu_selesai'=>$d['selesai'],
                'keterangan'=>null
            ]);
        }
    }
}
