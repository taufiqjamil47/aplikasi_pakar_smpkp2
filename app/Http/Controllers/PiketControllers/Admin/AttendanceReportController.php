<?php

namespace App\Http\Controllers\PiketControllers\Admin;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceReportController extends Controller
{
    public function index()
    {
        $classrooms = ClassRoom::all();
        $totalSiswa = Student::count();
        return view('absencePages.admin.pages.report-kehadiran', compact('classrooms', 'totalSiswa'));
    }

    public function generateReport(Request $request)
    {
        $reportType = $request->input('report_type', 'weekly');
        $class = $request->input('class', 'all');
        $week = (int) $request->input('week', 1);
        $month = (int) $request->input('month', date('n'));
        $semester = $request->input('semester', 1);

        // Query dasar
        $query = Student::with(['absensi', 'classroom']);

        // Filter kelas jika dipilih
        if ($class !== 'all') {
            $query->where('classroom_id', $class);
        }

        $students = $query->get();

        $reportData = [];
        $summary = [
            'present' => 0,
            'absent' => 0,
            'late' => 0,
            'excused' => 0,
            'total_days' => 0
        ];

        foreach ($students as $student) {
            $absensiQuery = $student->absensi();

            // Filter berdasarkan periode laporan
            if ($reportType === 'weekly') {
                $year = Carbon::now()->year;
                $month = Carbon::now()->month;

                $firstDayOfMonth = Carbon::create($year, $month, 1);
                $firstMonday = $firstDayOfMonth->copy()->next(Carbon::MONDAY); // Senin pertama

                // Jika 1 Juni itu sendiri adalah Senin, jangan loncat ke minggu berikutnya
                if ($firstDayOfMonth->isMonday()) {
                    $firstMonday = $firstDayOfMonth->copy();
                }

                $startDate = $firstMonday->copy()->addWeeks($week - 1);
                $endDate = $startDate->copy()->endOfWeek();

                // Batasi agar tetap dalam bulan
                if ($startDate->month != $month) {
                    $startDate = Carbon::create($year, $month, 1);
                }
                if ($endDate->month != $month) {
                    $endDate = Carbon::create($year, $month, 1)->endOfMonth();
                }

                $absensiQuery->whereBetween('tanggal', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')]);

                // Log::debug('Tanggal Mulai :' . $startDate . 'Tanggal akhir :' . $endDate);
                // Get attendance by day
                $daysOfWeek = [];
                $currentDay = $startDate->copy();
                while ($currentDay <= $endDate) {
                    $daysOfWeek[$currentDay->format('Y-m-d')] = []; // Inisialisasi array
                    $currentDay->addDay();
                }

                $studentData['attendance_by_day'] = [];
                foreach ($daysOfWeek as $day => $value) {
                    $dayAttendance = $student->absensi()->whereDate('tanggal', $day)->first();
                    $studentData['attendance_by_day'][$day] = $dayAttendance ? $this->mapStatusToCode($dayAttendance->status) : '-';
                }
            } elseif ($reportType === 'monthly') {
                $startDate = Carbon::create(null, $month, 1);
                $endDate = $startDate->copy()->endOfMonth();
                $absensiQuery->whereBetween('tanggal', [$startDate, $endDate]);
            } elseif ($reportType === 'semester') {
                // Semester 1: Juli-Desember, Semester 2: Januari-Juni
                $year = Carbon::now()->year;
                if ($semester == 1) {
                    $startDate = Carbon::create($year - 1, 7, 1);
                    $endDate = Carbon::create($year - 1, 12, 31);
                } else {
                    $startDate = Carbon::create($year, 1, 1);
                    $endDate = Carbon::create($year, 6, 30);
                }
                $absensiQuery->whereBetween('tanggal', [$startDate, $endDate]);
            }

            $absensi = $absensiQuery->get();

            $studentData['id'] = $student->id;
            $studentData['student_id'] = $student->nisn;
            $studentData['name'] = $student->nama_siswa;
            $studentData['class'] = $student->classroom ? $student->classroom->nama_kelas : '-';
            $studentData['present'] = 0;
            $studentData['absent'] = 0;
            $studentData['late'] = 0;
            $studentData['excused'] = 0;
            $studentData['total_days'] = count($absensi);

            foreach ($absensi as $absen) {
                switch ($absen->status) {
                    case 'Hadir':
                        $studentData['present']++;
                        $summary['present']++;
                        break;
                    case 'Alfa':
                        $studentData['absent']++;
                        $summary['absent']++;
                        break;
                    case 'Sakit':
                        $studentData['excused']++;
                        $summary['excused']++;
                        break;
                    case 'Izin':
                        $studentData['late']++;
                        $summary['late']++;
                        break;
                }
                $summary['total_days']++;
            }

            // Hitung persentase kehadiran
            $studentData['attendance_percentage'] = $studentData['total_days'] > 0
                ? round(($studentData['present'] / $studentData['total_days']) * 100)
                : 0;

            $reportData[] = $studentData;
        }

        // Hitung persentase keseluruhan
        $summary['attendance_percentage'] = $summary['total_days'] > 0
            ? round(($summary['present'] / $summary['total_days']) * 100)
            : 0;

        return response()->json([
            'report_type' => $reportType,
            'class' => $class,
            'week' => $week,
            'month' => $month,
            'semester' => $semester,
            'students' => $reportData,
            'summary' => $summary,
            'report_title' => $this->getReportTitle($reportType, $week, $month, $semester),
            'report_period' => $this->getReportPeriod($reportType, $week, $month, $semester)
        ]);
    }

    private function getReportTitle($type, $week, $month, $semester)
    {
        switch ($type) {
            case 'weekly':
                return 'Laporan Kehadian Mingguan';
            case 'monthly':
                return 'Laporan Kehadian Bulanan';
            case 'semester':
                return 'Laporan Kehadian Semester';
            default:
                return 'Attendance Report';
        }
    }

    private function getReportPeriod($type, $week, $month, $semester)
    {
        switch ($type) {
            case 'weekly':
                return "Week $week, " . date('Y');
            case 'monthly':
                $monthName = date('F', mktime(0, 0, 0, $month, 1));
                return "$monthName " . date('Y');
            case 'semester':
                return "Semester $semester, " . date('Y');
            default:
                return date('F Y');
        }
    }

    private function mapStatusToCode($status)
    {
        switch (strtolower($status)) {
            case 'hadir':
                return 'H';
            case 'sakit':
                return 'S';
            case 'izin':
                return 'I';
            case 'alfa':
                return 'A';
            default:
                return '-';
        }
    }
}
