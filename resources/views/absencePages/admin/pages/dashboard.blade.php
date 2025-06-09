@extends('absencePages.admin.layouts.index')
@section('content')
    <div class="container mx-auto px-4 py-4">
        <!-- Welcome Banner -->
        <div
            class="bg-gradient-to-r from-primary-600 to-primary-800 text-white rounded-xl p-6 mb-4 relative overflow-hidden card-hover">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full"></div>
            <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-white/5 rounded-full"></div>

            <div class="relative z-10">
                <h2 class="text-2xl md:text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}</h2>
                <p class="text-primary-100 max-w-2xl">Anda masuk sebagai {{ Auth::user()->role_name }} pada Attendance System
                    (PAKAR.attendance)
                    Online SMP KP 2
                    Majalaya</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-4">
            <!-- Pendaftar Card -->
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Jumlah Siswa</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $totalSiswa }}</h3>
                    </div>
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Diterima Card -->
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Jumlah Kelas</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $jumlahRombel }}</h3>
                    </div>
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <!-- Ikon ruangan atau kelas (ikon bangunan/gedung) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10l9-7 9 7v10a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4H9v4a2 2 0 01-2 2H5a2 2 0 01-2-2V10z" />
                        </svg>
                    </div>
                </div>
            </div>

            {{-- Siswa belum memiliki kelas --}}
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-red-500 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Belum memiliki kelas</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $belumBerkelas }}</h3>
                    </div>
                    <div class="p-3 rounded-full bg-red-100 text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <!-- Recent Applications -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow p-6 card-hover">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Daftar Kelas</h3>
                    <a href="#" class="text-primary-600 hover:text-primary-800 text-sm font-medium">Lihat
                        Semua</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Kelas</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total Siswa</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Wali Kelas</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col" class="relative px-6 py-3"><span class="sr-only">Aksi</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($kelas as $kls)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-8 w-8">
                                                <img class="h-8 w-8 rounded-full"
                                                    src="https://ui-avatars.com/api/?name={{ $kls->nama_kelas }}&background=random"
                                                    alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $kls->nama_kelas }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $kls->students_count }} Siswa</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $kls->teacher->nama_guru }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-primary-600 hover:text-primary-900">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow p-6 card-hover">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Aksi Cepat</h3>

                <div class="space-y-4">
                    <a href="#"
                        class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Tambah Kelas Baru</h4>
                            <p class="text-sm text-gray-500">Tambahkan kelas secara manual</p>
                        </div>
                    </a>

                    <a href="#"
                        class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Impor Data</h4>
                            <p class="text-sm text-gray-500">Impor data siswa dari Excel</p>
                        </div>
                    </a>

                    <a href="#"
                        class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Ekspor Data</h4>
                            <p class="text-sm text-gray-500">Ekspor data ke format Excel</p>
                        </div>
                    </a>

                    <a href="#"
                        class="flex items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-colors">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.532 1.532 0 012.286.948c1.372-.836 2.942.734 2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-900">Pengaturan</h4>
                            <p class="text-sm text-gray-500">Kelola pengaturan sistem</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
