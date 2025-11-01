<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Ruang;
use App\Models\Shift;

class JadwalController extends Controller
{
    /**
     * Tampilkan daftar jadwal perkuliahan.
     */
    public function index()
    {
        $jadwals = Jadwal::with(['dosen', 'mataKuliah', 'ruang', 'shift'])
            ->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu')")
            ->orderBy('waktu_mulai')
            ->get();

        return view('jadwal.index', compact('jadwals'));
    }

    /**
     * Form tambah jadwal baru.
     */
    public function create()
    {
        $dosens = Dosen::all();
        $mks = MataKuliah::all();
        $ruangs = Ruang::all();
        $shifts = Shift::all();

        return view('jadwal.create', compact('dosens', 'mks', 'ruangs', 'shifts'));
    }

    /**
     * Simpan data jadwal baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'hari' => 'required|string',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => 'required|exists:dosens,id',
            'ruang_id' => 'nullable|exists:ruangs,id',
            'shift_id' => 'nullable|exists:shifts,id',
            'waktu_mulai' => 'nullable|string',
            'waktu_selesai' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        Jadwal::create($data);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambah.');
    }

    /**
     * Form edit jadwal.
     */
    public function edit(Jadwal $jadwal)
    {
        $dosens = Dosen::all();
        $mks = MataKuliah::all();
        $ruangs = Ruang::all();
        $shifts = Shift::all();

        return view('jadwal.edit', compact('jadwal', 'dosens', 'mks', 'ruangs', 'shifts'));
    }

    /**
     * Update jadwal yang sudah ada.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $data = $request->validate([
            'hari' => 'required|string',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => 'required|exists:dosens,id',
            'ruang_id' => 'nullable|exists:ruangs,id',
            'shift_id' => 'nullable|exists:shifts,id',
            'waktu_mulai' => 'nullable|string',
            'waktu_selesai' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $jadwal->update($data);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Hapus jadwal.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
