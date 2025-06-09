@extends('absencePages.admin.layouts.index')
@section('content')
    <div class="container mx-auto px-4 py-4">

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            <!-- Pendaftar Card -->
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-red-500 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Siswa belum memiliki Kelas</p>
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

            <!-- Diterima Card -->
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Keseluruhan Kelas</p>
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
        </div>

        <!-- Main Content Area -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Applications -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow p-6 card-hover">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Daftar Kelas Tersedia</h3>
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
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $kls->students_count > 40 ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">{{ $kls->students_count > 40 ? 'Penuh' : 'Masih Kosong' }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('dashboard.show', $kls->id) }}"
                                            class="text-primary-600 hover:text-primary-900">Kelola</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
