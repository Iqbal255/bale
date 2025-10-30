@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-center">Jadwal Perkuliahan FKom 2025/2026 Ganjil</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 mb-3 rounded">{{ session('success') }}</div>
    @endif

    <div class="mb-4 flex gap-3">
        <input id="searchInput" type="text" placeholder="Cari (hari, dosen, mata kuliah...)" class="border p-2 rounded w-1/3">
        <select id="filterDay" class="border p-2 rounded">
            <option value="">Semua Hari</option>
            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $d)
                <option value="{{ $d }}">{{ $d }}</option>
            @endforeach
        </select>

        @auth
        <a href="{{ route('jadwal.create') }}" class="ml-auto bg-indigo-600 text-white px-3 py-2 rounded">Tambah Jadwal</a>
        @endauth
    </div>

    <div class="overflow-auto bg-white rounded shadow p-4">
        <table id="jadwalTable" class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Hari</th>
                    <th class="p-2 border">Waktu</th>
                    <th class="p-2 border">Mata Kuliah</th>
                    <th class="p-2 border">Dosen</th>
                    <th class="p-2 border">Ruang</th>
                    <th class="p-2 border">Shift</th>
                    @auth
                    <th class="p-2 border">Aksi</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach($jadwals as $j)
                    <tr class="hover:bg-blue-50">
                        <td class="p-2 border">{{ $j->hari }}</td>
                        <td class="p-2 border">{{ $j->waktu_mulai }} {{ $j->waktu_selesai ? '- '.$j->waktu_selesai : '' }}</td>
                        <td class="p-2 border">{{ $j->mataKuliah->nama ?? '-' }}</td>
                        <td class="p-2 border">{{ $j->dosen->nama ?? '-' }}</td>
                        <td class="p-2 border">{{ $j->ruang->nama ?? '-' }}</td>
                        <td class="p-2 border">{{ $j->shift->nama ?? '-' }}</td>
                        @auth
                        <td class="p-2 border">
                            <a href="{{ route('jadwal.edit', $j) }}" class="text-indigo-600 mr-2">Edit</a>
                            <form action="{{ route('jadwal.destroy', $j) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus jadwal ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Hapus</button>
                            </form>
                        </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const filterDay = document.getElementById('filterDay');
    const rows = Array.from(document.querySelectorAll('#jadwalTable tbody tr'));

    function applyFilters() {
        const q = (searchInput.value || '').toLowerCase();
        const day = (filterDay.value || '').toLowerCase();

        rows.forEach(r => {
            const text = r.innerText.toLowerCase();
            const matchQ = !q || text.includes(q);
            const matchDay = !day || text.includes(day);
            r.style.display = (matchQ && matchDay) ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', applyFilters);
    filterDay.addEventListener('change', applyFilters);
</script>
@endsection
