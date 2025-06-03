<?php

namespace App\Http\Controllers\PiketControllers;

use App\Models\Absensi;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\AbsensiToken;
use Illuminate\Http\Request;
use App\Models\AbsensiSignature;
use App\Http\Controllers\Controller;

class PiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classrooms = ClassRoom::all(); // untuk pilihan kelas di form

        $selectedClassroomId = $request->query('classroom_id');
        $students = [];

        if ($selectedClassroomId) {
            $students = Student::where('classroom_id', $selectedClassroomId)->get();
        }

        return view('absencePages.pages.form', compact('students', 'classrooms', 'selectedClassroomId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'absences' => 'required|array',
            'absences.*.student_id' => 'required|exists:students,id',
            'absences.*.status' => 'required|in:sakit,izin,alfa,hadir',
            'absences.*.keterangan' => 'nullable|string|max:255',
            'signed' => 'nullable|in:0,1',
        ]);

        $tanggal = now()->toDateString();

        // Cek apakah sudah pernah tanda tangan hari ini
        if (AbsensiSignature::where('tanggal', $tanggal)->exists()) {
            return back()->withErrors(['sudah' => 'Tanda tangan hari ini sudah dibuat.']);
        }

        foreach ($request->absences as $item) {
            if (empty($item['status']) || empty($item['student_id'])) {
                continue;
            }
            Absensi::updateOrCreate(
                [
                    'student_id' => $item['student_id'],
                    'tanggal' => $tanggal,
                ],
                [
                    'status' => $item['status'],
                    'keterangan' => $item['keterangan'] ?? null,
                ]
            );
        }

        if ($request->signed == 1) {
            AbsensiSignature::updateOrCreate(
                ['tanggal' => now()->toDateString()],
                [
                    'nama_petugas' => 'Petugas Piket', // bisa juga dari input form atau user login jika pakai
                    'signed_at' => now(),
                ]
            );

            return redirect()->back()->with('success', 'Absensi disimpan & telah ditandatangani.');
        }
        return redirect()->back()->with('success', 'Absensi berhasil disimpan.');
    }

    public function validateToken(Request $request)
    {
        $token = AbsensiToken::where('token', $request->token)
            ->where('tanggal', now()->toDateString())
            ->where('expired_at', '>', now())
            ->first();

        if (!$token) {
            return redirect()->back()->withErrors(['token' => 'Token tidak valid atau sudah kedaluwarsa.']);
        }

        return redirect()->route('absen.index', ['token' => $request->token]);
    }
}
