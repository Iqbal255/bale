<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lihat Jadwal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-2xl font-bold mb-4">Jadwal Perkuliahan FKom 2025/2026 Ganjil</h1>

                    <!-- Filter -->
                    <div class="mb-4 flex space-x-2">
                        <input type="text" id="searchInput" placeholder="Cari (hari, dosen, mata kuliah)" 
                            class="border rounded-md px-3 py-2 w-1/2 text-sm text-gray-700 dark:bg-gray-700 dark:text-white">
                        <select id="filterDay" class="border rounded-md px-3 py-2 text-sm text-gray-700 dark:bg-gray-700 dark:text-white">
                            <option value="">Semua Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300 dark:border-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border text-left">Hari</th>
                                    <th class="px-4 py-2 border text-left">Waktu</th>
                                    <th class="px-4 py-2 border text-left">Mata Kuliah</th>
                                    <th class="px-4 py-2 border text-left">Dosen</th>
                                    <th class="px-4 py-2 border text-left">Ruang</th>
                                    <th class="px-4 py-2 border text-left">Shift</th>
                                </tr>
                            </thead>
                            <tbody id="jadwalTable">
                                <tr>
                                    <td class="border px-4 py-2">Senin</td>
                                    <td class="border px-4 py-2">07:30:00 - 10:00:00</td>
                                    <td class="border px-4 py-2">Pemrograman Web</td>
                                    <td class="border px-4 py-2">Dr. Latifah Wulandari, S.E., M.M.</td>
                                    <td class="border px-4 py-2">-</td>
                                    <td class="border px-4 py-2">S1 SI</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">Senin</td>
                                    <td class="border px-4 py-2">07:30:00 - 10:00:00</td>
                                    <td class="border px-4 py-2">Basis Data</td>
                                    <td class="border px-4 py-2">Armansyah Sarusu, S.Sos., M.M.</td>
                                    <td class="border px-4 py-2">A205</td>
                                    <td class="border px-4 py-2">S1 BD A</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">Senin</td>
                                    <td class="border px-4 py-2">09:00:00 - 10:40:00</td>
                                    <td class="border px-4 py-2">Struktur Data</td>
                                    <td class="border px-4 py-2">Dr. Yudhy, M.Ag</td>
                                    <td class="border px-4 py-2">A204</td>
                                    <td class="border px-4 py-2">S1 SI</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">Selasa</td>
                                    <td class="border px-4 py-2">07:30:00 - 10:00:00</td>
                                    <td class="border px-4 py-2">Rekayasa Perangkat Lunak</td>
                                    <td class="border px-4 py-2">Dr. Latifah Wulandari, S.E., M.M.</td>
                                    <td class="border px-4 py-2">B303</td>
                                    <td class="border px-4 py-2">D3 KA</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">Selasa</td>
                                    <td class="border px-4 py-2">14:10:00 - 15:50:00</td>
                                    <td class="border px-4 py-2">Kecerdasan Buatan</td>
                                    <td class="border px-4 py-2">Riyadh Ahsanul Arifin, M.Pd.</td>
                                    <td class="border px-4 py-2">A210</td>
                                    <td class="border px-4 py-2">D3 KA</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">Selasa</td>
                                    <td class="border px-4 py-2">14:50:00 - 16:30:00</td>
                                    <td class="border px-4 py-2">Jaringan Komputer</td>
                                    <td class="border px-4 py-2">Nova Indrayana Yusman, M.Kom.</td>
                                    <td class="border px-4 py-2">Lab Jaringan</td>
                                    <td class="border px-4 py-2">S1 SI</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">Rabu</td>
                                    <td class="border px-4 py-2">08:20:00 - 10:00:00</td>
                                    <td class="border px-4 py-2">Kecerdasan Buatan</td>
                                    <td class="border px-4 py-2">Iin, M.Kom.</td>
                                    <td class="border px-4 py-2">B301</td>
                                    <td class="border px-4 py-2">S1 SI</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">Rabu</td>
                                    <td class="border px-4 py-2">10:10:00 - 11:00:00</td>
                                    <td class="border px-4 py-2">Struktur Data</td>
                                    <td class="border px-4 py-2">Haekal Pirous, S.T., M.A.B.</td>
                                    <td class="border px-4 py-2">AULA</td>
                                    <td class="border px-4 py-2">S1 SI</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">Rabu</td>
                                    <td class="border px-4 py-2">13:00:00 - 15:30:00</td>
                                    <td class="border px-4 py-2">Basis Data</td>
                                    <td class="border px-4 py-2">Dr. Latifah Wulandari, S.E., M.M.</td>
                                    <td class="border px-4 py-2">B303</td>
                                    <td class="border px-4 py-2">S1 SI</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const filterDay = document.getElementById('filterDay');
        const tableRows = document.querySelectorAll('#jadwalTable tr');

        function applyFilters() {
            const searchText = searchInput.value.toLowerCase();
            const selectedDay = filterDay.value;

            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                const matchesSearch = rowText.includes(searchText);
                const matchesDay = !selectedDay || rowText.includes(selectedDay.toLowerCase());
                row.style.display = (matchesSearch && matchesDay) ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', applyFilters);
        filterDay.addEventListener('change', applyFilters);
    </script>
</x-app-layout>
