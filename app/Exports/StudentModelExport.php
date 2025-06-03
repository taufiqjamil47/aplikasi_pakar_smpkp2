<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class StudentModelExport implements FromCollection, WithHeadings, WithColumnFormatting, WithMapping
{
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Siswa',
            'Jenis Kelamin',
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
            'No Telp',
            'Asal Sekolah',
            'PKH',
            'KKS',
            'PIP',
            'Tinggi Badan',
            'Berat Badan',
            'Anak Ke',
            'Ukuran Baju',
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
            'Periode',
            'Dibuat Pada',
            'Dibuat Pada',
        ];
    }


    public function map($data): array
    {
        $tanggalLahir = (new \DateTime($data->tanggal_lahir))->format('d/m/Y');

        return [
            $data->id,
            $data->nama_siswa,
            $data->jenis_kelamin,
            $data->nisn,
            $data->nik,
            $data->tempat_lahir,
            $tanggalLahir,
            $data->agama,
            $data->alamat,
            $data->rt,
            $data->rw,
            $data->desa,
            $data->kecamatan,
            $data->no_telp,
            $data->asal_sekolah,
            $data->pkh,
            $data->kks,
            $data->pip,
            $data->tinggi_badan,
            $data->berat_badan,
            $data->anak_ke,
            $data->ukuran_baju,
            $data->nama_ayah,
            $data->tahun_lahir_ayah,
            $data->pekerjaan_ayah,
            $data->pendidikan_ayah,
            $data->nama_ibu,
            $data->tahun_lahir_ibu,
            $data->pekerjaan_ibu,
            $data->pendidikan_ibu,
            $data->nama_wali,
            $data->tahun_lahir_wali,
            $data->pekerjaan_wali,
            $data->pendidikan_wali,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
