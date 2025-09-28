<?php

namespace App\Http\Controllers\PiketControllers\Admin;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Exports\AttendanceExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceExportController extends Controller
{
    public function index()
    {
        $classrooms = ClassRoom::all();
        $totalSiswa = Student::count();
        return view('absencePages.admin.pages.export', compact('classrooms', 'totalSiswa'));
    }

    public function export()
    {
        $request = request();

        $classroomId = $request->classroom_id;
        $period = $request->period;

        // Tentukan tanggal berdasarkan periode
        switch ($period) {
            case 'weekly':
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;

            case 'monthly':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;

            case 'semester':
                // Asumsi semester 1: Juli-Desember, semester 2: Januari-Juni
                $month = Carbon::now()->month;
                if ($month >= 7) {
                    $startDate = Carbon::create(Carbon::now()->year, 7, 1);
                    $endDate = Carbon::create(Carbon::now()->year, 12, 31);
                } else {
                    $startDate = Carbon::create(Carbon::now()->year, 1, 1);
                    $endDate = Carbon::create(Carbon::now()->year, 6, 30);
                }
                break;

            default:
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
        }

        $filename = 'Rekap_Absensi_Kelas_' . ClassRoom::find($classroomId)->nama_kelas .
            '_' . $period . '_' . Carbon::now()->format('Ymd') . '.xlsx';

        return Excel::download(
            new AttendanceExport($classroomId, $startDate, $endDate),
            $filename
        );
    }
}
