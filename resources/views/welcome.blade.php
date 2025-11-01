<!DOCTYPE html>
<html lang="id" class="transition-colors duration-300">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Aplikasi Jadwal Perkuliahan</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center h-screen text-gray-900 dark:text-gray-100 transition-colors duration-500 overflow-hidden">

    <div id="welcome-card"
        class="text-center bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-2xl w-[90%] sm:w-[500px] transform scale-95 opacity-0
               transition-all duration-700 ease-out">
        
        <div class="flex justify-end mb-4">
            <!-- Tombol Dark Mode -->
            <button id="darkModeToggle"
                class="text-sm bg-gray-200 dark:bg-gray-700 px-3 py-1 rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-300 transform hover:scale-105">
                🌞 / 🌙
            </button>
        </div>

        <h1 class="text-4xl font-extrabold text-blue-600 dark:text-blue-400 mb-3 animate-pulse">
            Selamat Datang 👋
        </h1>

        <p class="text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
            Aplikasi <strong>Jadwal Perkuliahan Fakultas Komputer</strong><br>
            Semester Ganjil 2025/2026.
        </p>

        <div class="space-x-3">
            <a href="{{ route('login') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:shadow-lg hover:bg-blue-600 dark:hover:bg-blue-500 transition-all duration-300 transform hover:-translate-y-1">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:shadow-lg hover:bg-green-600 dark:hover:bg-green-500 transition-all duration-300 transform hover:-translate-y-1">
                Daftar
            </a>
            <a href="{{ route('jadwal.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow-md hover:shadow-lg hover:bg-gray-600 dark:hover:bg-gray-500 transition-all duration-300 transform hover:-translate-y-1">
                Lihat Jadwal
            </a>
        </div>
    </div>

    <script>
        // Animasi fade-in di awal
        window.addEventListener('DOMContentLoaded', () => {
            const card = document.getElementById('welcome-card');
            setTimeout(() => {
                card.classList.remove('opacity-0', 'scale-95');
                card.classList.add('opacity-100', 'scale-100');
            }, 200);
        });

        // Dark Mode toggle
        const html = document.documentElement;
        const toggle = document.getElementById('darkModeToggle');

        if (localStorage.getItem('theme') === 'dark') {
            html.classList.add('dark');
        }

        toggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            if (html.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    </script>

</body>
</html>
