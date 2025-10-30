<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = ['kode','nama'];
    public function jadwals() { return $this->hasMany(Jadwal::class); }
}
