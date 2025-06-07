<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            ['nama_guru' => 'Mira Siti Hajar, S.Pd'],
            ['nama_guru' => 'Devi Oktaviani Mukti, S.Pd'],
            ['nama_guru' => 'Dudi Riswandi Mukti, S.Pd'],
            ['nama_guru' => 'Lely Nurlaeli Agustina, S.Pd'],
            ['nama_guru' => 'Tiara Elvira Sany, S.Si'],
        ]);
    }
}
