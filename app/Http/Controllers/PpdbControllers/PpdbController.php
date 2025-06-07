<?php

namespace App\Http\Controllers\PpdbControllers;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\StudentModelExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PpdbController extends Controller
{

    public function getTotalSiswa()
    {
        return $totalSiswa = DB::table('students')->count('id');
    }

    public function index()
    {
        $totalSiswa = $this->getTotalSiswa();
        // Ambil data siswa yang dibuat hari ini, limit 10, urut terbaru
        $siswaHariIni = Student::whereDate('created_at', Carbon::today())
            ->latest()
            ->take(5)
            ->get();

        return view('ppdbPages.pages.home', [
            'totalSiswa' => $totalSiswa,
            'siswaHariIni' => $siswaHariIni,
        ]);
    }

    public function tambahData()
    {
        $totalSiswa = $this->getTotalSiswa();
        return view('ppdbPages.pages.tambah-data', [
            'totalSiswa' => $totalSiswa
        ]);
    }

    public function show(Request $request)
    {

        $periode = $request->input('periode');
        $students = Student::where('periode', $periode)->orderBy('nama_siswa')->get();
        return view('ppdbPages.pages.show', compact('students'));
    }

    public function exportDataToExcel()
    {
        $data = Student::all();
        return Excel::download(new StudentModelExport($data), 'data_pd_PPDB-2024.xlsx');
    }
}
