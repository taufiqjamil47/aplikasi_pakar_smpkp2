

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EduManage - Dashboard Administrasi Sekolah</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        
        .sidebar {
            transition: all 0.3s ease;
        }
        
        .card-stats {
            transition: all 0.3s ease;
        }
        
        .card-stats:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .nav-link {
            transition: all 0.2s ease;
            border-radius: 0.5rem;
        }
        
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .chart-container {
            position: relative;
            height: 250px;
            width: 100%;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            min-width: 200px;
            z-index: 50;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    </head>
    <body class="text-gray-800">
        <!-- Mobile Nav Toggle -->
        <div class="fixed top-4 left-4 z-50 block md:hidden">
            <button id="menu-toggle"
                class="p-2 bg-blue-600 rounded-md text-white">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="sidebar fixed top-0 left-0 h-full w-64 bg-gradient-to-b from-blue-700 to-blue-900 text-white z-40 shadow-lg overflow-y-auto">
            <div class="p-4">
                <div class="flex items-center justify-center mb-8 pt-4">
                    <i class="fas fa-school text-3xl mr-2"></i>
                    <h1 class="text-xl font-bold">EduManage</h1>
                </div>

                <div class="space-y-1">
                    <p
                        class="text-xs text-gray-300 uppercase font-semibold mb-2 pl-2">Menu
                        Utama</p>
                    <a href="#dashboard"
                        class="nav-link active flex items-center p-3 text-sm">
                        <i class="fas fa-tachometer-alt w-6"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#siswa"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-user-graduate w-6"></i>
                        <span>Manajemen Siswa</span>
                    </a>
                    <a href="#guru"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-chalkboard-teacher w-6"></i>
                        <span>Manajemen Guru</span>
                    </a>
                    <a href="#kelas"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-door-open w-6"></i>
                        <span>Manajemen Kelas</span>
                    </a>
                    <a href="#jadwal"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-calendar-alt w-6"></i>
                        <span>Jadwal Pelajaran</span>
                    </a>

                    <p
                        class="text-xs text-gray-300 uppercase font-semibold mb-2 mt-6 pl-2">Akademik</p>
                    <a href="#nilai"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-chart-line w-6"></i>
                        <span>Nilai & Rapor</span>
                    </a>
                    <a href="#absensi"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-clipboard-check w-6"></i>
                        <span>Absensi</span>
                    </a>
                    <a href="#ujian"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-file-alt w-6"></i>
                        <span>Ujian & Tugas</span>
                    </a>

                    <p
                        class="text-xs text-gray-300 uppercase font-semibold mb-2 mt-6 pl-2">Administrasi</p>
                    <a href="#keuangan"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-money-bill-wave w-6"></i>
                        <span>Keuangan</span>
                    </a>
                    <a href="#inventaris"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-boxes w-6"></i>
                        <span>Inventaris</span>
                    </a>
                    <a href="#perpustakaan"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-book w-6"></i>
                        <span>Perpustakaan</span>
                    </a>

                    <p
                        class="text-xs text-gray-300 uppercase font-semibold mb-2 mt-6 pl-2">Lainnya</p>
                    <a href="#pengumuman"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-bullhorn w-6"></i>
                        <span>Pengumuman</span>
                    </a>
                    <a href="#kegiatan"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-calendar-day w-6"></i>
                        <span>Kegiatan</span>
                    </a>
                    <a href="#laporan"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-file-pdf w-6"></i>
                        <span>Laporan</span>
                    </a>
                    <a href="#pengaturan"
                        class="nav-link flex items-center p-3 text-sm">
                        <i class="fas fa-cog w-6"></i>
                        <span>Pengaturan</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main
            class="ml-0 md:ml-64 min-h-screen transition-all duration-300 animate-fadeIn">
            <!-- Top Navigation -->
            <nav class="bg-white shadow-md p-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <h2
                            class="text-xl font-semibold text-gray-800">Dashboard</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative dropdown">
                            <button
                                class="p-2 bg-gray-100 rounded-full hover:bg-gray-200">
                                <i class="fas fa-bell text-gray-600"></i>
                                <span
                                    class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                            </button>
                            <div
                                class="dropdown-content bg-white shadow-lg rounded-md mt-2 py-2 animate-fadeIn">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-sm font-medium">Pengumuman:
                                        Rapat Guru</p>
                                    <p class="text-xs text-gray-500">Hari ini,
                                        14:00 WIB</p>
                                </div>
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-sm font-medium">Pembayaran
                                        SPP Jatuh Tempo</p>
                                    <p class="text-xs text-gray-500">10 siswa
                                        belum membayar</p>
                                </div>
                                <div class="px-4 py-2">
                                    <p class="text-sm font-medium">Jadwal Ujian
                                        Diperbarui</p>
                                    <p class="text-xs text-gray-500">2 jam yang
                                        lalu</p>
                                </div>
                                <div
                                    class="px-4 py-2 text-center border-t border-gray-100">
                                    <a href="#"
                                        class="text-blue-600 text-sm">Lihat
                                        semua notifikasi</a>
                                </div>
                            </div>
                        </div>
                        <div class="relative dropdown">
                            <div
                                class="flex items-center space-x-2 cursor-pointer">
                                <div
                                    class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white">
                                    <span>AS</span>
                                </div>
                                <span class="hidden md:block">Admin
                                    Sekolah</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                            <div
                                class="dropdown-content bg-white shadow-lg rounded-md mt-2 py-2 animate-fadeIn">
                                <a href="#"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i> Profil
                                </a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm hover:bg-gray-100">
                                    <i class="fas fa-cog mr-2"></i> Pengaturan
                                </a>
                                <div
                                    class="border-t border-gray-100 my-1"></div>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Keluar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Welcome Banner -->
                <div
                    class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow-md p-6 text-white mb-6">
                    <div
                        class="flex flex-col md:flex-row justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold mb-2">Selamat Datang,
                                Admin!</h2>
                            <p class="mb-4">Selamat datang di dashboard
                                administrasi sekolah. Kelola semua kebutuhan
                                sekolah Anda dengan mudah.</p>
                            <button
                                class="bg-white text-blue-600 px-4 py-2 rounded-md font-medium hover:bg-blue-50 transition">
                                <i class="fas fa-book-open mr-2"></i> Panduan
                                Penggunaan
                            </button>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <svg class="w-48 h-48" viewBox="0 0 200 200"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="rgba(255, 255, 255, 0.2)"
                                    d="M45.7,-52.2C59.9,-41.6,72.3,-27.7,76.2,-11.4C80.1,4.9,75.5,23.5,65.3,37.7C55.1,51.9,39.2,61.6,22.4,66.2C5.6,70.8,-12.1,70.3,-28.4,64.5C-44.7,58.7,-59.5,47.7,-67.4,32.8C-75.2,17.9,-76.1,-0.9,-70.3,-16.8C-64.5,-32.7,-52,-45.7,-38,-54.3C-24,-62.9,-8.5,-67.1,6.4,-74.1C21.3,-81.1,42.6,-90.9,52.8,-83.1C63,-75.3,62.1,-50,45.7,-52.2Z"
                                    transform="translate(100 100)" />
                                <circle cx="100" cy="90" r="40"
                                    fill="rgba(255, 255, 255, 0.3)" />
                                <rect x="80" y="50" width="40" height="30"
                                    rx="5" fill="rgba(255, 255, 255, 0.3)" />
                                <path
                                    d="M70,130 L130,130 L130,140 C130,145 125,150 120,150 L80,150 C75,150 70,145 70,140 Z"
                                    fill="rgba(255, 255, 255, 0.3)" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div
                        class="card-stats bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total
                                    Siswa</p>
                                <h3 class="text-2xl font-bold">1,250</h3>
                                <p class="text-xs text-green-500 mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i> 5.3%
                                    dari bulan lalu
                                </p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i
                                    class="fas fa-user-graduate text-blue-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="card-stats bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total
                                    Guru</p>
                                <h3 class="text-2xl font-bold">87</h3>
                                <p class="text-xs text-green-500 mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i> 2.1%
                                    dari bulan lalu
                                </p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i
                                    class="fas fa-chalkboard-teacher text-green-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="card-stats bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Total
                                    Kelas</p>
                                <h3 class="text-2xl font-bold">42</h3>
                                <p class="text-xs text-gray-500 mt-2">
                                    <i class="fas fa-equals mr-1"></i> Sama
                                    dengan bulan lalu
                                </p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-full">
                                <i
                                    class="fas fa-door-open text-purple-500 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div
                        class="card-stats bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Pendapatan
                                    Bulan Ini</p>
                                <h3 class="text-2xl font-bold">Rp 125,4 Jt</h3>
                                <p class="text-xs text-red-500 mt-2">
                                    <i class="fas fa-arrow-down mr-1"></i> 1.2%
                                    dari bulan lalu
                                </p>
                            </div>
                            <div class="bg-yellow-100 p-3 rounded-full">
                                <i
                                    class="fas fa-money-bill-wave text-yellow-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts & Tables Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Chart 1: Kehadiran Siswa -->
                    <div class="bg-white rounded-lg shadow-md p-6 col-span-1">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">Kehadiran Siswa</h3>
                            <div class="dropdown">
                                <button
                                    class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div
                                    class="dropdown-content bg-white shadow-lg rounded-md py-2 w-32">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100">Minggu
                                        Ini</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100">Bulan
                                        Ini</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100">Semester
                                        Ini</a>
                                </div>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="attendanceChart"></canvas>
                        </div>
                    </div>

                    <!-- Chart 2: Performa Akademik -->
                    <div class="bg-white rounded-lg shadow-md p-6 col-span-1">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">Performa Akademik</h3>
                            <div class="dropdown">
                                <button
                                    class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div
                                    class="dropdown-content bg-white shadow-lg rounded-md py-2 w-32">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100">Matematika</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100">B.
                                        Indonesia</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100">IPA</a>
                                </div>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="academicChart"></canvas>
                        </div>
                    </div>

                    <!-- Chart 3: Keuangan -->
                    <div class="bg-white rounded-lg shadow-md p-6 col-span-1">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">Keuangan Sekolah</h3>
                            <div class="dropdown">
                                <button
                                    class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div
                                    class="dropdown-content bg-white shadow-lg rounded-md py-2 w-32">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100">Pemasukan</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100">Pengeluaran</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100">Semua</a>
                                </div>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="financeChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Tables Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Recent Students -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-6 bg-gray-50 border-b border-gray-100">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold">Siswa Terbaru</h3>
                                <a href="#"
                                    class="text-blue-600 text-sm hover:underline">Lihat
                                    Semua</a>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                    <span
                                                        class="text-blue-600 font-medium">RA</span>
                                                </div>
                                                <div class="ml-4">
                                                    <div
                                                        class="text-sm font-medium text-gray-900">Rizky
                                                        Aditya</div>
                                                    <div
                                                        class="text-sm text-gray-500">rizky.a@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="text-sm text-gray-900">XI
                                                IPA 2</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button
                                                class="text-blue-600 hover:text-blue-900 mr-3"><i
                                                    class="fas fa-eye"></i></button>
                                            <button
                                                class="text-gray-600 hover:text-gray-900"><i
                                                    class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 bg-pink-100 rounded-full flex items-center justify-center">
                                                    <span
                                                        class="text-pink-600 font-medium">SP</span>
                                                </div>
                                                <div class="ml-4">
                                                    <div
                                                        class="text-sm font-medium text-gray-900">Siti
                                                        Putri</div>
                                                    <div
                                                        class="text-sm text-gray-500">siti.p@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">X
                                                IPS 1</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button
                                                class="text-blue-600 hover:text-blue-900 mr-3"><i
                                                    class="fas fa-eye"></i></button>
                                            <button
                                                class="text-gray-600 hover:text-gray-900"><i
                                                    class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 bg-purple-100 rounded-full flex items-center justify-center">
                                                    <span
                                                        class="text-purple-600 font-medium">BW</span>
                                                </div>
                                                <div class="ml-4">
                                                    <div
                                                        class="text-sm font-medium text-gray-900">Budi
                                                        Wibowo</div>
                                                    <div
                                                        class="text-sm text-gray-500">budi.w@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="text-sm text-gray-900">XII
                                                IPA 1</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Izin</span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button
                                                class="text-blue-600 hover:text-blue-900 mr-3"><i
                                                    class="fas fa-eye"></i></button>
                                            <button
                                                class="text-gray-600 hover:text-gray-900"><i
                                                    class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div
                                                    class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
                                                    <span
                                                        class="text-green-600 font-medium">DH</span>
                                                </div>
                                                <div class="ml-4">
                                                    <div
                                                        class="text-sm font-medium text-gray-900">Dewi
                                                        Handayani</div>
                                                    <div
                                                        class="text-sm text-gray-500">dewi.h@example.com</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="text-sm text-gray-900">XI
                                                IPS 3</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Sakit</span>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button
                                                class="text-blue-600 hover:text-blue-900 mr-3"><i
                                                    class="fas fa-eye"></i></button>
                                            <button
                                                class="text-gray-600 hover:text-gray-900"><i
                                                    class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Upcoming Events -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-6 bg-gray-50 border-b border-gray-100">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold">Kegiatan
                                    Mendatang</h3>
                                <a href="#"
                                    class="text-blue-600 text-sm hover:underline">Lihat
                                    Semua</a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600">
                                            <span
                                                class="font-semibold">15</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4
                                            class="text-lg font-medium text-gray-900">Rapat
                                            Guru</h4>
                                        <div
                                            class="mt-1 flex items-center text-sm text-gray-500">
                                            <i class="far fa-clock mr-1"></i>
                                            <p>14:00 - 16:00 WIB</p>
                                        </div>
                                        <div
                                            class="mt-1 flex items-center text-sm text-gray-500">
                                            <i
                                                class="fas fa-map-marker-alt mr-1"></i>
                                            <p>Ruang Rapat Utama</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-center h-12 w-12 rounded-md bg-green-100 text-green-600">
                                            <span
                                                class="font-semibold">18</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4
                                            class="text-lg font-medium text-gray-900">Ujian
                                            Tengah Semester</h4>
                                        <div
                                            class="mt-1 flex items-center text-sm text-gray-500">
                                            <i class="far fa-clock mr-1"></i>
                                            <p>08:00 - 12:00 WIB</p>
                                        </div>
                                        <div
                                            class="mt-1 flex items-center text-sm text-gray-500">
                                            <i
                                                class="fas fa-map-marker-alt mr-1"></i>
                                            <p>Semua Ruang Kelas</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-center h-12 w-12 rounded-md bg-purple-100 text-purple-600">
                                            <span
                                                class="font-semibold">22</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4
                                            class="text-lg font-medium text-gray-900">Perayaan
                                            Hari Pendidikan</h4>
                                        <div
                                            class="mt-1 flex items-center text-sm text-gray-500">
                                            <i class="far fa-clock mr-1"></i>
                                            <p>09:00 - 15:00 WIB</p>
                                        </div>
                                        <div
                                            class="mt-1 flex items-center text-sm text-gray-500">
                                            <i
                                                class="fas fa-map-marker-alt mr-1"></i>
                                            <p>Aula Sekolah</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-center h-12 w-12 rounded-md bg-yellow-100 text-yellow-600">
                                            <span
                                                class="font-semibold">25</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4
                                            class="text-lg font-medium text-gray-900">Pertemuan
                                            Orang Tua</h4>
                                        <div
                                            class="mt-1 flex items-center text-sm text-gray-500">
                                            <i class="far fa-clock mr-1"></i>
                                            <p>13:00 - 16:00 WIB</p>
                                        </div>
                                        <div
                                            class="mt-1 flex items-center text-sm text-gray-500">
                                            <i
                                                class="fas fa-map-marker-alt mr-1"></i>
                                            <p>Aula Sekolah</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Access & Announcements -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Quick Access -->
                    <div class="bg-white rounded-lg shadow-md p-6 col-span-1">
                        <h3 class="font-semibold mb-4">Akses Cepat</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="#"
                                class="flex flex-col items-center justify-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                                <div class="bg-blue-100 p-3 rounded-full mb-2">
                                    <i
                                        class="fas fa-user-plus text-blue-600"></i>
                                </div>
                                <span class="text-sm text-center">Tambah
                                    Siswa</span>
                            </a>
                            <a href="#"
                                class="flex flex-col items-center justify-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
                                <div class="bg-green-100 p-3 rounded-full mb-2">
                                    <i
                                        class="fas fa-chalkboard text-green-600"></i>
                                </div>
                                <span class="text-sm text-center">Tambah
                                    Kelas</span>
                            </a>
                            <a href="#"
                                class="flex flex-col items-center justify-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
                                <div
                                    class="bg-purple-100 p-3 rounded-full mb-2">
                                    <i
                                        class="fas fa-calendar-plus text-purple-600"></i>
                                </div>
                                <span class="text-sm text-center">Jadwal
                                    Baru</span>
                            </a>
                            <a href="#"
                                class="flex flex-col items-center justify-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition">
                                <div
                                    class="bg-yellow-100 p-3 rounded-full mb-2">
                                    <i
                                        class="fas fa-file-invoice text-yellow-600"></i>
                                </div>
                                <span class="text-sm text-center">Laporan
                                    SPP</span>
                            </a>
                            <a href="#"
                                class="flex flex-col items-center justify-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition">
                                <div class="bg-red-100 p-3 rounded-full mb-2">
                                    <i class="fas fa-bullhorn text-red-600"></i>
                                </div>
                                <span
                                    class="text-sm text-center">Pengumuman</span>
                            </a>
                            <a href="#"
                                class="flex flex-col items-center justify-center p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition">
                                <div
                                    class="bg-indigo-100 p-3 rounded-full mb-2">
                                    <i class="fas fa-cog text-indigo-600"></i>
                                </div>
                                <span
                                    class="text-sm text-center">Pengaturan</span>
                            </a>
                        </div>
                    </div>

                    <!-- Announcements -->
                    <div
                        class="bg-white rounded-lg shadow-md p-6 col-span-1 lg:col-span-2">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold">Pengumuman Terbaru</h3>
                            <button
                                class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700 transition">
                                <i class="fas fa-plus mr-1"></i> Buat Pengumuman
                            </button>
                        </div>
                        <div class="space-y-4">
                            <div class="border-l-4 border-blue-500 pl-4 py-1">
                                <h4 class="font-medium">Jadwal Ujian Akhir
                                    Semester</h4>
                                <p class="text-sm text-gray-600 mt-1">Jadwal
                                    ujian akhir semester telah dirilis. Silakan
                                    unduh jadwal di website sekolah atau lihat
                                    di papan pengumuman.</p>
                                <div
                                    class="flex items-center mt-2 text-xs text-gray-500">
                                    <span><i class="far fa-clock mr-1"></i> 2
                                        jam yang lalu</span>
                                    <span class="mx-2">•</span>
                                    <span>Oleh: Kepala Sekolah</span>
                                </div>
                            </div>

                            <div class="border-l-4 border-yellow-500 pl-4 py-1">
                                <h4 class="font-medium">Pembayaran SPP Bulan
                                    Juni</h4>
                                <p class="text-sm text-gray-600 mt-1">Diingatkan
                                    kepada seluruh siswa untuk melakukan
                                    pembayaran SPP bulan Juni paling lambat
                                    tanggal 15 Juni 2023.</p>
                                <div
                                    class="flex items-center mt-2 text-xs text-gray-500">
                                    <span><i class="far fa-clock mr-1"></i> 1
                                        hari yang lalu</span>
                                    <span class="mx-2">•</span>
                                    <span>Oleh: Bendahara Sekolah</span>
                                </div>
                            </div>

                            <div class="border-l-4 border-green-500 pl-4 py-1">
                                <h4 class="font-medium">Lomba Kebersihan
                                    Kelas</h4>
                                <p class="text-sm text-gray-600 mt-1">Dalam
                                    rangka Hari Lingkungan Hidup, sekolah akan
                                    mengadakan lomba kebersihan kelas pada
                                    tanggal 5 Juni 2023.</p>
                                <div
                                    class="flex items-center mt-2 text-xs text-gray-500">
                                    <span><i class="far fa-clock mr-1"></i> 2
                                        hari yang lalu</span>
                                    <span class="mx-2">•</span>
                                    <span>Oleh: Koordinator Kesiswaan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-white p-6 border-t">
                <div
                    class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-sm text-gray-600">
                        &copy; 2023 EduManage - Sistem Administrasi Sekolah
                    </div>
                    <div class="mt-4 md:mt-0">
                        <div class="flex space-x-4">
                            <a href="#"
                                class="text-gray-400 hover:text-gray-600">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#"
                                class="text-gray-400 hover:text-gray-600">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="text-gray-400 hover:text-gray-600">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#"
                                class="text-gray-400 hover:text-gray-600">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </main>

        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        // Mobile menu toggle
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('open');
        });
        
        // Navigation active state
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navLinks.forEach(item => item.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        // Charts
        document.addEventListener('DOMContentLoaded', function() {
            // Attendance Chart
            const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
            const attendanceChart = new Chart(attendanceCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Hadir', 'Izin', 'Sakit', 'Tanpa Keterangan'],
                    datasets: [{
                        data: [85, 5, 8, 2],
                        backgroundColor: [
                            '#3b82f6',
                            '#fbbf24',
                            '#ef4444',
                            '#9ca3af'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12,
                                padding: 15
                            }
                        }
                    },
                    cutout: '70%'
                }
            });
            
            // Academic Chart
            const academicCtx = document.getElementById('academicChart').getContext('2d');
            const academicChart = new Chart(academicCtx, {
                type: 'bar',
                data: {
                    labels: ['X', 'XI', 'XII'],
                    datasets: [{
                        label: 'Rata-rata Nilai',
                        data: [76, 82, 79],
                        backgroundColor: '#8b5cf6',
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            
            // Finance Chart
            const financeCtx = document.getElementById('financeChart').getContext('2d');
            const financeChart = new Chart(financeCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    datasets: [{
                        label: 'Pemasukan',
                        data: [120, 115, 125, 130, 125, 135],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        fill: true,
                        tension: 0.4
                    }, {
                        label: 'Pengeluaran',
                        data: [95, 100, 105, 110, 100, 115],
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value + ' jt';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
        <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'94d93aa89352409c',t:'MTc0OTU2MjI4OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
