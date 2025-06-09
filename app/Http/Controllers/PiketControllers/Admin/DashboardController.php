<?php

namespace App\Http\Controllers\PiketControllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalSiswa = Student::count();
        $belumBerkelas = Student::whereNull('classroom_id')
            ->orWhere('classroom_id', 0)
            ->count();
        $jumlahRombel = ClassRoom::count(); // 1 kelas = 1 rombel
        $kelas = ClassRoom::with(['teacher'])->withCount('students')->take(5)->get();

        return view('absencePages.admin.pages.dashboard', compact('totalSiswa', 'jumlahRombel', 'kelas', 'belumBerkelas'));
    }
}
