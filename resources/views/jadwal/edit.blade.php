@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-semibold mb-3">Edit Jadwal</h2>
    <form action="{{ route('jadwal.update', $jadwal) }}" method="POST">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-3">
            <input name="hari" value="{{ $jadwal->hari }}" class="border p-2" required>
            <input name="waktu_mulai" value="{{ $jadwal->waktu_mulai }}" class="border p-2">
            <select name="mata_kuliah_id" class="border p-2" required>
                @foreach(\App\Models\MataKuliah::all() as $mk)
                    <option value="{{ $mk->id }}" {{ $jadwal->mata_kuliah_id==$mk->id?'selected':'' }}>{{ $mk->nama }}</option>
                @endforeach
            </select>
            <select name="dosen_id" class="border p-2" required>
                @foreach(\App\Models\Dosen::all() as $d)
                    <option value="{{ $d->id }}" {{ $jadwal->dosen_id==$d->id?'selected':'' }}>{{ $d->nama }}</option>
                @endforeach
            </select>

            <select name="ruang_id" class="border p-2">
                <option value="">Pilih Ruang</option>
                @foreach(\App\Models\Ruang::all() as $r) 
                    <option value="{{ $r->id }}" {{ $jadwal->ruang_id==$r->id?'selected':'' }}>{{ $r->nama }}</option> 
                @endforeach
            </select>
            <select name="shift_id" class="border p-2">
                <option value="">Pilih Shift</option>
                @foreach(\App\Models\Shift::all() as $s) 
                    <option value="{{ $s->id }}" {{ $jadwal->shift_id==$s->id?'selected':'' }}>{{ $s->nama }}</option>
                @endforeach
            </select>

            <input name="waktu_selesai" value="{{ $jadwal->waktu_selesai }}" class="border p-2">
            <input name="keterangan" value="{{ $jadwal->keterangan }}" class="border p-2">
        </div>

        <div class="mt-3">
            <button class="bg-indigo-600 text-white px-3 py-2 rounded">Update</button>
            <a href="{{ route('jadwal.index') }}" class="ml-2">Batal</a>
        </div>
    </form>
</div>
@endsection
