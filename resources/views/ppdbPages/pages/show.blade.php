<div class="container">
    <h1>Data Siswa Tahun {{ $students->first()->periode }}</h1>
</div>
<div class="container">
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            No</th>
                        <th
                            class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nama Siswa</th>
                        <th
                            class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Asal Sekolah</th>
                        <th
                            class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Periode</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-3 py-2 border-gray-200 bg-white text-sm">{{ $loop->iteration }}</td>
                            <td class="px-3 py-2 border-gray-200 bg-white text-sm">{{ $student->nama_siswa }}</td>
                            <td class="px-3 py-2 border-gray-200 bg-white text-sm">{{ $student->asal_sekolah }}</td>
                            <td class="px-3 py-2 border-gray-200 bg-white text-sm">{{ $student->periode }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4"
                            class="px-5 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Dst...</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
