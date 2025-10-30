@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-semibold mb-3">Tambah Jadwal</h2>
    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-3">
            <input name="hari" placeholder="Hari (e.g. Senin)" class="border p-2" required>
            <input name="waktu_mulai" placeholder="Waktu Mulai (07:30)" class="border p-2">
            <select name="mata_kuliah_id" class="border p-2" required>
                <option value="">Pilih Mata Kuliah</option>
                @foreach(\App\Models\MataKuliah::all() as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama }}</option>
                @endforeach
            </select>
            <select name="dosen_id" class="border p-2" required>
                <option value="">Pilih Dosen</option>
                @foreach(\App\Models\Dosen::all() as $d)
                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                @endforeach
            </select>

            <select name="ruang_id" class="border p-2">
                <option value="">Pilih Ruang</option>
                @foreach(\App\Models\Ruang::all() as $r) <option value="{{ $r->id }}">{{ $r->nama }}</option> @endforeach
            </select>
            <select name="shift_id" class="border p-2">
                <option value="">Pilih Shift</option>
                @foreach(\App\Models\Shift::all() as $s) <option value="{{ $s->id }}">{{ $s->nama }}</option> @endforeach
            </select>

            <input name="waktu_selesai" placeholder="Waktu Selesai (09:10)" class="border p-2">
            <input name="keterangan" placeholder="Keterangan" class="border p-2">
        </div>

        <div class="mt-3">
            <button class="bg-indigo-600 text-white px-3 py-2 rounded">Simpan</button>
            <a href="{{ route('jadwal.index') }}" class="ml-2">Batal</a>
        </div>
    </form>
</div>
@endsection
