<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shift;

class ShiftSeeder extends Seeder
{
    public function run()
    {
        $shifts = ['S1 SI','D3 KA','S1 BD A'];
        foreach ($shifts as $s) Shift::create(['nama'=>$s]);
    }
}
