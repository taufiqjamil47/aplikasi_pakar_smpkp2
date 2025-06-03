<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::factory(500)->create();

        // DB::table('students')->insert([
        //     'nama_siswa' => 'Taufiq Jamil Hanafi',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'nisn' => '9998767468',
        //     'nik' => "'3204332707990008",
        //     'tempat_lahir' => 'Bandung',
        //     'tanggal_lahir' => fake()->date(),
        //     'agama' => 'Islam',
        //     'alamat' => 'Carik',
        //     'rt' => 3,
        //     'rw' => 7,
        //     'desa' => 'Padamulya',
        //     'kecamatan' => 'Majalaya',
        //     'no_telp' => '082218247031',
        //     'asal_sekolah' => 'SDN PADASUKA 06',
        //     'tinggi_badan' => '164',
        //     'berat_badan' => '50',
        //     'anak_ke' => '2',
        //     'ukuran_baju' => 'L',
        //     'nama_ayah' => 'Amo Suharmo',
        //     'tahun_lahir_ayah' => '1976',
        //     'pekerjaan_ayah' => 'Pedagang Kecil',
        //     'pendidikan_ayah' => 'SMA',
        //     'nama_ibu' => 'Neneng Susanti',
        //     'tahun_lahir_ibu' => '1976',
        //     'pekerjaan_ibu' => 'Pedagang Kecil',
        //     'pendidikan_ibu' => 'SMP',
        //     'nama_wali' => 'Ati',
        //     'tahun_lahir_wali' => '1966',
        //     'pekerjaan_wali' => 'Pedagang Kecil',
        //     'pendidikan_wali' => 'Tidak Sekolah',
        //     'slug' => 'taufiq-jamil-hanafi',
        //     'periode' => '2023-2024'
        // ]);
    }
}
