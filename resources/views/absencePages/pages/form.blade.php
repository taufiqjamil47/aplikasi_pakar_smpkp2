<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Absensi Hari Ini</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        @media (max-width: 650px) {
            table {
                border: 0;
            }

            thead {
                display: none;
            }

            /* .mobile-stack td::before {
                content: attr(data-label);
                font-weight: 600;
                color: #4b5563;
                text-transform: uppercase;
            } */

            .mobile-stack td {
                display: flex;
                justify-content: space-between;
                padding: 0.5rem 0;
                text-align: left;
                font-size: 0.875rem;
                /* Tailwind text-sm */
            }

            .mobile-stack tr {
                display: block;
                margin-bottom: 1.5rem;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                padding: 1rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                background-color: white;
            }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-2 py-8 max-w-6xl">
        <!-- Header Section -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8 card-hover fade-in">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Form Absensi</h1>
                    <p class="text-indigo-600 font-medium">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ date('d M Y') }}
                        </span>
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="flex items-center space-x-2">
                        <div class="h-3 w-3 rounded-full bg-green-500 animate-pulse"></div>
                        <span class="text-sm text-gray-600">Sistem Absensi Online</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Messages -->
        <div class="space-y-4 mb-8">
            @if (session('success'))
                <div
                    class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg animate__animated animate__fadeIn">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @php
                $isSigned = \App\Models\AbsensiSignature::where('tanggal', now()->toDateString())->exists();
            @endphp

            @if ($isSigned)
                <div
                    class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg animate__animated animate__fadeIn">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <p>Absensi hari ini sudah ditandatangani dan terkunci.</p>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div
                    class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg animate__animated animate__fadeIn">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
                            <p class="font-medium">Terdapat kesalahan:</p>
                            <ul class="list-disc list-inside mt-1">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Classroom Selection -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8 card-hover fade-in">
            <form method="GET" action="{{ route('absen.index') }}">
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:items-center md:space-x-4">
                    <label for="classroom" class="text-gray-700 font-medium whitespace-nowrap">Pilih Kelas:</label>
                    <select name="classroom_id" onchange="this.form.submit()" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}"
                                {{ $selectedClassroomId == $classroom->id ? 'selected' : '' }}>
                                {{ $classroom->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <!-- Attendance Form -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 card-hover fade-in">
            <form id="absensiForm" action="{{ route('absen.create') }}" method="POST">
                @csrf

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Siswa</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 mobile-stack">
                            @foreach ($students as $student)
                                <tr class="hover:bg-gray-50 transition duration-150 mobile-stack">
                                    {{-- Nama & Icon --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="flex flex-col gap-0 lg:flex-row lg:gap-4 items-center text-center w-full lg:w-50">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                                <span class="text-indigo-600 font-medium">
                                                    {{ substr($student->nama_siswa, 0, 1) }}
                                                </span>
                                            </div>
                                            <div class="mt-2 content-center justify-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $student->nama_siswa }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-col items-center text-center w-full">
                                            <select name="absences[{{ $loop->index }}][status]" required
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                                                <option value="hadir" class="text-green-600">Hadir</option>
                                                <option value="izin" class="text-yellow-600">Izin</option>
                                                <option value="sakit" class="text-blue-600">Sakit</option>
                                                <option value="alfa" class="text-red-600">Alfa</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="absences[{{ $loop->index }}][student_id]"
                                            value="{{ $student->id }}">
                                    </td>

                                    {{-- Keterangan --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex flex-col items-center text-center w-full">
                                            <input type="text" name="absences[{{ $loop->index }}][keterangan]"
                                                maxlength="255" placeholder="Keterangan..."
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div
                    class="mt-8 pt-6 border-t border-gray-200 flex flex-col space-y-4 md:space-y-0 md:flex-row md:justify-between md:items-center">
                    <input type="hidden" name="signed" value="0" id="signed-status">

                    <button type="submit" id="btnSimpan"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Simpan Absensi
                    </button>

                    <button type="button" onclick="confirmSignature()" id="btnTandaTangan"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Tanda Tangan & Sepakati
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function confirmSignature() {
            if (confirm(
                    "⚠️ PERINGATAN!\n\nSetelah menekan tombol ini, absensi akan dikunci dan dianggap final.\nPastikan semua data sudah benar.\n\nLanjutkan tanda tangan?"
                )) {
                // Ubah hidden field ke 1 (artinya: mau tanda tangan)
                document.getElementById('signed-status').value = 1;

                // Disable tombol agar tidak bisa klik ulang
                document.getElementById('btnTandaTangan').disabled = true;
                document.getElementById('btnSimpan').disabled = true;

                // Add loading state
                const btn = document.getElementById('btnTandaTangan');
                btn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Memproses...
                `;

                // Submit form
                document.getElementById('absensiForm').submit();
            }
        }

        // Add fade-in animation to elements
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.fade-in');
            elements.forEach((el, index) => {
                el.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>

</html>
