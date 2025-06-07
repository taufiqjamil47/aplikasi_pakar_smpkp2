<?php

namespace App\Http\Controllers\PiketControllers\Admin;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil siswa dengan classroom_id null atau 0
        $belumBerkelas = Student::whereNull('classroom_id')
            ->orWhere('classroom_id', 0)
            ->count();
        $totalSiswa = Student::count();
        $jumlahRombel = ClassRoom::count(); // 1 kelas = 1 rombel
        $kelas = ClassRoom::with(['teacher'])->withCount('students')->take(5)->get();

        return view('absencePages.admin.pages.kelas', compact('totalSiswa', 'jumlahRombel', 'kelas', 'belumBerkelas'));
    }

    public function show($id)
    {
        $belumBerkelas = Student::whereNull('classroom_id')
            ->orWhere('classroom_id', 0)
            ->get();
        $kelas = ClassRoom::with(['teacher', 'students'])
            ->withCount('students')
            ->findOrFail($id);

        $totalSiswa = $kelas->students_count; // Menggunakan hasil withCount

        return view('absencePages.admin.pages.kelas-view', [
            'kelas' => $kelas,
            'totalSiswa' => $totalSiswa, // Contoh tambahan
            'belumBerkelas' => $belumBerkelas
        ]);
    }

    // KelasController.php
    public function tambahSiswa(Request $request, $kelasId)
    {
        $request->validate([
            'siswa_ids' => 'required|array',
            'siswa_ids.*' => 'exists:students,id'
        ]);

        $kelas = ClassRoom::findOrFail($kelasId);

        // Update siswa yang dipilih
        Student::whereIn('id', $request->siswa_ids)
            ->update(['classroom_id' => $kelas->id]);

        return response()->json([
            'success' => true,
            'message' => 'Siswa berhasil ditambahkan ke kelas'
        ]);
    }
}
