<div class="container">
    <div class="flex flex-col md:flex-row gap-4 justify-center transition-all duration-300 ease-in-out">
        <input placeholder="Cari data berdasarkan nama / nik / nisn..." name="search" id="search"
            wire:model.live="search"
            class="transition-all duration-500 ease-in-out appearance-none h-10 rounded-[10px] border border-gray-400 border-b block pl-3 pr-6 py-2 w-full md:w-1/3 bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
        @if (auth()->user()->hasAnyRole([1]))
            <a href="{{ url('ppdb/excel-export') }}"
                class="bg-blue-400 rounded-[10px] p-2 flex gap-2 hover:bg-blue-500 text-white justify-center"><svg
                    xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor"
                    class="bi bi-file-earmark-spreadsheet " viewBox="0 0 16 16">
                    <path
                        d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                </svg>Download Data
            </a>
        @endif
    </div>
    <ul>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal transition-all duration-300 ease-in-out">
                    <thead>
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No Daftar</th>
                                <th
                                    class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Siswa</th>
                                <th
                                    class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    L/K</th>
                                <th
                                    class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    NISN</th>
                                <th
                                    class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    NIK</th>
                                <th
                                    class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Asal Sekolah</th>
                                <th
                                    class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            @php
                                $Nikbackground = strlen($student->nik) < 16 ? 'bg-red-200' : 'bg-green-100';
                                $Nisnbackground = strlen($student->nisn) < 10 ? 'bg-red-200' : 'bg-green-100';
                            @endphp
                            <tr class="border-b">
                                <td class="px-3 py-2 border-gray-200 bg-white text-sm">
                                    <div class="flex justify-center">
                                        <div class="ml-3">
                                            <p
                                                class="whitespace-no-wrap {{ $student->id == $maxId ? 'text-blue-700 bg-blue-200 font-bold p-2 rounded-full relative' : 'text-gray-900' }}">
                                                {{ $student->id }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-2 border-gray-200 bg-white text-sm">
                                    <p
                                        class="whitespace-no-wrap {{ $student->id == $maxId ? 'text-blue-700 bg-blue-200 p-2 font-bold rounded-full text-center shadow-md' : 'text-gray-900' }}">
                                        {{ $student->nama_siswa }}</p>
                                </td>
                                <td class="px-3 py-2 border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $student->jenis_kelamin }}
                                    </p>
                                </td>
                                <td class="px-3 py-2 border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 rounded-full {{ $Nisnbackground }}"></span>
                                        <span class="relative">{{ $student->nisn }}</span>
                                    </span>
                                </td>
                                <td class="px-3 py-2 border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 rounded-full {{ $Nikbackground }}"></span>
                                        <span class="relative">{{ $student->nik }}</span>
                                    </span>
                                </td>
                                <td class="px-3 py-2 border-gray-200 bg-white text-sm">
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 rounded-full"></span>
                                        <span class="relative">{{ $student->asal_sekolah }}</span>
                                    </span>
                                </td>
                                <td class="px-3 py-2 border-gray-200 bg-white text-sm">
                                    <div class="flex flex-wrap gap-2">
                                        <form action="{{ route('data-siswa.show', $student->slug) }}" method="GET">
                                            <button type="submit"
                                                class="px-3 py-2 rounded-md bg-blue-100 hover:bg-blue-200"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                        @if (auth()->user()->hasAnyRole([1, 2]))
                                            <form action="{{ route('data-siswa.edit', $student->slug) }}"
                                                method="GET">
                                                <button type="submit"
                                                    class="px-3 py-2 rounded-md bg-yellow-100 hover:bg-yellow-200"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <button onclick="showDeleteModal('{{ $student->slug }}')"
                                                class="px-3 py-2 rounded-md bg-red-100 hover:bg-red-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                    <div class="inline-flex mt-2 xs:mt-0 gap-3 pagination">
                        {{ $students->onEachSide(1)->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </ul>
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2">Konfirmasi Hapus</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">Apakah Anda yakin ingin menghapus data siswa ini? Tindakan ini
                        tidak
                        dapat dibatalkan.</p>
                </div>
                <div class="items-center px-4 py-3">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('delete')
                        <button type="button" onclick="hideDeleteModal()"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 mr-2">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan modal
        function showDeleteModal(slug) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            form.action = `{{ route('data-siswa.destroy', '') }}/${slug}`;
            modal.classList.remove('hidden');
        }

        // Fungsi untuk menyembunyikan modal
        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Tutup modal ketika klik di luar
        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target === modal) {
                hideDeleteModal();
            }
        }
    </script>
</div>
