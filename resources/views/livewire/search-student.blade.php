<div class="container">
    <div class="flex flex-col md:flex-row gap-4">
        <input placeholder="Cari data berdasarkan nama / nik / nisn..." name="search" id="search"
            wire:model.live="search"
            class="appearance-none h-10 rounded-[10px] border border-gray-400 border-b block pl-8 pr-6 py-2 w-full md:w-1/3 bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
    </div>
    <ul>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No Urut</th>
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
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $student->id }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-2 border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $student->nama_siswa }}</p>
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
                                        <form action="{{ route('data-siswa.edit', $student->slug) }}" method="GET">
                                            <button type="submit"
                                                class="px-3 py-2 rounded-md bg-yellow-100 hover:bg-yellow-200"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('data-siswa.destroy', $student->slug) }}" method="POST"
                                            id="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="px-3 py-2 rounded-md bg-red-100 hover:bg-red-200"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                </svg>
                                            </button>
                                        </form>
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
</div>
