<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nama'];
    public function jadwals() { return $this->hasMany(Jadwal::class); }
}
