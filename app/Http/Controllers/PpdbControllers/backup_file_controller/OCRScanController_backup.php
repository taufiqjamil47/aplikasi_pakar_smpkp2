<?php

namespace App\Http\Controllers\PpdbControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        $totalSiswa = $this->getTotalSiswa();
        return view('ppdbPages.pages.scan', [
            'totalSiswa' => $totalSiswa,
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

            return view('ppdbPages.pages.resultData', [
                'text' => $text,
                'totalSiswa' => $totalSiswa,
            ]);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return view('ppdbPages.pages.scan', [
                'error' => $e->getMessage(),
                'totalSiswa' => $totalSiswa,
            ]);
        }
    }

    private function processImageToText($imagePath)
    {
        // Sesuaikan dengan path Python yang sesuai untuk sistem operasi Anda
        $pythonPath = 'C:\Users\taufi\AppData\Local\Programs\Python\Python311\python.exe';

        // Gantilah path skrip Python sesuai kebutuhan Anda
        $scriptPath = 'C:\xampp\htdocs\aplikasi_pakar_smpkp2\app\Http\Controllers\PpdbControllers\OMR_multiple_choice\.venv\OCRdata.py';

        // Panggil skrip Python untuk pemrosesan OCR
        $command = "\"$pythonPath\" \"$scriptPath\" \"$imagePath\"";

        $text = shell_exec($command);

        return $text;
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
