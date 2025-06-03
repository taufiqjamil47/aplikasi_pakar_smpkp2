<?php

namespace App\Http\Controllers\PpdbControllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PpdbController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $totalSiswa = Student::all();
        return view(
            'ppdbPages.pages.home',
            [
                'totalSiswa' => $totalSiswa->count('id'),
            ]
        );
    }

    public function tambahData()
    {
        return view('ppdbPages.pages.tambah-data', [
            'totalSiswa' => DB::table('students')->count('id')
        ]);
    }

    public function show(Request $request)
    {

        $periode = $request->input('periode');
        $students = Student::where('periode', $periode)->orderBy('nama_siswa')->get();
        return view('ppdbPages.pages.show', compact('students'));
    }

    public function exportForm()
    {
        $periods = Student::distinct()->orderBy('periode')->pluck('periode');
        return view('ppdbPages.pages.export', [
            'totalSiswa' => DB::table('students')->count('id')
        ], compact('periods'));
    }

    public function exportData(Request $request)
    {
        $periode = $request->input('periode');

        // Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Ambil data dari model Student berdasarkan periode
        $students = Student::where('periode', $periode)->get();

        // Buat header kolom
        $header = [
            'Nama Siswa',
            'L/P',
            'NISN',
            'NIK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Alamat',
            'RT',
            'RW',
            'Desa',
            'Kecamatan',
            'No Hp',
            'Asal Sekolah',
            'Tinggi Badan',
            'Berat Badan',
            'Anak Ke',
            'PKH',
            'KKS',
            'PIP',
            'Nama Ayah',
            'Tahun Lahir',
            'Pekerjaan',
            'Pendidikan',
            'Nama Ibu',
            'Tahun Lahir',
            'Pekerjaan',
            'Pendidikan',
            'Nama Wali',
            'Tahun Lahir',
            'Pekerjaan',
            'Pendidikan',
            'Ukuran Baju',
            'Rumus'
        ]; // Sesuaikan dengan atribut model Anda
        $sheet->fromArray([$header], null, 'A1');

        // Isi data dari model ke lembar kerja
        $row = 2;
        foreach ($students as $student) {
            $data = [
                $student->nama_siswa,
                $student->jenis_kelamin,
                $student->nisn,
                $student->nik,
                $student->tempat_lahir,
                $nilaiTanggal = \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel($student->tanggal_lahir),
                $student->agama,
                $student->alamat,
                $student->rt,
                $student->rw,
                $student->desa,
                $student->kecamatan,
                $student->no_telp,
                $student->asal_sekolah,
                $student->tinggi_badan,
                $student->berat_badan,
                $student->anak_ke,
                $student->pkh,
                $student->kks,
                $student->pip,
                $student->nama_ayah,
                $student->tahun_lahir_ayah,
                $student->pekerjaan_ayah,
                $student->pendidikan_ayah,
                $student->nama_ibu,
                $student->tahun_lahir_ibu,
                $student->pekerjaan_ibu,
                $student->pendidikan_ibu,
                $student->nama_wali,
                $student->tahun_lahir_wali,
                $student->pekerjaan_wali,
                $student->pendidikan_wali,
                $student->ukuran_baju,
            ];
            $spreadsheet->getActiveSheet()->setCellValue(
                'F' . $row,
                $nilaiTanggal,
            );
            $spreadsheet->getActiveSheet()->getStyle('F' . $row)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY);

            $spreadsheet->getActiveSheet()->setCellValueExplicit(
                'AH' . $row,
                '=RIGHT(D' . $row . '; LEN(D' . $row . ') - 1)',
                \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
            );

            $sheet->fromArray($data, null, 'A' . $row);
            $row++;
        }

        // Simpan sebagai file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = "daftar_pd_ppdb_$periode.xlsx";
        $writer->save($filename);

        return response()->stream(
            function () use ($filename) {
                readfile($filename);
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => "attachment; filename=$filename",
            ]
        );
    }
}
