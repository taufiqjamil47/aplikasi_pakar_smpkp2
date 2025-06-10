@extends('absencePages.admin.layouts.index')
@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-white">Laporan Kehadiran Siswa</h1>
                        <p class="text-blue-100 mt-1">Melacak dan Menganalisis kehadiran Siswa</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        @if (isset($reportData))
                            <button onclick="printReport()"
                                class="bg-white text-blue-700 px-4 py-2 rounded-lg font-medium hover:bg-blue-50 transition no-print">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                Print Report
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="p-6 bg-gray-50 border-b border-gray-200 no-print">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Report
                            Type</label>
                        <select id="reportType"
                            class="w-full rounded-md border-gray-300 shadow-sm px-3 py-2 bg-white border focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="semester">Semester</option>
                        </select>
                    </div>

                    <div id="weekSelector" class="block">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Week</label>
                        <select id="weekSelect"
                            class="w-full rounded-md border-gray-300 shadow-sm px-3 py-2 bg-white border focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @php
                                use Illuminate\Support\Carbon;
                                $totalWeeks = Carbon::now()->endOfMonth()->weekOfMonth;
                            @endphp
                            @for ($i = 1; $i <= $totalWeeks; $i++)
                                <option value="{{ $i }}">Week {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div id="monthSelector" class="hidden">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Month</label>
                        <select id="monthSelect"
                            class="w-full rounded-md border-gray-300 shadow-sm px-3 py-2 bg-white border focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}" {{ $month == now()->month ? 'selected' : '' }}>
                                    {{ now()->month($month)->format('F') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div id="semesterSelector" class="hidden">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
                        <select id="semesterSelect"
                            class="w-full rounded-md border-gray-300 shadow-sm px-3 py-2 bg-white border focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Class</label>
                        <select id="classSelect"
                            class="w-full rounded-md border-gray-300 shadow-sm px-3 py-2 bg-white border focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="all">All Classes</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}"
                                    {{ isset($class) && $class == $classroom->id ? 'selected' : '' }}>
                                    {{ $classroom->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-4 flex justify-end">
                    <button onclick="generateReport()"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium transition">
                        Generate Report
                    </button>
                </div>
            </div>

            <!-- Report Info -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col md:flex-row justify-between">
                    <div>
                        <h2 id="reportTitle" class="text-xl font-semibold text-gray-800">Laporan Kehadiran</h2>
                        <p id="reportPeriod" class="text-gray-600 mt-1">Week
                            1, 2023</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <p id="reportClass" class="text-gray-600">Kelas: Semua Kelas</p>
                        <p id="reportDate" class="text-gray-600">Generated:
                            <span id="currentDate"></span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Weekly Report Table -->
            <div id="weeklyReport" class="overflow-x-auto overflow-y-auto max-h-[580px]">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NISN</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kelas</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Mon</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tue</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Wed</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Thu</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fri</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Prosentase %</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="weeklyTableBody">
                        <!-- Weekly data will be inserted here -->
                    </tbody>
                </table>
            </div>

            <!-- Monthly Report Table -->
            <div id="monthlyReport" class="overflow-x-auto hidden overflow-y-auto max-h-[580px]">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NISN</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kelas</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Hadir</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Alfa</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Izin</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Sakit</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                %</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="monthlyTableBody">
                        <!-- Monthly data will be inserted here -->
                    </tbody>
                </table>
            </div>

            <!-- Semester Report Table -->
            <div id="semesterReport" class="overflow-x-auto hidden  overflow-y-auto max-h-[580px]">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                NISN</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kelas</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                                Hari</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Hadir</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Alfa</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Izin</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Sakit</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                %</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="semesterTableBody">
                        <!-- Semester data will be inserted here -->
                    </tbody>
                </table>
            </div>

            <!-- Summary -->
            <div class="p-6 bg-gray-50">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Ringkasan Kehadiran</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-white p-4 rounded-lg shadow border border-gray-100">
                        <div class="flex items-center">
                            <div class="rounded-full bg-green-100 p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Hadir</p>
                                <p id="presentCount" class="text-xl font-semibold">0</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow border border-gray-100">
                        <div class="flex items-center">
                            <div class="rounded-full bg-red-100 p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Alfa</p>
                                <p id="absentCount" class="text-xl font-semibold">0</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow border border-gray-100">
                        <div class="flex items-center">
                            <div class="rounded-full bg-yellow-100 p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Izin</p>
                                <p id="lateCount" class="text-xl font-semibold">0</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow border border-gray-100">
                        <div class="flex items-center">
                            <div class="rounded-full bg-indigo-100 p-3 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Sakit</p>
                                <p id="excusedCount" class="text-xl font-semibold">0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="flex items-center mb-2">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div id="attendanceProgressBar" class="bg-green-600 h-2.5 rounded-full" style="width: 0%">
                            </div>
                        </div>
                        <span id="attendancePercentage" class="ml-3 text-sm font-medium text-gray-700">0%</span>
                    </div>
                    <p class="text-sm text-gray-500">Tingkat kehadiran keseluruhan</p>
                </div>
            </div>

            <!-- Legend -->
            <div class="p-6 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Legend</h3>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center">
                        <div class="w-4 h-4 rounded attendance-present mr-2"></div>
                        <span class="text-sm text-gray-600">Hadir
                            (H)</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 rounded attendance-absent mr-2"></div>
                        <span class="text-sm text-gray-600">Alfa
                            (A)</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 rounded attendance-late mr-2"></div>
                        <span class="text-sm text-gray-600">Izin (I)</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 rounded attendance-excused mr-2"></div>
                        <span class="text-sm text-gray-600">Sakit
                            (S)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set current date
        document.getElementById('currentDate').textContent = new Date().toLocaleDateString('id-ID', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // Handle report type change
        document.getElementById('reportType').addEventListener('change', function() {
            const reportType = this.value;

            // Hide all selectors
            document.getElementById('weekSelector').classList.add('hidden');
            document.getElementById('monthSelector').classList.add('hidden');
            document.getElementById('semesterSelector').classList.add('hidden');

            // Show the appropriate selector
            if (reportType === 'weekly') {
                document.getElementById('weekSelector').classList.remove('hidden');
            } else if (reportType === 'monthly') {
                document.getElementById('monthSelector').classList.remove('hidden');
            } else if (reportType === 'semester') {
                document.getElementById('semesterSelector').classList.remove('hidden');
            }
        });

        // Generate report based on selected filters
        function generateReport() {
            const reportType = document.getElementById('reportType').value;
            const selectedClass = document.getElementById('classSelect').value;
            const week = document.getElementById('weekSelect').value;
            const month = document.getElementById('monthSelect').value;
            const semester = document.getElementById('semesterSelect').value;

            // Show loading state
            const generateBtn = document.querySelector('button[onclick="generateReport()"]');
            generateBtn.disabled = true;
            generateBtn.innerHTML = 'Generating...';

            // Prepare data for API request
            const data = {
                report_type: reportType,
                class: selectedClass,
                week: week,
                month: month,
                semester: semester
            };

            // Make API request
            fetch('{{ route('attendance.report.generate') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    // Hide all reports
                    document.getElementById('weeklyReport').classList.add('hidden');
                    document.getElementById('monthlyReport').classList.add('hidden');
                    document.getElementById('semesterReport').classList.add('hidden');

                    // Update report title and period
                    document.getElementById('reportTitle').textContent = data.report_title;
                    document.getElementById('reportPeriod').textContent = data.report_period;
                    document.getElementById('reportClass').textContent =
                        `Kelas: ${data.class === 'all' ? 'Semua Kelas' : data.class}`;

                    // Generate appropriate report
                    if (data.report_type === 'weekly') {
                        generateWeeklyReport(data);
                    } else if (data.report_type === 'monthly') {
                        generateMonthlyReport(data);
                    } else if (data.report_type === 'semester') {
                        generateSemesterReport(data);
                    }

                    // Update summary
                    updateSummary(
                        data.summary.present,
                        data.summary.absent,
                        data.summary.late,
                        data.summary.excused,
                        data.summary.total_days
                    );
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error generating report. Please try again.');
                })
                .finally(() => {
                    generateBtn.disabled = false;
                    generateBtn.innerHTML = 'Generate Report';
                });
        }

        // Generate weekly report
        function generateWeeklyReport(data) {
            const tableBody = document.getElementById('weeklyTableBody');
            tableBody.innerHTML = '';

            data.students.forEach((student, index) => {
                const row = document.createElement('tr');

                // Ambil 5 hari pertama (Senin-Jumat) dari attendance_by_day
                const days = [];
                const dayKeys = Object.keys(student.attendance_by_day || {});
                for (let i = 0; i < 5; i++) {
                    days.push(dayKeys[i] ? student.attendance_by_day[dayKeys[i]] : null);
                }

                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${index + 1}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${student.student_id}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${student.name}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${student.class}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center ${getAttendanceClass(days[0])}">${days[0] || '-'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center ${getAttendanceClass(days[1])}">${days[1] || '-'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center ${getAttendanceClass(days[2])}">${days[2] || '-'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center ${getAttendanceClass(days[3])}">${days[3] || '-'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center ${getAttendanceClass(days[4])}">${days[4] || '-'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ${student.attendance_percentage >= 90 ? 'text-green-600 bg-green-200' : student.attendance_percentage >= 75 ? 'text-yellow-600' : 'text-red-600'}">${student.attendance_percentage}%</td>
                `;
                tableBody.appendChild(row);
            });

            document.getElementById('weeklyReport').classList.remove('hidden');
        }

        // Generate monthly report
        function generateMonthlyReport(data) {
            const tableBody = document.getElementById('monthlyTableBody');
            tableBody.innerHTML = '';

            data.students.forEach((student, index) => {
                const row = document.createElement('tr');

                row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${index + 1}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${student.student_id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${student.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${student.class}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-green-600">${student.present}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-red-600">${student.absent}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-yellow-600">${student.late}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-indigo-600">${student.excused}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ${student.attendance_percentage >= 90 ? 'text-green-600' : student.attendance_percentage >= 75 ? 'text-yellow-600' : 'text-red-600'}">${student.attendance_percentage}%</td>
            `;

                tableBody.appendChild(row);
            });

            document.getElementById('monthlyReport').classList.remove('hidden');
        }

        // Generate semester report
        function generateSemesterReport(data) {
            const tableBody = document.getElementById('semesterTableBody');
            tableBody.innerHTML = '';

            data.students.forEach((student, index) => {
                const row = document.createElement('tr');

                row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${index + 1}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${student.student_id}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${student.name}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${student.class}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center">${student.total_days}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-green-600">${student.present}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-red-600">${student.absent}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-yellow-600">${student.late}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium text-indigo-600">${student.excused}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium ${student.attendance_percentage >= 90 ? 'text-green-600' : student.attendance_percentage >= 75 ? 'text-yellow-600' : 'text-red-600'}">${student.attendance_percentage}%</td>
            `;

                tableBody.appendChild(row);
            });

            document.getElementById('semesterReport').classList.remove('hidden');
        }

        // Update summary section
        function updateSummary(present, absent, late, excused, totalDays) {
            document.getElementById('presentCount').textContent = present;
            document.getElementById('absentCount').textContent = absent;
            document.getElementById('lateCount').textContent = late;
            document.getElementById('excusedCount').textContent = excused;

            const attendancePercentage = totalDays > 0 ? Math.round((present / totalDays) * 100) : 0;
            document.getElementById('attendanceProgressBar').style.width = `${attendancePercentage}%`;
            document.getElementById('attendancePercentage').textContent = `${attendancePercentage}%`;
        }

        // Helper function to get attendance status class
        function getAttendanceClass(status) {
            if (!status) return '';

            switch (status) {
                case 'H':
                    return 'attendance-present';
                case 'A':
                    return 'attendance-absent';
                case 'I':
                    return 'attendance-late';
                case 'S':
                    return 'attendance-excused';
                default:
                    return '';
            }
        }

        // Print report
        function printReport() {
            window.print();
        }

        // Generate initial report
        document.addEventListener('DOMContentLoaded', function() {
            generateReport();
        });
    </script>

    <script>
        (function() {
            function c() {
                var b = a.contentDocument || a.contentWindow.document;
                if (b) {
                    var d = b.createElement('script');
                    d.innerHTML =
                        "window.__CF$cv$params={r:'94c52717e5d13e5b',t:'MTc0OTM1MTc3MS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if (document.body) {
                var a = document.createElement('iframe');
                a.height = 1;
                a.width = 1;
                a.style.position = 'absolute';
                a.style.top = 0;
                a.style.left = 0;
                a.style.border = 'none';
                a.style.visibility = 'hidden';
                document.body.appendChild(a);
                if ('loading' !== document.readyState) c();
                else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
                else {
                    var e = document.onreadystatechange || function() {};
                    document.onreadystatechange = function(b) {
                        e(b);
                        'loading' !== document.readyState && (document.onreadystatechange = e, c())
                    }
                }
            }
        })();
    </script>
@endsection
