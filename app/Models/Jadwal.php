<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'hari',
        'mata_kuliah_id',
        'dosen_id',
        'ruang_id',
        'shift_id',
        'waktu_mulai',
        'waktu_selesai',
        'keterangan'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
