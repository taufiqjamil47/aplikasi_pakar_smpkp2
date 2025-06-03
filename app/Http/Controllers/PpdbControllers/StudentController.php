<?php

namespace App\Http\Controllers\PpdbControllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('PpdbPages.pages.data-siswa', [
            'totalSiswa' => DB::table('students')->count('id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $student = Student::where('slug', $slug)->firstOrFail(); // Menggunakan slug sebagai kunci pencarian
        return view('PpdbPages.pages.lihat-data', [
            'totalSiswa' => DB::table('students')->count('id')
        ], compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $student = Student::where('slug', $slug)->firstOrFail(); // Menggunakan slug sebagai kunci pencarian
        return view('PpdbPages.pages.edit-data', [
            'totalSiswa' => DB::table('students')->count('id')
        ], compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate(
            [
                'nisn' => 'required|unique:students,nisn,' . $id,
                'nik' => 'required|unique:students,nik,' . $id,
            ],
            [
                'nisn.required' => 'NISN harus diisi.',
                'nisn.unique' => 'NISN sudah digunakan.',
                'nik.required' => 'NIK harus diisi.',
                'nik.unique' => 'NIK sudah digunakan.',
            ]
        );

        $student = Student::find($id);
        $student->nama_siswa = Str::upper($request->nama_siswa);
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->nisn = $validatedData['nisn'];
        $student->nik = $validatedData['nik'];
        $student->tempat_lahir = Str::upper($request->tempat_lahir);
        $student->tanggal_lahir = $request->tanggal_lahir;
        $student->agama = $request->agama;
        $student->alamat = Str::upper($request->alamat);
        $student->rt = $request->rt;
        $student->rw = $request->rw;
        $student->desa = Str::upper($request->desa);
        $student->kecamatan = Str::upper($request->kecamatan);
        $student->no_telp = $request->no_telp;
        $student->asal_sekolah = Str::upper($request->asal_sekolah);
        $student->pkh = $request->pkh;
        $student->kks = $request->kks;
        $student->pip = $request->pip;
        $student->tinggi_badan = $request->tinggi_badan;
        $student->berat_badan = $request->berat_badan;
        $student->anak_ke = $request->anak_ke;
        $student->ukuran_baju = $request->ukuran_baju;
        $student->nama_ayah = Str::upper($request->nama_ayah);
        $student->tahun_lahir_ayah = $request->tahun_lahir_ayah;
        $student->pekerjaan_ayah = $request->pekerjaan_ayah;
        $student->pendidikan_ayah = $request->pendidikan_ayah;
        $student->nama_ibu = Str::upper($request->nama_ibu);
        $student->tahun_lahir_ibu = $request->tahun_lahir_ibu;
        $student->pekerjaan_ibu = $request->pekerjaan_ibu;
        $student->pendidikan_ibu = $request->pendidikan_ibu;
        $student->nama_wali = Str::upper($request->nama_wali);
        $student->tahun_lahir_wali = $request->tahun_lahir_wali;
        $student->pekerjaan_wali = $request->pekerjaan_wali;
        $student->pendidikan_wali = $request->pendidikan_wali;
        $student->update();

        return redirect()->route('data-siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $dataId = Student::where('slug', $slug)->firstOrFail();
        $dataId->delete();

        return to_route('data-siswa.index');
    }
}
