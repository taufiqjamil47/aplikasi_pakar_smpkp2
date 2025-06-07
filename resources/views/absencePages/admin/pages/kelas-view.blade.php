@extends('absencePages.admin.layouts.index')
@section('content')
    {{-- main content --}}
    <div class="min-h-screen bg-gray-50 py-6 px-2 sm:px-4 lg:px-6 page-transition" id="main-page">
        <div class="w-full mx-auto">
            <div class="pt-4 border-t border-gray-200 flex mb-5 justify-between">
                <a href="{{ route('dashboard.pengelolaan') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white {{ $totalSiswa > 40 ? 'bg-red-600 hover:bg-red-700' : 'bg-indigo-600 hover:bg-indigo-700' }} focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Pengelolaan
                </a>
                @if ($totalSiswa > 50)
                    <div class="text-red-600 text-center mt-2 font-medium">
                        Kapasitas maksimal kelas telah terlampaui. Fitur ini sementara dinonaktifkan.
                    </div>
                @endif
            </div>

            <!-- Additional Stats (optional) -->
            <div class="mb-6 grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Jumlah Siswa
                                </dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">
                                        {{ $totalSiswa }} Siswa
                                    </div>
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 {{ $totalSiswa > 40 ? 'bg-red-500' : 'bg-green-500' }} rounded-md p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Kapasitas Kelas
                                </dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">
                                        {{ $totalSiswa }} {{ $totalSiswa > 40 ? '(Penuh)' : '' }}
                                    </div>
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <!-- Card Header -->
                <div class="grid grid-cols-1 gap-6 mb-4">
                    <div
                        class="bg-gradient-to-r {{ $totalSiswa > 40 ? 'from-rose-500 to-red-700' : 'from-blue-500 to-indigo-600' }} px-6 py-3">
                        <h2 class="text-2xl font-bold text-white">Tambah Siswa ke {{ $kelas->nama_kelas }}</h2>
                        <p class="{{ $totalSiswa > 40 ? 'text-red-100' : 'text-blue-100' }} mt-1">
                            Tambahkan siswa di kolom <b>Daftar Siswa</b> di bawah ke kolom
                            <strong>{{ $kelas->nama_kelas }}</strong>
                            untuk menambahkan, gunakan fitur <em>drag-and-drop</em> dengan mudah memindahkan siswa ke
                            kelas ini secara
                            interaktif dan efisien.
                        </p>
                    </div>

                    <!-- Card Body -->
                    {{-- <div class="p-4 space-y-2">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-500 uppercase tracking-wider">Nama
                                Kelas</label>
                            <div class="mt-1 p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <p class="text-lg font-semibold text-gray-800">{{ $kelas->nama_kelas }}</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-500 uppercase tracking-wider">Wali
                                Kelas</label>
                            <div class="mt-1 p-3 bg-gray-50 rounded-lg border border-gray-200 flex items-center space-x-3">
                                <div
                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                    <span
                                        class="text-indigo-600 font-medium">{{ substr($kelas->teacher->nama_guru, 0, 1) }}</span>
                                </div>
                                <p class="text-lg font-semibold text-gray-800">{{ $kelas->teacher->nama_guru }}</p>
                            </div>
                        </div>
                    </div> --}}
                </div>


                {{-- Penambahan Siswa pada kelas --}}
                <div
                    class="pt-4 flex flex-col md:flex-row gap-6 {{ $totalSiswa > 50 ? 'pointer-events-none opacity-50' : '' }}">
                    <!-- Daftar Siswa (Kiri) -->
                    <div class="w-full md:w-1/2">
                        <div
                            class="bg-gray-50 border border-l-1 lg:border-l-0 lg:rounded-tr-lg rounded-tr-none rounded-br-none lg:rounded-br-lg  p-4 h-full">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="font-medium text-gray-700">Daftar Siswa</h4>
                                <div class="relative">
                                    <input id="search-student" type="text" placeholder="isi Nama / id Siswa ..."
                                        class="pl-8 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 absolute left-2.5 top-2.5 text-gray-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>

                            {{-- Student List --}}
                            <div id="student-list" class="space-y-2 max-h-96 overflow-y-auto">
                                @foreach ($belumBerkelas as $siswa)
                                    <div class="student-item draggable bg-white p-3 rounded-lg shadow-sm flex justify-between items-center"
                                        draggable="true" data-id="{{ $siswa->id }}"
                                        data-name="{{ $siswa->nama_siswa }}">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="bg-indigo-100 text-indigo-700 h-10 w-10 rounded-full flex items-center justify-center font-medium">
                                                {{ substr($siswa->nama_siswa, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-medium">{{ $siswa->nama_siswa }}</p>
                                                <p class="text-xs text-gray-500">ID: {{ $siswa->id }}</p>
                                            </div>
                                        </div>
                                        <div class="text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                            </svg>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-4 text-sm text-gray-500 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Drag siswa ke kelas yang diinginkan</span>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Kelas (Kanan) -->
                    <div class="w-full md:w-1/2 mt-4 md:mt-0">
                        <div
                            class="bg-gray-50 p-4 h-full border border-r-1 lg:border-r-0 rounded-tl-none lg:rounded-tl-lg rounded-bl-none lg:rounded-bl-lg">
                            <div class="space-y-4 max-h-[30rem] overflow-y-auto">
                                <div class="bg-white p-4 rounded-lg shadow-sm">
                                    <div class="flex justify-between items-center mb-3">
                                        <div>
                                            <h5 class="font-medium text-2xl">{{ $kelas->nama_kelas }}</h5>
                                            <p class="text-xs text-gray-500">ID: KLS-{{ $kelas->id }}</p>
                                        </div>
                                        <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">Wali
                                            Kelas:
                                            {{ $kelas->teacher->nama_guru }}</span>
                                    </div>
                                    <div id="class-drop-zone"
                                        class="drop-zone border border-dashed border-gray-300 rounded-lg p-3 bg-gray-50 min-h-[120px]"
                                        data-class-id="{{ $kelas->id }}">
                                        <p class="text-center text-gray-400 text-sm py-2">Drop siswa di sini</p>
                                        <!-- Siswa yang di-drop akan muncul di sini -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-6 flex justify-center {{ $totalSiswa > 50 ? 'pointer-events-none opacity-50' : '' }}">
                    <button id="saveDragDropBtn"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
