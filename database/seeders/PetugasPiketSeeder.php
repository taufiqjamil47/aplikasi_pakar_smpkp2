<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasPiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('petugas_pikets')->insert([
            [
                'nama' => 'Nurdin Permiansyah',
                'nomor_wa' => '085709905390',
                'hari_piket' => 'Senin,Selasa,Rabu,Kamis,Jumat',
            ],
            [
                'nama' => 'Imas Siti Kulsum',
                'nomor_wa' => '089655361069',
                'hari_piket' => 'Senin',
            ],
            [
                'nama' => 'Zaenal Muttaqin',
                'nomor_wa' => '081311948082',
                'hari_piket' => 'Selasa',
            ],
            [
                'nama' => 'Kurnia Dewi',
                'nomor_wa' => '081546969936',
                'hari_piket' => 'Rabu,Jumat',
            ],
            [
                'nama' => 'Yopi Sudirman',
                'nomor_wa' => '089627146534',
                'hari_piket' => 'Kamis',
            ],
        ]);
    }
}
