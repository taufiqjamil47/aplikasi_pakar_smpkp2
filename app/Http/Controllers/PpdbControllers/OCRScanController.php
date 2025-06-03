<?php

namespace App\Http\Controllers\PpdbControllers;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class OCRScanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getTotalSiswa()
    {
        return $totalSiswa = DB::table('students')->count('id');
    }

    public function showform()
    {
        $imagePathPrev =  url('storage/images/FormDatabaseSet.jpg'); //'C:\xampp\htdocs\aplikasi_pakar_smpkp2\public\storage\images\rczbPXZFvl4FjSJmFk7Zvx6l5WiO6Lqz4TgJO09J.jpg';
        $totalSiswa = $this->getTotalSiswa();
        return view('ppdbPages.pages.scan', [
            'totalSiswa' => $totalSiswa,
            'imagePath' => $imagePathPrev
        ]);
    }

    public function uploadImage(Request $request)
    {
        $totalSiswa = $this->getTotalSiswa();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        if (!in_array($extension, ['jpeg', 'png', 'jpg', 'gif', 'svg'])) {
            throw new \Exception('Ekstensi file tidak diizinkan.');
        }

        $imagePath = $request->file('image')->store('images');
        $imagePathPrev = $request->file('image')->store('public/images');

        // Ubah menjadi
        $imageFullPath = storage_path("app/$imagePath");

        // Pastikan path gambar benar
        if (!file_exists($imageFullPath)) {
            throw new \Exception("File gambar tidak ditemukan: $imageFullPath");
        }

        try {
            $text = $this->processImageToText($imageFullPath);

            if ($text === null) {
                throw new \Exception('Data null atau tidak ada nilai sama sekali!');
            }

            return view('ppdbPages.pages.scan', [
                'text' => $text,
                'totalSiswa' => $totalSiswa,
                'imagePath' => $imagePathPrev
            ]);
        } catch (\Exception $e) {
            return view('ppdbPages.pages.scan', [
                'error' => $e->getMessage(),
                'totalSiswa' => $totalSiswa,
                'imagePath' => $imagePathPrev,
            ]);
        }
    }

    private function processImageToText($imagePath)
    {
        $pythonPath = 'C:\xampp\htdocs\aplikasi_pakar_smpkp2\app\OCR\.venv\Scripts\python.exe';
        $scriptPath = 'C:\xampp\htdocs\aplikasi_pakar_smpkp2\app\OCR\.venv\OCR_scan_laravel.py';
        $process = new Process([$pythonPath, $scriptPath, $imagePath]);

        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $jsonOutput = $process->getOutput();
        $dataArray = json_decode($jsonOutput, true);

        if (!is_null($dataArray)) {
            $fields = [
                'Nomor Pendaftaran' => 'id',
                'Nama Peserta' => 'nama_siswa',
                'Jenis Kelamin' => 'jenis_kelamin',
                'NISN' => 'nisn',
                'NIK' => 'nik',
                'Tempat Lahir' => 'tempat_lahir',
                'Tanggal Lahir' => 'tanggal_lahir',
                'Agama' => 'agama',
                'Alamat' => 'alamat',
                'RT' => 'rt',
                'RW' => 'rw',
                'Desa' => 'desa',
                'Kecamatan' => 'kecamatan',
                'Kabupaten' => 'kabupaten',
                'Provinsi' => 'provinsi',
                'No. Telp' => 'no_telp',
                'Asal SD' => 'asal_sekolah',
                'PIP/PKH/KKS' => 'bantuan',
                'Tinggi Badan' => 'tinggi_badan',
                'Berat Badan' => 'berat_badan',
                'Anak Ke' => 'anak_ke',
                'Ukuran Baju' => 'ukuran_baju',
                'Nama Ayah' => 'nama_ayah',
                'Tahun Lahir Ayah' => 'tahun_lahir_ayah',
                'Pekerjaan Ayah' => 'pekerjaan_ayah',
                'Pendidikan Ayah' => 'pendidikan_ayah',
                'Nama Ibu' => 'nama_ibu',
                'Tahun Lahir Ibu' => 'tahun_lahir_ibu',
                'Pekerjaan Ibu' => 'pekerjaan_ibu',
                'Pendidikan Ibu' => 'pendidikan_ibu',
                'Nama Wali' => 'nama_wali',
                'Tahun Lahir Wali' => 'tahun_lahir_wali',
                'Pekerjaan Wali' => 'pekerjaan_wali',
                'Pendidikan Wali' => 'pendidikan_wali',
                // Add other fields here
            ];
            // $fields = [
            //     'Nomor Pendaftaran' => 'noDaftar',
            //     'Nama Peserta' => 'namaPeserta',
            //     'Jenis Kelamin' => 'jenisKelamin',
            //     'NISN' => 'nisn',
            //     'NIK' => 'nik',
            //     'Tempat Lahir' => 'tempatLahir',
            //     'Tanggal Lahir' => 'tanggalLahir',
            //     'Agama' => 'agama',
            //     'Alamat' => 'alamat',
            //     'RT' => 'rt',
            //     'RW' => 'rw',
            //     'Desa' => 'desa',
            //     'Kecamatan' => 'kecamatan',
            //     'Kabupaten' => 'kabupaten',
            //     'Provinsi' => 'provinsi',
            //     'No. Telp' => 'telp',
            //     'Asal SD' => 'asalSD',
            //     'PIP/PKH/KKS' => 'bantuan',
            //     'Tinggi Badan' => 'tinggiBadan',
            //     'Berat Badan' => 'beratBadan',
            //     'Anak Ke' => 'anakKe',
            //     'Ukuran Baju' => 'ukuranBaju',
            //     'Nama Ayah' => 'namaAyah',
            //     'Tahun Lahir Ayah' => 'tahunLahirAyah',
            //     'Pekerjaan Ayah' => 'pekerjaanAyah',
            //     'Pendidikan Ayah' => 'pendidikanAyah',
            //     'Nama Ibu' => 'namaIbu',
            //     'Tahun Lahir Ibu' => 'tahunLahirIbu',
            //     'Pekerjaan Ibu' => 'pekerjaanIbu',
            //     'Pendidikan Ibu' => 'pendidikanIbu',
            //     'Nama Wali' => 'namaWali',
            //     'Tahun Lahir Wali' => 'tahunLahirWali',
            //     'Pekerjaan Wali' => 'pekerjaanWali',
            //     'Pendidikan Wali' => 'pendidikanWali',
            //     // Add other fields here
            // ]; // Backup

            $responseData = collect($dataArray)
                ->filter(function ($data) use ($fields) {
                    return array_key_exists($data['label'], $fields);
                })
                ->mapWithKeys(function ($data) use ($fields) {
                    return [$fields[$data['label']] => $data['nilai']];
                })
                ->prepend('success', 'status')
                ->all();
        } else {
            $responseData = [
                'status' => 'failed',
                'id' => null,
                'nama_siswa' => null,
                'jenis_kelamin' => null,
                'nisn' => null,
                'nik' => null,
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'agama' => null,
                'alamat' => null,
                'rt' => null,
                'rw' => null,
                'desa' => null,
                'kecamatan' => null,
                'kabupaten' => null,
                'provinsi' => null,
                'no_telp' => null,
                'asal_sekolah' => null,
                'bantuan' => null,
                'tinggi_badan' => null,
                'berat_badan' => null,
                'anak_ke' => null,
                'ukuran_baju' => null,
                'nama_ayah' => null,
                'tahun_lahir_ayah' => null,
                'pekerjaan_ayah' => null,
                'pendidikan_ayah' => null,
                'nama_ibu' => null,
                'tahun_lahir_ibu' => null,
                'pekerjaan_ibu' => null,
                'pendidikan_ibu' => null,
                'nama_wali' => null,
                'tahun_lahir_wali' => null,
                'pekerjaan_wali' => null,
                'pendidikan_wali' => null,
            ];
        }

        return response()->json($responseData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nisn' => 'required|unique:students|min:10', // Data Required
                'nik' => 'required|unique:students|min:16', // Data Required
            ],
            [
                'nisn.required' => ':attribute tidak boleh kosong!',
                'nik.required' => ':attribute tidak boleh kosong!',
                'nisn.unique' => ':attribute telah digunakan!',
                'nik.unique' => ':attribute telah digunakan!',
                'nisn.min' => ':attribute harus 10 angka',
                'nik.min' => ':attribute harus 16 angka',
            ],
            [
                'nisn' => 'NISN',
                'nik' => 'NIK',
            ]
        );
        $data = [
            'nama_siswa' => Str::upper($request->nama_siswa),
            'jenis_kelamin' => $request->jenis_kelamin,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'tempat_lahir' => Str::upper($request->tempat_lahir),
            'tanggal_lahir' => Carbon::parse($request->tanggal_lahir)->tz('Asia/Jakarta')->format('Y-m-d'),
            'agama' => $request->agama,
            'alamat' => Str::upper($request->alamat),
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa' => Str::upper($request->desa),
            'kecamatan' => Str::upper($request->kecamatan),
            'no_telp' => $request->no_telp,
            'asal_sekolah' => Str::upper($request->asal_sekolah),
            'pkh' => $request->bantuan,
            // 'kks' => $request->bantuan,
            // 'pip' => $request->bantuan,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'anak_ke' => $request->anak_ke,
            'ukuran_baju' => $request->ukuran_baju,
            'nama_ayah' => Str::upper($request->nama_ayah),
            'tahun_lahir_ayah' => $request->tahun_lahir_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'nama_ibu' => Str::upper($request->nama_ibu),
            'tahun_lahir_ibu' => $request->tahun_lahir_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'nama_wali' => Str::upper($request->nama_wali),
            'tahun_lahir_wali' => $request->tahun_lahir_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'slug' => Str::slug($request->nama_siswa),
            'periode' => now()->format('Y') . '-' . (now()->year + 1)
        ];
        Student::create($data);

        // Jika berhasil disimpan, redirect atau berikan respons sesuai kebutuhan
        return redirect()->route('scan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
