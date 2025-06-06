<?php

namespace App\Http\Controllers\PiketControllers;

use App\Models\Absensi;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\AbsensiToken;
use App\Models\PetugasPiket;
use Illuminate\Http\Request;
use App\Models\AbsensiSignature;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (!session()->get('absen_token_verified')) {
            return redirect('/absen-hari-ini/form')->withErrors(['token' => 'Silakan masukkan token terlebih dahulu.']);
        }

        $classrooms = ClassRoom::all(); // untuk pilihan kelas di form

        $selectedClassroomId = $request->query('classroom_id');
        $students = [];

        if ($selectedClassroomId) {
            $students = Student::where('classroom_id', $selectedClassroomId)->get();
        }

        return view('absencePages.pages.form', compact('students', 'classrooms', 'selectedClassroomId'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'absences' => 'required|array',
            'absences.*.student_id' => 'required|exists:students,id',
            'absences.*.status' => 'required|in:sakit,izin,alfa,hadir',
            'absences.*.keterangan' => 'nullable|string|max:255',
            'signed' => 'nullable|in:0,1',
            'signature_data' => 'nullable|string', // Add this validation
        ]);

        $tanggal = now()->toDateString();

        // Cek apakah sudah ada tanda tangan untuk hari ini
        if (AbsensiSignature::where('tanggal', $tanggal)->exists()) {
            return back()->withErrors(['sudah' => 'Absensi hari ini sudah ditandatangani dan tidak bisa diubah lagi.']);
        }

        // Save attendance records
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

        // Handle signature if signed
        if ($request->signed == 1 && $request->signature_data) {
            $hariIni = now()->locale('id')->dayName;
            $petugasHariIni = PetugasPiket::where('hari_piket', 'LIKE', "%$hariIni%")->get();

            if ($petugasHariIni->isEmpty()) {
                return redirect()->back()->withErrors(['signed' => 'Tidak ditemukan petugas piket untuk hari ini.']);
            }

            // Save signature image
            $folderPath = public_path('signature_images');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->signature_data));
            $filename = 'signature_' . $tanggal . '_' . time() . '.png';
            $path = $folderPath . '/' . $filename;
            file_put_contents($path, $imageData);

            foreach ($petugasHariIni as $petugas) {
                AbsensiSignature::updateOrCreate(
                    [
                        'tanggal' => $tanggal,
                        'nama_petugas' => $petugas->nama,
                    ],
                    [
                        'signed_at' => now(),
                        'signature_path' => 'signature_images/' . $filename
                    ]
                );
            }

            return redirect()->back()->with('success', 'Absensi disimpan & telah ditandatangani oleh semua petugas.');
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
            return redirect()->back()->with('error', 'Token tidak valid atau sudah kedaluwarsa.');
        }

        // Simpan token ke dalam session agar bisa dicek saat buka halaman absensi
        session()->put('absen_token_verified', true);
        session()->put('absen_token', $request->token);

        return redirect()->route('absen.index');
    }

    public function sign(Request $request)
    {
        $request->validate([
            'signature_data' => 'required|string',
        ]);

        $dataURL = $request->input('signature_data');
        $tanggal = now()->toDateString();
        $petugas = PetugasPiket::where('hari_piket', 'like', '%' . now()->locale('id')->dayName . '%')->first();

        // Create signature directory if it doesn't exist
        $folderPath = public_path('signature_images');
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        // Process and save the signature image
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataURL));
        $filename = 'signature_' . $tanggal . '_' . time() . '.png';
        $path = $folderPath . '/' . $filename;

        if (!file_put_contents($path, $imageData)) {
            return back()->with('error', 'Gagal menyimpan gambar tanda tangan.');
        }

        // Create the signature record with all required fields
        $signature = AbsensiSignature::create([
            'nama_petugas' => $petugas?->nama ?? 'Petugas Piket',
            'tanggal' => $tanggal,
            'signed_at' => now(),
            'signature_path' => 'signature_images/' . $filename, // Make sure this is included
        ]);

        if (!$signature) {
            return back()->with('error', 'Gagal menyimpan data tanda tangan.');
        }

        return redirect()->back()->with('success', 'Tanda tangan berhasil disimpan.');
    }
}
