<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_siswa' => fake()->name(),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'nisn' => fake()->numberBetween(),
            'nik' => fake()->nik(),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date(),
            'agama' => fake()->randomElement(['Islam', 'Kristen Protestan', 'Katholik', 'Hindu', 'Lainnya']),
            'alamat' => "KP. " . fake()->address(),
            'rt' => fake()->randomNumber(1, true),
            'rw' => fake()->randomNumber(1, true),
            'desa' => fake()->state(),
            'kecamatan' => fake()->state(),
            'no_telp' => fake()->phoneNumber(),
            'asal_sekolah' => fake()->streetName(),
            'pkh' => fake()->randomNumber(),
            'kks' => fake()->randomNumber(),
            'pip' => fake()->randomNumber(),
            'tinggi_badan' => fake()->randomNumber(3),
            'berat_badan' => fake()->randomNumber(2),
            'anak_ke' => fake()->randomNumber(),
            'ukuran_baju' => fake()->randomElement(['S', 'M', 'L', 'XL', 'XXL']),
            'nama_ayah' => fake()->name(),
            'tahun_lahir_ayah' => fake()->year(),
            'pekerjaan_ayah' => fake()->randomElement(['Tidak Bekerja', 'Nelayan', 'Petani', 'Peternak', 'PNS/TNI/POLRI', 'Karyawan Swasta', 'Pedagang Kecil', 'Pedagang Besar', 'Wiraswasta', 'Wirausaha', 'Buruh', 'Pensiunan', 'Lainnya']),
            'pendidikan_ayah' => fake()->randomElement(['Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3']),
            'nama_ibu' => fake()->name(),
            'tahun_lahir_ibu' => fake()->year(),
            'pekerjaan_ibu' => fake()->randomElement(['Tidak Bekerja', 'Nelayan', 'Petani', 'Peternak', 'PNS/TNI/POLRI', 'Karyawan Swasta', 'Pedagang Kecil', 'Pedagang Besar', 'Wiraswasta', 'Wirausaha', 'Buruh', 'Pensiunan', 'Lainnya']),
            'pendidikan_ibu' => fake()->randomElement(['Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3']),
            'nama_wali' => fake()->name(),
            'tahun_lahir_wali' => fake()->year(),
            'pekerjaan_wali' => fake()->randomElement(['Tidak Bekerja', 'Nelayan', 'Petani', 'Peternak', 'PNS/TNI/POLRI', 'Karyawan Swasta', 'Pedagang Kecil', 'Pedagang Besar', 'Wiraswasta', 'Wirausaha', 'Buruh', 'Pensiunan', 'Lainnya']),
            'pendidikan_wali' => fake()->randomElement(['Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3']),
            'slug' => Str::slug(fake()->name()),
            'periode' => fake()->randomElement(['2022-2023', '2023-2024', '2024-2025'])
        ];
    }
}
