<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Events\PpdbEvents\StudentAdded;
use App\Models\User;

class Wizard extends Component
{
    public $currentStep = 1;
    public $nama_siswa,
        $jenis_kelamin,
        $nisn,
        $nik,
        $tempat_lahir,
        $tanggal_lahir,
        $agama,
        $alamat,
        $rt,
        $rw,
        $desa,
        $kecamatan,
        $no_telp,
        $asal_sekolah,
        $pkh,
        $kks,
        $pip,
        $tinggi_badan,
        $berat_badan,
        $anak_ke,
        $ukuran_baju,
        $nama_ayah,
        $tahun_lahir_ayah,
        $pekerjaan_ayah,
        $pendidikan_ayah,
        $nama_ibu,
        $tahun_lahir_ibu,
        $pekerjaan_ibu,
        $pendidikan_ibu,
        $nama_wali,
        $tahun_lahir_wali,
        $pekerjaan_wali,
        $pendidikan_wali;

    public function render()
    {
        return view(
            'livewire.wizard',
            [
                'totalSiswa' => DB::table('students')->count('id')
            ]
        );
    }

    // Fungsi Step 1 Data Siswa
    public function firstStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'nama_siswa' => 'required', // Data Required
                'jenis_kelamin' => 'required', // Data Required
                'nisn' => 'required|unique:students|min:10', // Data Required
                'nik' => 'required|unique:students|min:16', // Data Required
                'tempat_lahir' => 'required', // Data Required
                'tanggal_lahir' => 'required', // Data Required
                'agama' => 'required', // Data Required
                'alamat' => 'required', // Data Required
                'rt' => 'required', // Data Required
                'rw' => 'required', // Data Required
                'desa' => 'required', // Data Required
                'kecamatan' => 'required', // Data Required

            ],
            [
                'nama_siswa.required' => ':attribute tidak boleh kosong!',
                'jenis_kelamin.required' => ':attribute tidak boleh kosong!',
                'nisn.required' => ':attribute tidak boleh kosong!',
                'nik.required' => ':attribute tidak boleh kosong!',
                'nisn.unique' => ':attribute telah digunakan!',
                'nik.unique' => ':attribute telah digunakan!',
                'nisn.min' => ':attribute harus 10 angka',
                'nik.min' => ':attribute harus 16 angka',
                'tempat_lahir' => ':attribute tidak boleh kosong',
                'tanggal_lahir' => ':attribute tidak boleh kosong',
                'agama' => ':attribute tidak boleh kosong',
                'alamat.required' => ':attribute tidak boleh kosong!',
                'rt.required' => ':attribute tidak boleh kosong!',
                'rw.required' => ':attribute tidak boleh kosong!',
                'desa.required' => ':attribute tidak boleh kosong!',
                'kecamatan.required' => ':attribute tidak boleh kosong!',
            ],
            [
                'nama_siswa' => 'Nama Siswa',
                'jenis_kelamin' => 'Jenis Kelamin',
                'nisn' => 'NISN',
                'nik' => 'NIK',
                'tempat_lahir' => 'Tempat Lahir',
                'tanggal_lahir' => 'Tanggal Lahir',
                'agama' => 'Agama',
                'alamat' => 'Alamat',
                'rt' => 'RT',
                'rw' => 'RW',
                'desa' => 'Desa',
                'kecamatan' => 'Kecamatan',
            ]
        );

        $this->currentStep = 2;
    }

    // Fungsi Step 2 Data Berkas dan Lain-lain
    public function secondStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'no_telp' => 'required', // Data Required
                'asal_sekolah' => 'required', // Data Required
                'pkh' => 'nullable',
                'kks' => 'nullable',
                'pip' => 'nullable',
                'tinggi_badan' => 'nullable',
                'berat_badan' => 'nullable',
                'anak_ke' => 'nullable',
                'ukuran_baju' => 'required', // Data Required
            ],
            [
                'no_telp.required' => ':attribute tidak boleh kosong!',
                'asal_sekolah.required' => ':attribute tidak boleh kosong!',
                'ukuran_baju.required' => ':attribute tidak boleh kosong!',
            ],
            [
                'no_telp' => 'No HP',
                'asal_sekolah' => 'Asal Sekolah',
                'ukuran_baju' => 'Ukuran Baju'
            ]
        );
        $this->currentStep = 3;
    }

    // Fungsi Step 3 Data Orang tua / Wali
    public function thridStepSubmit()
    {
        $validatedData = $this->validate(
            [
                'nama_ayah' => 'required', // Data Required
                'tahun_lahir_ayah' => 'nullable',
                'pekerjaan_ayah' => 'nullable',
                'pendidikan_ayah' => 'nullable',
                'nama_ibu' => 'required', // Data Required
                'tahun_lahir_ibu' => 'nullable',
                'pekerjaan_ibu' => 'nullable',
                'pendidikan_ibu' => 'nullable',
                'nama_wali' => 'nullable', // Data Required
                'tahun_lahir_wali' => 'nullable',
                'pekerjaan_wali' => 'nullable',
                'pendidikan_wali' => 'nullable',
            ],
            [
                'nama_ayah' => ':attribute tidak boleh kosong',
                'nama_ibu' => ':attribute tidak boleh kosong',
            ],
            [
                'nama_ayah' => 'Nama Ayah',
                'nama_ibu' => 'Nama Ibu',
            ]
        );
        $this->currentStep = 4;
    }

    public function submitForm()
    {
        $data = [
            // Data Siswa
            'nama_siswa' => Str::upper($this->nama_siswa),
            'jenis_kelamin' => $this->jenis_kelamin,
            'nisn' => $this->nisn,
            'nik' => $this->nik,
            'tempat_lahir' => Str::upper($this->tempat_lahir),
            'tanggal_lahir' => $this->tanggal_lahir,
            'agama' => $this->agama,
            'alamat' => "KP. " . Str::upper($this->alamat),
            'rt' => $this->rt,
            'rw' => $this->rw,
            'desa' => Str::upper($this->desa),
            'kecamatan' => Str::upper($this->kecamatan),

            // Data Siswa lain - lain
            'no_telp' => $this->no_telp,
            'asal_sekolah' => Str::upper($this->asal_sekolah),
            'pkh' => $this->pkh,
            'kks' => $this->kks,
            'pip' => $this->pip,
            'tinggi_badan' => $this->tinggi_badan,
            'berat_badan' => $this->berat_badan,
            'anak_ke' => $this->anak_ke,
            'ukuran_baju' => $this->ukuran_baju,

            // Data Orang tua / Wali
            'nama_ayah' => Str::upper($this->nama_ayah),
            'tahun_lahir_ayah' => $this->tahun_lahir_ayah,
            'pekerjaan_ayah' => $this->pekerjaan_ayah,
            'pendidikan_ayah' => $this->pendidikan_ayah,
            'nama_ibu' => Str::upper($this->nama_ibu),
            'tahun_lahir_ibu' => $this->tahun_lahir_ibu,
            'pekerjaan_ibu' => $this->pekerjaan_ibu,
            'pendidikan_ibu' => $this->pendidikan_ibu,
            'nama_wali' => Str::upper($this->nama_wali),
            'tahun_lahir_wali' => $this->tahun_lahir_wali,
            'pekerjaan_wali' => $this->pekerjaan_wali,
            'pendidikan_wali' => $this->pendidikan_wali,
            'slug' => Str::slug($this->nama_siswa),
            'periode' => now()->format('Y') . '-' . (now()->year + 1)
        ];
        Student::create($data);
        $this->clearForm();
        $this->currentStep = 1;
        event(new StudentAdded($data['nama_siswa'], auth()->user()->name));
    }
    // public function submitForm()
    // {
    //     Student::create([
    //         // Data Siswa
    //         'nama_siswa' => Str::upper($this->nama_siswa),
    //         'jenis_kelamin' => $this->jenis_kelamin,
    //         'nisn' => $this->nisn,
    //         'nik' => $this->nik,
    //         'tempat_lahir' => Str::upper($this->tempat_lahir),
    //         'tanggal_lahir' => $this->tanggal_lahir,
    //         'agama' => $this->agama,
    //         'alamat' => "KP. " . Str::upper($this->alamat),
    //         'rt' => $this->rt,
    //         'rw' => $this->rw,
    //         'desa' => Str::upper($this->desa),
    //         'kecamatan' => Str::upper($this->kecamatan),

    //         // Data Siswa lain - lain
    //         'no_telp' => $this->no_telp,
    //         'asal_sekolah' => Str::upper($this->asal_sekolah),
    //         'pkh' => $this->pkh,
    //         'kks' => $this->kks,
    //         'pip' => $this->pip,
    //         'tinggi_badan' => $this->tinggi_badan,
    //         'berat_badan' => $this->berat_badan,
    //         'anak_ke' => $this->anak_ke,
    //         'ukuran_baju' => $this->ukuran_baju,

    //         // Data Orang tua / Wali
    //         'nama_ayah' => Str::upper($this->nama_ayah),
    //         'tahun_lahir_ayah' => $this->tahun_lahir_ayah,
    //         'pekerjaan_ayah' => $this->pekerjaan_ayah,
    //         'pendidikan_ayah' => $this->pendidikan_ayah,
    //         'nama_ibu' => Str::upper($this->nama_ibu),
    //         'tahun_lahir_ibu' => $this->tahun_lahir_ibu,
    //         'pekerjaan_ibu' => $this->pekerjaan_ibu,
    //         'pendidikan_ibu' => $this->pendidikan_ibu,
    //         'nama_wali' => Str::upper($this->nama_wali),
    //         'tahun_lahir_wali' => $this->tahun_lahir_wali,
    //         'pekerjaan_wali' => $this->pekerjaan_wali,
    //         'pendidikan_wali' => $this->pendidikan_wali,
    //         'slug' => Str::slug($this->nama_siswa),
    //         'periode' => now()->format('Y') . '-' . (now()->year + 1)
    //     ]);
    //     $this->clearForm();
    //     $this->currentStep = 1;
    //     event(new StudentAdded($this->nama_siswa));
    //     Session::flash('message', 'Data berhasil di simpan');
    // }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function clearForm()
    {
        // Data Siswa
        $this->nama_siswa = "";
        $this->jenis_kelamin = "";
        $this->nisn = "";
        $this->nik = "";
        $this->tempat_lahir = "";
        $this->tanggal_lahir = "";
        $this->agama = "";
        $this->alamat = "";
        $this->rt = "";
        $this->rw = "";
        $this->desa = "";
        $this->kecamatan = "";

        // Data Siswa lain - lain
        $this->no_telp = "";
        $this->asal_sekolah = "";
        $this->pkh = "";
        $this->kks = "";
        $this->pip = "";
        $this->tinggi_badan = "";
        $this->berat_badan = "";
        $this->anak_ke = "";
        $this->ukuran_baju = "";

        // Data Orang tua / Wali
        $this->nama_ayah = "";
        $this->tahun_lahir_ayah = "";
        $this->pekerjaan_ayah = "";
        $this->pendidikan_ayah = "";
        $this->nama_ibu = "";
        $this->tahun_lahir_ibu = "";
        $this->pekerjaan_ibu = "";
        $this->pendidikan_ibu = "";
        $this->nama_wali = "";
        $this->tahun_lahir_wali = "";
        $this->pekerjaan_wali = "";
        $this->pendidikan_wali = "";
    }
}
