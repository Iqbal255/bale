<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        // Di level ini, data jadwal masih hardcoded di blade
        return view('jadwal.index');
    }
}
